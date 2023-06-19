<?php
// src/Controller/ReserveController.php

namespace App\Controller;

use App\Entity\Activity;
use App\Entity\Order;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReserveController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/activity/reserve/{id}', name: 'app_reserve')]
public function reserve(Request $request, Activity $activity): Response
{
    $order = new Order();
    $order->setActivity($activity);

    $form = $this->createForm(OrderType::class, $order);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->entityManager->persist($order);
        $this->entityManager->flush();

        // Redirigir o mostrar un mensaje de éxito, según tus necesidades

        return $this->redirectToRoute('app_activity');
    }

    return $this->render('reserve/index.html.twig', [
        'activity' => $activity,
        'form' => $form->createView(),
    ]);
}
}