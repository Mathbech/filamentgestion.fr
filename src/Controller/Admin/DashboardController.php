<?php

namespace App\Controller\Admin;

use App\Entity\Bobines;
use App\Entity\Categorie;
use App\Entity\Consommation;
use App\Entity\Couleur;
use App\Entity\Impressions;
use App\Entity\Imprimantes;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(UsersCrudController::class)->generateUrl();

        return $this->redirect($url);
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('app_login');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration');
    }

    
    public function configureMenuItems(): iterable
    {
        // MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        //yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linktoRoute('Retour a l\'accueil', 'fa fa-home', 'dash_public');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa-solid fa-user', Users::class);
        yield MenuItem::linkToCrud('Bobines', 'fa-solid fa-boxes-stacked', Bobines::class);
        yield MenuItem::linkToCrud('Catégorie', 'fa-solid fa-folder-tree', Categorie::class);
        yield MenuItem::linkToCrud('Couleur', 'fa-solid fa-palette', Couleur::class);
        yield MenuItem::linkToCrud('Imprimantes', 'fa-solid fa-print', Imprimantes::class);
        yield MenuItem::linkToCrud('Impressions', 'fa-solid fa-print fa-beat-fade', Impressions::class);
        yield MenuItem::linkToCrud('Consommation', 'fa-solid fa-dolly', Consommation::class);
    }

}
