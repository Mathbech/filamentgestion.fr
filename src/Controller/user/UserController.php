<?php

namespace App\Controller\user;

use App\Entity\Bobines;
use App\Entity\Ventes;
use App\Entity\Impressions;
use App\Entity\Imprimantes;
use App\Form\AjoutbobinesFormType;
use App\Form\AjoutimpressionsFormType;
use App\Form\AjoutimprimantesFormType;
use App\Form\VentesFormType;
use App\Repository\BobinesRepository;
use App\Repository\CategorieRepository;
use App\Repository\UsersRepository;
use App\Repository\ImpressionsRepository;
use App\Repository\ImprimantesRepository;
use App\Repository\VentesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_USER')]
#[Route(path: "/user")]
class UserController extends AbstractController
{

    #[Route('/', name: 'dash_user')]
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
        $revenusm = $ventesRepository->getProfitm($user);
        $ventes_chart = $ventesRepository->getVentesChart($user);
        $revenus_charts = $ventesRepository->getRevenusChart($user);
        $depenses_chart = $bobinesRepository->getExpensesCharts($user);
        return $this->render('user/Dashboard/index.html.twig', [
            'imprimantes' => $totalPrinter,
            'actifs' => $printersActive,
            'depensest' => $expensest,
            'depensesm' => $expensesm,
            'impressions' => $piecest,
            'total' => $piecesm,
            'revenust' => $revenust,
            'revenusm' => $revenusm,
            'vente_chart' => $ventes_chart,
            'revenus_chart' => $revenus_charts,
            'depenses_chart' => $depenses_chart,
        ]);
    }

    #[Route('/filament', name: 'filament_user')]
    public function courbes(CategorieRepository $categorieRepository): Response
    {
        return $this->render('user/filament.html.twig', [
            'types' => $categorieRepository->findAll(),
        ]);
    }
    #[Route('/stock', name: 'stock_user')]
    public function stock(BobinesRepository $bobinesRepository): Response
    {
        return $this->render('user/gestion/stock.html.twig', [
            'stocks' => $bobinesRepository->findBy(
                ['gestionnaire' => $this->getUser()->getId()],
                ['id' => 'DESC'],
                10
            ),
        ]);
    }

    #[Route('/impressions', name: 'impression_user')]
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

    #[Route('/imprimantes', name: 'imprimante_user')]
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

    #[route('/imprimantes/desactiver/{id}', name: 'imprimante_desactiver_user', methods: ['GET'])]
    public function desactiver($id, ImprimantesRepository $imprimante, EntityManagerInterface $entityManager): Response
    {
        $imprimante->desactiverImprimante($id);
        $entityManager->flush();
        return $this->redirectToRoute('imprimante_user');
    }
    

    #[Route('/stock/ajoutBobines', name: 'ajoutb_user')]
    public function ajoutbobi(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bobines = new Bobines();
        $form = $this->createForm(AjoutbobinesFormType::class, $bobines);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bobines->setGestionnaire(
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

    #[Route('/imprimantes/ajout', name: 'ajoutimpri_user')]
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

    #[Route('/impressions/ajout', name: 'ajoutimpress_user')]
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

    #[Route('/account', name: 'account_user')]
    public function account(UsersRepository $userRepository): Response
    {
        $user_list = $userRepository->findBy(
            ['id' => $this->getUser()->getId()],
            ['id' => 'DESC'],
            10
        );
        return $this->render('user/Settings/account.html.twig', [
            'users' => $user_list,
        ]);
    }

    #[Route('/ventes', name: 'ventes_user')]
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

    #[Route('/budget', name: 'compte_user')]
    public function comptes(BobinesRepository $bobinesRepository, VentesRepository $ventesRepository): Response
    {
        $expensesm = 0;
        $revenusm = 0;
        $expensest = 0;
        $revenust = 0;

        $user = $this->getUser();
        $expensest = $bobinesRepository->getExpensetUsers($user);
        $revenust = $ventesRepository->getProfitt($user);
        $expensesm = $bobinesRepository->getExpensemUsers($user);
        $revenusm = $ventesRepository->getProfitm($user);
        
        return $this->render('user/comptes/budget.html.twig', [
            'recettet' => $revenust,
            'depenset' => $expensest,
            'recettem' => $revenusm,
            'depensem' => $expensesm,
            'budgetM' => [
                'revenus' => $revenusm,
                'depenses' => $expensesm,
            ],
            'budgetT' => [
                'revenus' => $revenust,
                'depenses' => $expensest,
            ],
        ]);
    }
}