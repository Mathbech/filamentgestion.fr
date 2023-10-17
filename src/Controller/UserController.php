<?php

namespace App\Controller;

use App\Repository\BobinesRepository;
use App\Repository\ImpressionsRepository;
use App\Repository\ImprimantesRepository;
use App\Repository\VentesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    #[Route('/user/dashboard', name: 'dash_user')]
    public function dash(ImprimantesRepository $printersRepository, BobinesRepository $bobinesRepository, ImpressionsRepository $impressionsRepository, VentesRepository $ventesRepository): Response
    {
        $user = $this->getUser();
        $totalPrinter = $printersRepository->getPrintersUsers($user);
        $printersActive = $printersRepository->getPrintersaUsers($user);
        $expensest = $bobinesRepository->getExpensetUsers($user);
        $expensesm = $bobinesRepository->getExpensemUsers($user);
        $piecest = $impressionsRepository->getUserstpieces($user);
        $piecesm = $impressionsRepository->getUsersmpieces($user);
        $revenust = $ventesRepository->getProfitt($user);
        $revenusm = $ventesRepository->getProfittm($user);
        return $this->render('public/dashboard.html.twig', [
            'imprimantes' => $totalPrinter,
            // 'imprimantes' => '0',
            // 'actifs' => '2',
            'actifs' => $printersActive,
            // 'depenses' => '1000',
            'depenses' => $expensest,
            // 'mois' => '100.56€',
            'mois' => $expensesm,
            'impressions' => $piecest,
            'total' => $piecesm,
            // 'profit' => '900.50€',
            'revenust' => $revenust,
            // 'pmois' => '200€',
            'revenusm' => $revenusm,
        ]);
    }

    #[Route('/user/courbes', name: 'courbes_user')]
    public function courbes(): Response
    {
        return $this->render('public/courbes.html.twig', [
            
        ]);
    }
    #[Route('/user/stock', name: 'stock_user')]
    public function stock(BobinesRepository $bobinesRepository): Response
    {
        return $this->render('user/stock.html.twig', [
            'stocks' => $bobinesRepository->findBy(
                ['utilisateur' => $this->getUser()->getId()],
                ['id' => 'DESC'], 
                10
            ),
        ]);
    }

    #[Route('/user/impressions', name: 'impression_user')]
    public function impressions(ImpressionsRepository $impressionsRepository): Response
    {
        return $this->render('user/impressions.html.twig', [
            'impressions' => $impressionsRepository->findBy(
                ['utilisateur' => $this->getUser()->getId()],
                ['id' => 'DESC'], 
                10
            ),
        ]);
    }

    #[Route('/user/imprimantes', name: 'imprimante_user')]
    public function imprimantes(ImprimantesRepository $printersRepository): Response
    {
        return $this->render('user/imprimantes.html.twig', [
            'printers' => $printersRepository->findBy(
                ['username' => $this->getUser()->getId()],
                ['id' => 'DESC'], 
                10
            ),
        ]);
    }

    #[Route('/user/ajout', name: 'ajout_user')]
    public function ajout(ImprimantesRepository $printersRepository): Response
    {
        return $this->render('user/ajout.html.twig', [
            
        ]);
    }
}
