<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Order;
use App\Form\UserType;
use App\Form\OrderType;
use App\Entity\ItemChose;
use App\Entity\DeliveryAdress;
use App\Form\DeliveryAdressType;
use Symfony\Component\Form\Form;
use App\Repository\ItemChoseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\Expr\Value;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class LandingPageController extends AbstractController
{

    public const LOGIN_ROUTE = 'app_item_select';

    
    #[Route('/', name: 'landing_page')]
    public function index(Request $request, EntityManagerInterface $entityManager, ItemChoseRepository $ItemChoseRepository, HttpClientInterface $client)
    {
        //Your code here
        $order = new Order();
        $ItemChose = $ItemChoseRepository->findAll();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        $deliveryAdress = new DeliveryAdress();
        $formdelivery = $this->createForm(DeliveryAdressType::class, $deliveryAdress);
        $formdelivery->handleRequest($request);

        if($formdelivery->isSubmitted() && $formdelivery->isValid()){
        $entityManager->persist($deliveryAdress);
        $entityManager->flush();
            // if(Value == "lpmonetico"){
            //     $this->redirect('https://api-commerce.simplon-roanne.com/order');

            // }
            // if(Value == "lppaypal"){
            //     $this->redirect('https://api-commerce.simplon-roanne.com/order');
                
            // }
         }

        if($form->isSubmitted() && $form->isValid()){
        $entityManager->persist($order);
        $entityManager->flush();
        }

        $product = $ItemChoseRepository->findAll();
        $payment= $PaymentRepository;

        if ($deliveryAdress->getFirstname() === null && $deliveryAdress->getName() === null && $deliveryAdress->getAdress() === null){

            $data =
                [
                        "order"=> [
                            "id"=> "1",
                            "product"=> $product->getProductBY(),
                            "payment_method"=> $paymentMethode,
                            "status"=> "WAITING",
                        "client"=> [
                            "firstname"=> $form->getFirstnameUser(),
                            "lastname"=> $form->getName(),
                            "email"=> $form->getEmail()
                            ],
                        "addresses"=> [
                            "billing"=> [
                            "address_line1"=> $form->getAdress(),
                            "address_line2"=> $form->getComplementAdress(),
                            "city"=> $form->getCity(),
                            "zipcode"=> $form->getPostalCode(),
                            "country"=> $form->getCountry(),
                            "phone"=> $form->getTel()
                            ],
                        "shipping"=> [
                            "address_line1"=> $form->getAdress(),
                            "address_line2"=> $form->getComplementAdress(),
                            "zipcode"=> $form->getPostalCode(),
                            "country"=> $form->getCountry(),
                            "phone"=> $form->getTel()
                            ]
                        ]   
                    ]
                
            ];
 }

 $response = $this->client->request(
    'POST',
    'https://api-commerce.simplon-roanne.com/order',
    ['headers'=> [
        'accept'=> 'application/json' , 
        'Authorization'=> 'Bearer mJxTXVXMfRzLg6ZdhUhM4F6Eutcm1ZiPk4fNmvBMxyNR4ciRsc8v0hOmlzA0vTaX ',
        'Contente-Type'=> 'application/json', 
    ],
    'verify_peer' => false, 'verify_host' => false, 
    'body'=> $data
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

        return $this->renderForm('landing_page/index_new.html.twig', [
            'form' => $form ,
            'formdelivery' => $formdelivery,
            'ItemChose' => $ItemChose
        ]);
    }


    // #[Route('select', name: 'app_item_select')]
    // public function ItemSelect(Request $request, EntityManagerInterface $entityManager, ItemChoseRepository $ItemChoseRepository){

    //     $itemChose = new ItemChose();
    //     $form = $this->createForm(OrderType::class, $itemChose);
    //     $form->handleRequest($request);

    //     if($formdelivery->isSubmitted() && $formdelivery->isValid()){
    //         $entityManager->persist($deliveryAdress);
    //         $entityManager->flush();
    //      }

    //     return $this->renderForm('landing_page/index_new.html.twig', [
    //        'form' => $form ,
    //     //    'formdelivery' => $formdelivery
    //     ]);

        
    // }

    #[Route('/confirmation', name: 'app_confirmation')]
    public function confirmation()
    {
        return $this->render('landing_page/confirmation.html.twig', [

        ]);
    }
}