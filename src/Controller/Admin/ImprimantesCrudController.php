<?php

namespace App\Controller\Admin;

use App\Entity\Imprimantes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImprimantesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Imprimantes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('type_imprimante'),
            TextField::new('nom_imprimante'),
            TextField::new('marque'),
            DateTimeField::new('deleted'),
            AssociationField::new('username')->autocomplete(),
        ];
    }
    
}
