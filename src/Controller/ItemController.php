<?php

namespace App\Controller;

use App\Entity\ItemChose;
use App\Form\ItemType;
use App\Repository\ItemChoseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ItemController extends AbstractController
{
    #[Route('/item', name: 'index_item')]
    public function index(Request $request, EntityManagerInterface $entityManager, ItemChoseRepository $productRepository)
    {
        $ItemChose = new ItemChose();
        $Item = $this->createForm(ItemType::class, $ItemChose);
        $Item->handleRequest($request);

        if($Item->isSubmitted() && $Item->isValid()){
        $entityManager->persist($ItemChose);
        $entityManager->flush();
        } 

        return $this->render('landing_page/index_new.html.twig', [
            'Item' => $productRepository->findAll(),
        ]);
    }
}
    // #[Route('/new', name: 'new_item',  methods: ['GET',"POST"])]
    // public function new(Request $request):Response{
    //     $product = new ItemChose();
    //     $form = $this->createForm(ItemType::class, $product);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($product);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('product_index');
    //     }

    //     return $this->render('product/new.html.twig', [
    //         'product' => $product,
    //         'form' => $form->createView(),
    //     ]);
    // }

    // #[Route('/edit', name: 'edit_item', methods: ['GET',"POST"])]
    // public function edit(Request $request):Response{
    //     $form = $this->createForm(ItemType::class, $product);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $this->getDoctrine()->getManager()->flush();

    //         return $this->redirectToRoute('product_index');
    //     }

    //     return $this->render('product/edit.html.twig', [
    //         'product' => $product,
    //         'form' => $form->createView(),
    //     ]);
    // }

    // #[Route('/delet', name: 'delet_item', methods: ["POST"])]
    // public function delete(Request $request):Response{
    //     if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->remove($product);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('product_index');
    // }


    // #[Route('/show', name: 'look_item', methods: ['GET'])]
    // public function show(Request $request):Response{
    //     return $this->render('product/show.html.twig', [
    //         'product' => $product,
    //     ]);
    // }

