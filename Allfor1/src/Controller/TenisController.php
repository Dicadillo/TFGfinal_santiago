<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TenisController extends AbstractController
{
    #[Route('/tenis', name: 'app_Tenis')]
    public function index(): Response
    {
        return $this->render('tenis/index.html.twig', [
            'controller_name' => 'TenisController',
        ]);
    }
}
