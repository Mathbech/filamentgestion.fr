<?php

namespace App\Controller\Admin;

use App\Entity\Consommation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ConsommationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Consommation::class;
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
