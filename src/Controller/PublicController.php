<?php

namespace App\Controller;

use App\Repository\ImpressionsRepository;
use App\Repository\ImprimantesRepository;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    
    #[Route('/', name: 'app_public')]
    public function index(UsersRepository $usersRepository, ImprimantesRepository $printersRepository, ImpressionsRepository $piecesRepository): Response
    {
        $totalUsers = $usersRepository->getTotalusers();
        $totalPrinters = $printersRepository->getTotalprinters();
        $totalPieces = $piecesRepository->getTotalpieces();
        return $this->render('public/index.html.twig', [
            'site_name' => 'FilamentGestion.fr',
            'utilisateurs' => $totalUsers,
            'imprimantes' => $totalPrinters,
            'impressions' => $totalPieces,
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
            'imprimantes' => '5',
            'actifs' => '2',
            'depenses' => '500.20€',
            'mois' => '100.56€',
            'impressions' => '5',
            'total' => '50',
            'profit' => '900.50€',
            'pmois' => '200€',
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

    #[Route('/user/impressions', name: 'impression_public')]
    public function impressions(): Response
    {
        return $this->render('users/impressions.html.twig', [

        ]);
    }

    #[Route('/user/imprimantes', name: 'imprimante_public')]
    public function imprimantes(): Response
    {
        return $this->render('users/imprimantes.html.twig', [

        ]);
    }
}
