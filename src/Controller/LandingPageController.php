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

class LandingPageController extends AbstractController
{

    public const LOGIN_ROUTE = 'app_item_select';

    
    #[Route('/', name: 'landing_page')]
    public function index(Request $request, EntityManagerInterface $entityManager, ItemChoseRepository $ItemChoseRepository)
    {
        //Your code here
        $order = new Order();
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

//         $product = $ItemChoseRepository->findAll();
//         $payment= $PaymentRepository;

//         if ($deliveryAdress->getFirstname() === null && $deliveryAdress->getName() === null && $deliveryAdress->getAdress() === null){

//             $data =
//                 [
//                         "order"=> [
//                             "id"=> "1",
//                             "product"=> $product->getProductBY(),
//                             "payment_method"=> $paymentMethode,
//                             "status"=> "WAITING",
//                         "client"=> [
//                             "firstname"=> $form->getFirstnameUser(),
//                             "lastname"=> $form->getName(),
//                             "email"=> $form->getEmail()
//                             ],
//                         "addresses"=> [
//                             "billing"=> [
//                             "address_line1"=> $form->getAdress(),
//                             "address_line2"=> $form->getComplementAdress(),
//                             "city"=> $form->getCity(),
//                             "zipcode"=> $form->getPostalCode(),
//                             "country"=> $form->getCountry(),
//                             "phone"=> $form->getTel()
//                             ],
//                         "shipping"=> [
//                             "address_line1"=> $form->getAdress(),
//                             "address_line2"=> $form->getComplementAdress(),
//                             "zipcode"=> $form->getPostalCode(),
//                             "country"=> $form->getCountry(),
//                             "phone"=> $form->getTel()
//                             ]
//                         ]   
//                     ]
                
//             ];



//         }else{
 
//             $data =
//                 [
//                         "order"=> [
//                             "id"=> "1",
//                             "product"=> $product->getName(),
//                             "payment_method"=> $payment->getModePayment(),
//                             "status"=> "WAITING",
//                         "client"=> [
//                             "firstname"=> $form->getFirstname(),
//                             "lastname"=> $form->getName(),
//                             "email"=> $form->getEmail()
//                             ],
//                         "addresses"=> [
//                             "billing"=> [
//                             "address_line1"=> $form->getAdress(),
//                             "address_line2"=> $form->getComplementAdress(),
//                             "city"=> $form->getCity(),
//                             "zipcode"=> $form->getPostalCode(),
//                             "country"=> $form->getCountry(),
//                             "phone"=> $form->getTel()
//                             ],
//                         "shipping"=> [
//                             "address_line1"=> $deliveryAdress->getAdress(),
//                             "address_line2"=> $deliveryAdress->getComplementAdress(),
//                             "city"=> $deliveryAdress->getCity(),
//                             "zipcode"=> $deliveryAdress->getPostalCode(),
//                             "country"=> $deliveryAdress->getCountry(),
//                             "phone"=> $deliveryAdress->getPhone()
//                             ]
//                         ]   
//                     ]
                
//             ];
//  }

        return $this->renderForm('landing_page/index_new.html.twig', [
            'form' => $form ,
            'formdelivery' => $formdelivery
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