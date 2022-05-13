<?php

namespace App\Form;

use App\Entity\DeliveryAdress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeliveryAdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('firstname')
            ->add('adress')
            ->add('complementAdress')
            ->add('city')
            ->add('postalCode')
            ->add('country', ChoiceType::class,[
                'choices'  => [
                    'france' => null,
                    'belgique' => true,
                    'luxembourg' => false,
                ],
            ])            ->add('Payement')
            ->add('phone')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DeliveryAdress::class,
        ]);
    }
}
