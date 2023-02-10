<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Entrez votre prénom'
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Entrez votre nom'
                ]
            ])
            ->add('email', emailType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Entrez votre email'
                ]
            ])
            ->add('formation', ChoiceType::class, [
                'label' => 'Formation concernée',
                'attr' => [
                    'placeholder' => 'Pour quelle formation?'
                ],
                'choices' => [
                    'Formation SST' => "SST",
                    'Formation MAC SST' => "MAC SST",
                    'Formation Equipier de première intervention' => 'EPI',
                    'Formation Premier témoin incendie' => 'Temoin incendie',
                    'Equipier d\'intervention' => 'Equipier Intervention',
                ]
            ])
            ->add('comment', TextareaType::class, [
                'label' => 'Commentaire',
                'attr' => [
                    'placeholder' => 'Expliquez votre sujet'
                ]
            ]);
    }
}