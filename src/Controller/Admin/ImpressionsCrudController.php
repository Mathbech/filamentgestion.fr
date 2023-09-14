<?php

namespace App\Controller\Admin;

use App\Entity\Impressions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ImpressionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Impressions::class;
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
