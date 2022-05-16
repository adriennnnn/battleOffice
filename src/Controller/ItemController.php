<?php

namespace App\Controller;

use App\Entity\ItemChose;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ItemController extends AbstractController
{
    #[Route('/', name: 'landing_page')]
    public function index(Request $request, EntityManagerInterface $entityManager)
    {

        $itemSelect = new ItemChose();
        $form = $this->createForm(OrderType::class, $itemSelect);
        $form->handleRequest($request);

    }
}
