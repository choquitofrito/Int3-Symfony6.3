<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class LivreType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('isbn', TextType::class)
                ->add('titre', TextareaType::class)
                ->add('prix', MoneyType::class)
                ->add('description', TextareaType::class)
                ->add('datePublication', DateType::class,[
                        'label' => 'Date de publication'
                ])
                ->add('nombrePages', IntegerType::class, [
                        'label' => 'Nombre de pages',
                        'required' => false
                ])
                ->add('langue', LanguageType::class, [
                        'label' => 'Langue du livre',
                        'preferred_choices' => ['es','fr','it']
                ])
                ->add ('format', ChoiceType::class, [
                        'choices' => [
                            'eBook' => 'ebook',
                            'papier' => 'papier'
                        ],
                        // les combinaisons de ces paramètres détermineront le type de
                        // liste de choix : liste, liste déroulante, checkbox ou
                        // radiobuttons
                        'expanded' => false,
                        'multiple' => false
                ]);
    }
}