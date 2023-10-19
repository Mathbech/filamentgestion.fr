<?php

namespace App\Form;

use App\Entity\Clients;
use App\Entity\Ventes;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VentesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_produit', TextType::class, array('attr' => ['class' => 'form-control']))
            ->add('description_produit', TextareaType::class, array('attr' => ['class' => 'form-control']))
            ->add('prix_produit', NumberType::class, array('attr' => ['class' => 'form-control']))
            // ->add('date_vente')
            ->add('clients', EntityType::class, array(
                'class' => Clients::class,
                'attr' => ['class' => 'form-control']
                ))
            // ->add('vendeur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ventes::class,
        ]);
    }
}
