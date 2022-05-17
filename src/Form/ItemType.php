<?php

namespace App\Form;

use App\Entity\ItemChose;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('itemName')
            ->add('itemPrice')
            ->add('string')
            // ->add('payments')
            ->add('pricePromo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ItemChose::class,
        ]);
    }
}
