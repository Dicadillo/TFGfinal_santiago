<?php

namespace App\Controller;

use App\Entity\Activity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActivityController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/activity', name: 'app_activity')]
    public function index(): Response
    {
        // Obtén todas las instancias de Activity de la base de datos
        $activities = $this->entityManager->getRepository(Activity::class)->findAll();

        return $this->render('activity/index.html.twig', [
            'activities' => $activities,
        ]);
    }

    #[Route('/activity/reserve/{id}', name: 'app_reserve')]
    public function reserve(Activity $activity): Response
    {
        return $this->render('reserve/index.html.twig', [
            'activity' => $activity,
        ]);
    }
}
