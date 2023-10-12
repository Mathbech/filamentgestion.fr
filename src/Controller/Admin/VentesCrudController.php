<?php

namespace App\Controller\Admin;

use App\Entity\Ventes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VentesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ventes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom_produit'),
            TextEditorField::new('description_produit'),
            IdField::new('prix_produit'),
            DateField::new('date_vente'),
            AssociationField::new('clients')
            ->setFormTypeOptions([
                'by_reference' => false,
            ]),
        ];
    }
    
}
