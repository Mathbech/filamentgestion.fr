<?php

namespace App\Controller\Admin;

use App\Entity\Ventes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VentesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ventes::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
