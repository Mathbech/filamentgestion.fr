<?php

namespace App\Controller\Admin;

use App\Entity\Impressions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class ImpressionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Impressions::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('couleur')
            ->setFormTypeOptions([
                'by_reference' => false,
            ]),
            AssociationField::new('categorie')
            ->setFormTypeOptions([
                'by_reference' => false,
            ]),
            IdField::new('Poids'),
            AssociationField::new('imprimantes')
            ->setFormTypeOptions([
                'by_reference' => false,
            ]),
            TimeField::new('temps'),
            DateTimeField::new('date'),

            
            
            AssociationField::new('utilisateur')->autocomplete(),
        ];
    }
}
