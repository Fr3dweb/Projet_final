<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
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
            ->add('phone', TelType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'placeholder' => 'Entrez votre téléphone'
                ]
            ])
            ->add('formation', ChoiceType::class, [
                'label' => 'Formation concernée',
                'attr' => [
                    'placeholder' => 'Pour quelle formation?',
                    'choices' => [
                        'Formation SST',
                        'Formation MAC SST',
                        'Formation Equipier de première intervention',
                        'Formation Premier témoin incendie',
                        'Equipier d\'intervention'
                ]
            ])
            ->add('comment', TextareaType::class, [
                'label' => 'Commentaire',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Expliquez votre sujet'
                ]
            ]);
    }
}