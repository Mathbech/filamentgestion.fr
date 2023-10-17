<?php

namespace App\Form;

use App\Entity\Imprimantes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutimprimantesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type_imprimante', TextType::class, array('attr' => ['class' => 'form-control']))
            ->add('nom_imprimante', TextType::class, array('attr' => ['class' => 'form-control']))
            // ->add('deleted', DateTimeType::class, array('attr' => ['class' => 'form-control']))
            // ->add('username')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Imprimantes::class,
        ]);
    }
}
