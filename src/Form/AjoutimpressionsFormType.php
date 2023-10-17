<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Impressions;
use App\Entity\Imprimantes;
use App\Entity\Couleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutimpressionsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('temps', TimeType::class, array('attr' => ['class' => 'form-control']))
            // ->add('date')
            ->add('poids', NumberType::class, array('attr' => ['class' => 'form-control']))
            ->add('imprimantes', EntityType::class, array(
                'class' => Imprimantes::class,
                'attr' => ['class' => 'form-control']
                ))
            // ->add('utilisateur')
            ->add('couleur', EntityType::class, array(
                'class' => Couleur::class,
                'attr' => ['class' => 'form-control']
                ))
            ->add('categorie', EntityType::class, array(
                'class' => Categorie::class,
                'attr' => ['class' => 'form-control']
                ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Impressions::class,
        ]);
    }
}
