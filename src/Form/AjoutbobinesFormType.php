<?php

namespace App\Form;

use App\Entity\Bobines;
use App\Entity\Categorie;
use App\Entity\Couleur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutbobinesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('poids', NumberType::class, array('attr' => ['class' => 'form-control']))
            ->add('prix', NumberType::class, array('attr' => ['class' => 'form-control']))
            // ->add('date_ajout')
            ->add('couleur', EntityType::class, array(
                'class' => Couleur::class,
                'attr' => ['class' => 'form-control']
                ))
            ->add('categorie', EntityType::class, array(
                'class' => Categorie::class,
                'attr' => ['class' => 'form-control']
                ))
            // ->add('utilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bobines::class,
        ]);
    }
}
