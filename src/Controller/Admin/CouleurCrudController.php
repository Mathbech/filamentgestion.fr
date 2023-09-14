<?php

namespace App\Controller\Admin;

use App\Entity\Couleur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CouleurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Couleur::class;
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
