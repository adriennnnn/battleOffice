<?php

namespace App\Controller;

use App\Entity\BilingAdress;
use App\Entity\User;
use App\Entity\Order;
use App\Form\UserType;
use App\Form\ItemType;
use App\Form\OrderType;
use App\Entity\ItemChose;
use App\Entity\DeliveryAdress;
use App\Entity\Payment;
use App\Form\BilingAdressType;
use Symfony\Component\Form\Form;
use App\Repository\ItemChoseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\Expr\Value;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class LandingPageController extends AbstractController
{
    #[Route('/', name: 'landing_page')]
    public function index(Request $request, EntityManagerInterface $entityManager)
    {
        $Products = $entityManager->getRepository(ItemChose::class)->findAll();
        $client = new BilingAdress();
        $shipping = new DeliveryAdress();
        $payment = new Payment();
        $order = new Order();

        function apiRequest($json){
            $clientHttp = HttpClient::create();
            $response = $clientHttp->request('POST', 'https://api-commerce.simplon-roanne.com/order', [
                'headers'=> [
                    'accept'=> 'application/json' , 
                    'Authorization'=> 'Bearer mJxTXVXMfRzLg6ZdhUhM4F6Eutcm1ZiPk4fNmvBMxyNR4ciRsc8v0hOmlzA0vTaX ',
                    'Content-Type'=> 'application/json', 
                ],
                'verify_peer' => false, 'verify_host' => false, 
                'body'=> $json
                ]
            );

            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}'
            $content = $response->toArray();
            // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
            dd($content);
            return $content;
        }
        function apiUpdate($apiOrderId){
            $status = [ 'status' => 'PAID'];
            $clientHttp = HttpClient::create();
            $response = $clientHttp->request(
                'POST',
                'https://api-commerce.simplon-roanne.com/order'. $apiOrderId .'status',
                ['headers'=> [
                    'accept'=> 'application/json' , 
                    'Authorization'=> 'Bearer mJxTXVXMfRzLg6ZdhUhM4F6Eutcm1ZiPk4fNmvBMxyNR4ciRsc8v0hOmlzA0vTaX ',
                    'Content-Type'=> 'application/json', 
                ],
                'verify_peer' => false, 'verify_host' => false, 
                'body'=> json_encode($status)
                ]
            );

            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}'
            $content = $response->toArray();
            // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

            return $content;
        }
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            
            // if(!$shipping->getName()){
            //     $shipping->setFirstname($client->getFirstname());
            //     $shipping->setName($client->getName());
            //     $shipping->setComplementAdress($client->getComplementAdress());
            //     $shipping->setCity($client->getCity());
            //     $shipping->setPostalCode($client->getPostalCode());
            //     $shipping->setCountry($client->getCountry());
            //     $shipping->setPhone($client->getPhone());
            // }
            $order->setAddAnotherDeliveryAdress(1);
            
            $productId = $request->request->get('product');
            $method = $request->request->get('payment');
// dd($method);
            $product = $entityManager->getRepository(ItemChose::class)->findOneBy(['id' => $productId]);
            $amount = $product->getPricePromo();
            $payment->setAmount($amount);
            $payment->setStatus('waiting');
            $payment->setMethodOfPayment($method);
            // dd($product);
            $data = [
                    "order"=> [
                        "id"=> $order->getId(),
                        "product"=> $order->getItem(),
                        "payment_method"=> $method,
                        "status"=> "WAITING",
                    "client"=> [
                        "firstname"=> $client->getFirstname(),
                        "lastname"=> $client->getName(),
                        "email"=> $order->getEmail()
                        ],
                    "addresses"=> [
                        "billing"=> [
                        "address_line1"=> $client->getAdress(),
                        "address_line2"=> $client->getComplementAdress(),
                        "city"=> $client->getCity(),
                        "zipcode"=> $client->getPostalCode(),
                        "country"=> $client->getCountry(),
                        "phone"=> $client->getPhone()
                        ],
                        "shipping"=> [
                            "address_line1"=> $shipping->getAdress(),
                            "address_line2"=> $shipping->getComplementAdress(),
                            "zipcode"=> $shipping->getPostalCode(),
                            "country"=> $shipping->getCountry(),
                            "phone"=> $shipping->getPhone()
                        ]
                    ]
                ]
            ];
            $json = json_encode($data);
            dd($json);
            apiRequest($json);
            $responseApi = apiRequest($json);
            
            $entityManager->persist($client);
            $entityManager->persist($payment);
            $entityManager->persist($order);
            $entityManager->flush();

            $apiOrderId = $responseApi(['order_id']);
            apiUpdate($apiOrderId);
            return $this->confirmation;
        }

        return $this->renderForm('landing_page/index_new.html.twig', [
            'form' => $form ,
            'products' => $Products,
        ]);
    }
    

    #[Route('/confirmation', name: 'app_confirmation')]
    public function confirmation()
    {
        return $this->render('landing_page/confirmation.html.twig', [

        ]);
    }
}
