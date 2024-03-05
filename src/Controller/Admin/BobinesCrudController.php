<?php

namespace App\Controller\Admin;

use App\Entity\Bobines;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class BobinesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bobines::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('Poids'),
            IdField::new('Prix'),
            DateTimeField::new('date_ajout'),
            AssociationField::new('couleur')
            ->setFormTypeOptions([
                'by_reference' => false,
            ]),
            AssociationField::new('categorie')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ]),
            AssociationField::new('gestionnaire')->autocomplete(),
        ];
    }
}
