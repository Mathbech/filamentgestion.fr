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
        $user_chart = $usersRepository->getRegisterChart();
        dump($user_chart);
        return $this->render('public/index.html.twig', [
            'site_name' => 'FilamentGestion.fr',
            'utilisateurs' => $totalUsers,
            'imprimantes' => $totalPrinters,
            'impressions' => $totalPieces,
            'contributeurs' => '2',
            'entreprises' => '1',
            'partenaires' => '0',
            'pages' => '9',
            'register_chart' => $user_chart,
        ]);
    }

    
}
