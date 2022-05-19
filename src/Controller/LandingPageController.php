<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Order;
use App\Form\UserType;
use App\Form\ItemType;
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

    // public const LOGIN_ROUTE = 'app_item_select';

    
    #[Route('/', name: 'landing_page')]
    public function index(Request $request, EntityManagerInterface $entityManager,ItemChoseRepository $productRepository )
    {
        // Your code here
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        $deliveryAdress = new DeliveryAdress();
        $formdelivery = $this->createForm(DeliveryAdressType::class, $deliveryAdress);
        $formdelivery->handleRequest($request);

        $ItemChose = new ItemChose();
        $Item = $this->createForm(ItemType::class, $ItemChose);
        $Item->handleRequest($request);

        // $Products = $productRepository->findAll();
        // if ($form->isSubmitted() && $form->isValid()) {
        //     $id = $request->get('Product');
        //     $ProductId = $productRepository->find($id);
        //     $addProduct = $order->addProduct($ProductId);
        //     $entityManager->persist($order->setForm($ItemChose));
        //     $entityManager->persist($addProduct);
        //     $entityManager->persist($ItemChose);
        //     $entityManager->flush();

        //     return $this->render('landing_page/confirmation.html.twig');
        // }


        if($Item->isSubmitted() && $Item->isValid()){
        $entityManager->persist($ItemChose);
        $entityManager->flush();
        } 


        if($formdelivery->isSubmitted() && $formdelivery->isValid()){
        $entityManager->persist($deliveryAdress);
        $entityManager->flush();
        }


        // $ItemChose = new ItemChose();
        // $order = new Order();
        // $form = $this->createForm(OrderType::class, $order);
        // $form->handleRequest($request);

        // if($form->isSubmitted() && $form->isValid()){
        //     // if(Value == "lpmonetico"){
        //         $entityManager->persist($ItemChose);
        //         $entityManager->flush();
        //         $entityManager->persist($order);
        //         $entityManager->flush();
        //         return $this->render('landing_page/confirmation.html.twig', []);
        //     // }
        //     // if(Value == "lppaypal"){
                
        //         // return $this->render('landing_page/confirmation.html.twig', []);
                
        //     // }
        //  }

        if($form->isSubmitted() && $form->isValid()){
        $entityManager->persist($order);
        $entityManager->flush();
        }

//         $product = $ItemChoseRepository->findAll();
//         $payment= $PaymentRepository;


        return $this->renderForm('landing_page/index_new.html.twig', [
            'form' => $form ,
            'formdelivery' => $formdelivery,
            'Item' => $productRepository->findAll()
        ]);
    }
    

    #[Route('/confirmation', name: 'app_confirmation')]
    public function confirmation()
    {
        return $this->render('landing_page/confirmation.html.twig', [

        ]);
    }
}
