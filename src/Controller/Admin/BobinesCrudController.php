<?php

namespace App\Controller\Admin;

use App\Entity\Bobines;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BobinesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bobines::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('categorie')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ]),
            IdField::new('Poids'),
            TextField::new('Prix'),
            TextField::new('couleur'),
            AssociationField::new('couleur')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ]),
            DateField::new('date_ajout')->setTimezone('Europe/Paris'),
        ];
    }
}
