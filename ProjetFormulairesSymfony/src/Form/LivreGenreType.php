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

// la classe pour avoir une entité comme champ du formulaire
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Genre;
use App\Repository\GenreRepository;

class LivreGenreType extends AbstractType {
    
    
    
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ISBN', TextType::class)
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
                ])
                ->add ('genre', EntityType::class, [
                    'class' => Genre::class,
                    'query_builder' => function (GenreRepository $er){
                        return $er->createQueryBuilder('u')->orderBy ('u.nom','DESC');
                    },
                    // on affiche ici les noms et les descriptions en majuscules,
                    // mais c'est à vous de choisir la façon de l'afficher
                    'choice_label' => function ($x){
                        return strtoupper($x->getNom() . "-". $x->getDescription());
                    }
                    // 'choice_label' => function (GenreRepository $g) {
                    //     return $g->findAll();
                    // }
                ]);
    }
}