<?php

namespace App\Controller;

use App\Entity\Bobines;
use App\Entity\Impressions;
use App\Entity\Imprimantes;
use App\Entity\Ventes;
use App\Form\AjoutbobinesFormType;
use App\Form\AjoutimpressionsFormType;
use App\Form\AjoutimprimantesFormType;
use App\Form\VentesFormType;
use App\Repository\BobinesRepository;
use App\Repository\UsersRepository;
use App\Repository\ImpressionsRepository;
use App\Repository\ImprimantesRepository;
use App\Repository\VentesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        return $this->render('user/dashboard.html.twig', [
            'imprimantes' => $totalPrinter,
            // 'imprimantes' => '0',
            // 'actifs' => '2',
            'actifs' => $printersActive,
            // 'depenses' => '1000',
            'depenses' => $expensest.'€',
            // 'mois' => '100.56€',
            'mois' => $expensesm.'€',
            'impressions' => $piecest,
            'total' => $piecesm,
            // 'profit' => '900.50€',
            'revenust' => $revenust.'€',
            // 'pmois' => '200€',
            'revenusm' => $revenusm.'€',
        ]);
    }

    #[Route('/user/courbes', name: 'courbes_user')]
    public function courbes(): Response
    {
        return $this->render('user/courbes.html.twig', [

        ]);
    }
    #[Route('/user/stock', name: 'stock_user')]
    public function stock(BobinesRepository $bobinesRepository): Response
    {
        return $this->render('user/gestion/stock.html.twig', [
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
        return $this->render('user/gestion/impressions.html.twig', [
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
        return $this->render('user/gestion/imprimantes.html.twig', [
            'printers' => $printersRepository->findBy(
                ['username' => $this->getUser()->getId()],
                ['id' => 'DESC'],
                10
            ),
        ]);
    }

    #[Route('/user/ajoutBobines', name: 'ajoutb_user')]
    public function ajoutbobi(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bobines = new Bobines();
        $form = $this->createForm(AjoutbobinesFormType::class, $bobines);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bobines->setUtilisateur(
                $this->getUser()
            );
            $bobines->setDateAjout(
                new \DateTime('now')
            );
            $entityManager->persist($bobines);
            $entityManager->flush();

            return $this->redirectToRoute('stock_user');
        }



        return $this->render('user/gestion/ajoutbobine.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/user/ajoutImprimantes', name: 'ajoutimpri_user')]
    public function ajoutimpri(Request $request, EntityManagerInterface $entityManager): Response
    {
        $imprimante = new Imprimantes();
        $form = $this->createForm(AjoutimprimantesFormType::class, $imprimante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imprimante->setUsername(
                $this->getUser()
            );

            $entityManager->persist($imprimante);
            $entityManager->flush();

            return $this->redirectToRoute('imprimante_user');
        }



        return $this->render('user/gestion/ajoutimprimante.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/user/ajoutImpressions', name: 'ajoutimpress_user')]
    public function ajoutimpress(Request $request, EntityManagerInterface $entityManager): Response
    {
        $impression = new Impressions();
        $form = $this->createForm(AjoutimpressionsFormType::class, $impression);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $impression->setUtilisateur(
                $this->getUser()
            );
            $impression->setDate(
                new \DateTime('now')
            );

            $entityManager->persist($impression);
            $entityManager->flush();

            return $this->redirectToRoute('impression_user');
        }



        return $this->render('user/gestion/ajoutimpression.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/user/account', name: 'account_user')]
    public function account(UsersRepository $userRepository): Response
    {
        return $this->render('user/account.html.twig', [
            'users' => $userRepository->findBy(
                ['id' => $this->getUser()->getId()],
                ['id' => 'DESC'],
                10
            ),

        ]);
    }

    #[Route('/user/ventes', name: 'ventes_user')]
    public function ventes(VentesRepository $ventesRepository, Request $request, EntityManagerInterface $entityManager): Response
    {

        $ventes = new Ventes();
        $form = $this->createForm(VentesFormType::class, $ventes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ventes->setVendeur(
                $this->getUser()
            );
            $ventes->setDateVente(
                new \DateTime('now')
            );

            $entityManager->persist($ventes);
            $entityManager->flush();

            return $this->redirectToRoute('ventes_user');
        }
        return $this->render('user/comptes/ventes.html.twig', [
            'ventes' => $ventesRepository->findBy(
                ['vendeur' => $this->getUser()->getId()],
                ['id' => 'DESC'],
                10
            ),

            'form' => $form->createView(),
        ]);
    }


    #[Route('/user/caisse', name: 'caisse_user')]
    public function caisse(Request $request, EntityManagerInterface $entityManager): Response
    {

        $ventes = new Ventes();
        $form = $this->createForm(VentesFormType::class, $ventes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ventes->setVendeur(
                $this->getUser()
            );
            $ventes->setDateVente(
                new \DateTime('now')
            );

            $entityManager->persist($ventes);
            $entityManager->flush();

            return $this->redirectToRoute('ventes_user');
        }
        return $this->render('user/comptes/caisse.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}