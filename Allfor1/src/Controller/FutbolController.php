<?php

namespace App\Controller;

use App\Entity\Pedido;
use App\Form\PedidosType;
use App\Repository\ActivityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class FutbolController extends AbstractController
{
    #[Route('/futbol', name: 'app_Futbol')]
    public function index(Request $request, ActivityRepository $activityRepository): Response
    {
        $pedido = new Pedido();
        $form = $this->createForm(PedidosType::class, $pedido);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Obtener el número de participantes del formulario
            $participantes = $pedido->getParticipantes();
            
            // Obtener el precio de la actividad seleccionada
            $activity = $pedido->getDeporte(); // Suponiendo que el campo de la actividad en el formulario se llama "deporte"
            $precioActividad = $activityRepository->find($activity)->getPrice();

            // Calcular el total
            $total = $participantes * $precioActividad;
            
            // Guardar el total en el pedido
            $pedido->setCantidadPago($total);

            // Guardar el pedido en la base de datos
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pedido);
            $entityManager->flush();

            // Redirigir a otra página después de guardar el pedido
            return $this->redirectToRoute('app_home');
        }

        return $this->render('futbol/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
