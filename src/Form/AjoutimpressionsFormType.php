<?php

namespace App\Form;

use App\Entity\Impressions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutimpressionsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('temps')
            // ->add('date')
            ->add('poids')
            ->add('imprimantes')
            // ->add('utilisateur')
            ->add('couleur')
            ->add('categorie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Impressions::class,
        ]);
    }
}
