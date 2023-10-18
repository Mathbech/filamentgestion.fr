<?php

namespace App\Form;

use App\Entity\Clients;
use App\Entity\Ventes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VentesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_produit')
            ->add('description_produit')
            ->add('prix_produit')
            // ->add('date_vente')
            ->add('clients', EntityType::class, array(
                'class' => Clients::class,
                // requête pour récupérer les imprimantes de l'utilisateur
                // 'query_builder' => function (ImprimantesRepository $er) {
                //     return $er->createQueryBuilder('u')
                //         ->where('u.username = :user')
                //         ->setParameter('user', $this->security->getUser()->getId());
                // },
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
