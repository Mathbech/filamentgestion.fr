<?php

namespace App\Controller;

use App\Entity\Bobines;
use App\Repository\BobinesRepository;
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
            'contributeurs' => '2',
            'entreprises' => '1',
            'partenaires' => '1',
            'pages' => '9',
        ]);
    }

    #[Route('/user/dashboard', name: 'dash_public')]
    public function dash(ImprimantesRepository $printersRepository, BobinesRepository $bobinesRepository): Response
    {
        $user = $this->getUser();
        $totalPrinter = $printersRepository->getPrintersUsers($user);
        $printersActive = $printersRepository->getPrintersaUsers($user);
        $Counts = $bobinesRepository->getComptesUsers($user);
        return $this->render('public/dashboard.html.twig', [
            'imprimantes' => $totalPrinter,
            // 'imprimantes' => '0',
            // 'actifs' => '2',
            'actifs' => $printersActive,
            // 'depenses' => '1000',
            'depenses' => $Counts,
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
    public function stock(BobinesRepository $bobinesRepository): Response
    {
        return $this->render('users/stock.html.twig', [
            'stocks' => $bobinesRepository->findBy(
                ['utilisateur' => $this->getUser()->getId()],
                ['id' => 'DESC'], 
                10
            ),
        ]);
    }

    #[Route('/user/impressions', name: 'impression_public')]
    public function impressions(ImpressionsRepository $impressionsRepository): Response
    {
        return $this->render('users/impressions.html.twig', [
            'impressions' => $impressionsRepository->findBy(
                ['utilisateur' => $this->getUser()->getId()],
                ['id' => 'DESC'], 
                10
            ),
        ]);
    }

    #[Route('/user/imprimantes', name: 'imprimante_public')]
    public function imprimantes(ImprimantesRepository $printersRepository): Response
    {
        return $this->render('users/imprimantes.html.twig', [
            'printers' => $printersRepository->findBy(
                ['username' => $this->getUser()->getId()],
                ['id' => 'DESC'], 
                10
            ),
        ]);
    }
}
