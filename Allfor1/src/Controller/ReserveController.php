<?php

namespace App\Controller;

use App\Entity\Activity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReserveController extends AbstractController
{
    #[Route('/activity/reserve/{id}', name: 'app_reserve')]
    public function reserve(Activity $activity): Response
    {
        // Aquí puedes implementar la lógica de reserva de la actividad
        
        return $this->render('reserve/index.html.twig', [
            'activity' => $activity,
        ]);
    }
}
