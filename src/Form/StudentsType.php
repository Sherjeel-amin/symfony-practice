<?php

namespace App\Form;

use App\Entity\Students;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class StudentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Name',
            'attr' => [
                'placeholder' => 'Enter your name'
            ]
        ])
        ->add('Department', TextType::class, [
            'label' => 'Department',
            'attr' => [
                'placeholder' => 'Enter your Department'
            ]
        ])
        ->add('EnrollmentId', TextType::class, [
            'label' => 'Enrollment',
            'attr' => [
                'placeholder' => 'Enter your Id here'
            ]
        ])
            ->add('address')
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Students::class,
        ]);
    }
}
