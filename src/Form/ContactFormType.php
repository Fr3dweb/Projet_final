<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;



class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Entrez votre prénom'
                ],
                'row_attr' => [
                    'class' => "input-form-contact"
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Entrez votre nom'
                ],
                'row_attr' => [
                    'class' => "input-form-contact"
                ]
            ])
            ->add('email', emailType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Entrez votre email'
                ],
                'row_attr' => [
                    'class' => "input-form-contact"
                ]
            ])
            ->add('formation', ChoiceType::class, [
                'label' => 'Formation concernée',
                'attr' => [
                    'placeholder' => 'Pour quelle formation?'
                ],
                'row_attr' => [
                    'class' => "input-form-contact"
                ],
                'choices' => [
                    'Formation SST' => "SST",
                    'Formation MAC SST' => "MAC SST",
                    'Formation Equipier de première intervention' => 'EPI',
                    'Formation Premier témoin incendie' => 'Temoin incendie',
                    'Equipier d\'evacuation(Guides files-Serres files)' => 'Equipier Evac',
                    'Exercice d\'evacuation' => 'Exercice Evac',
                    'Troubles Musculo Squelettique (TMS)' => 'TMS',
                    'Chariots sans CACES (Gerbeur manuel-Transpalette)' => 'CACES',
                ]
            ])
            ->add('comment', TextareaType::class, [
                'label' => 'Commentaire',
                'attr' => [
                    'placeholder' => 'Expliquez votre sujet',
                    'style' => 'height:150px'
                ],
                'row_attr' => [
                    'class' => "input-form-contact"
                ]
            ]);
    }
}