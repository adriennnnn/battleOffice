<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\OrderType;
use App\Entity\Order;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LandingPageController extends AbstractController
{
    #[Route('/', name: 'landing_page')]
    public function index(Request $request, EntityManagerInterface $entityManager)
    {
        //Your code here
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);

        $entityManager->persist($order);
        $entityManager->flush();

        return $this->renderForm('landing_page/index_new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/confirmation', name: 'app_confirmation')]
    public function confirmation()
    {
        return $this->render('landing_page/confirmation.html.twig', [

        ]);
    }
}