<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    #[Route('/', name: 'app_public')]
    public function index(): Response
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
            'site_name' => 'Filament gestion.fr',
        ]);
    }

    #[Route('/dashboard', name: 'dash_public')]
    public function dash(): Response
    {
        return $this->render('public/accueil.html.twig', [
            
        ]);
    }
}
