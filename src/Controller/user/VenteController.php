<?php

namespace App\Controller\user;


use App\Entity\Clients;
use App\Entity\Ventes;
use App\Form\AjoutclientFormType;
use App\Form\VentesFormType;
use App\Repository\ClientsRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_USER')]
#[Route(path: "/user/vente")]

class VenteController extends AbstractController
{
    #[Route('/', name: 'caisse_user')]
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
        return $this->render('user/Vente/caisse.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/nouvclient', name: 'addclient_user')]
    public function client(Request $request, EntityManagerInterface $entityManager): Response
    {
        $client = new Clients();
        $form = $this->createForm(AjoutclientFormType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client->setDateInscription(
                new \DateTime('now')
            );

            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('caisse_user');
        }
        return $this->render('user/Vente/addclients.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/clients', name: 'listclient_user')]
    public function lclient(ClientsRepository $clientsRepository): Response
    {

        return $this->render('user/Vente/listclient.html.twig', [
            'clients'=>$clientsRepository->findAll(),
        ]);
    }
}
