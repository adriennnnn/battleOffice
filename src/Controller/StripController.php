<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StripController extends AbstractController
{
    #[Route('/strip', name: 'app_strip')]
    public function index(): Response
    {
        return $this->render('strip/index.html.twig', [
            'controller_name' => 'StripController',
        ]);
    }
}
