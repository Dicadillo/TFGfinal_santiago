<?php

namespace App\Controller;

use App\Entity\Pedido;
use App\Form\PedidosType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class BaloncestoController extends AbstractController
{
    #[Route('/baloncesto', name: 'app_Baloncesto')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pedido = new Pedido();
        $form = $this->createForm(PedidosType::class, $pedido);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Guardar el pedido en la base de datos
            $entityManager->persist($pedido);
            $entityManager->flush();

            // Redirigir a otra página después de guardar el pedido
            return $this->redirectToRoute('app_home');
        }

        return $this->render('baloncesto/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}