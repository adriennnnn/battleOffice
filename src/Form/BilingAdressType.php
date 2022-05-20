<?php

namespace App\Form;

use App\Entity\BilingAdress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class BilingAdressType extends AbstractType
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
                    'france' => 'france',
                    'belgique' => 'belgique',
                    'luxembourg' => 'luxembourg',
                ],
            ])   
            ->add('phone')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BilingAdress::class,
        ]);
    }
}
