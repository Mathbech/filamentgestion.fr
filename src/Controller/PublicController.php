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
            'site_name' => 'FilamentGestion.fr',
            'utilisateurs' => '500',
            'imprimantes' => '300',
            'impressions' => '2 Millions',
            'contributeurs' => '10',
            'entreprises' => '30',
            'partenaires' => '1',
            'pages' => '5',
        ]);
    }

    #[Route('/user/dashboard', name: 'dash_public')]
    public function dash(): Response
    {
        return $this->render('public/dashboard.html.twig', [
            
        ]);
    }

    #[Route('/user/courbes', name: 'courbes_public')]
    public function courbes(): Response
    {
        return $this->render('public/courbes.html.twig', [
            
        ]);
    }

    #[Route('/user/stock', name: 'stock_public')]
    public function stock(): Response
    {
        return $this->render('users/stock.html.twig', [

        ]);
    }
}
