<?php

namespace App\Controller\Admin;

use App\Entity\Imprimantes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ImprimantesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Imprimantes::class;
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
