<?php

namespace App\Controller;

use App\Entity\Activity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {   
         // Obtén todas las instancias de Activity de la base de datos
         $activities = $this->entityManager->getRepository(Activity::class)->findAll();

        return $this->render('home/index.html.twig', [
            'activities' => $activities,
            'controller_name' => 'HomeController',
        ]);
    }
}
