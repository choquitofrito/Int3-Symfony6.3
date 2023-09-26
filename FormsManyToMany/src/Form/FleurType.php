<?php

namespace App\Form;

use App\Entity\Fleur;
use App\Entity\Saison;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FleurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prix')
            
            ->add('saisons', EntityType::class, [
                'class' => Saison::class,
                'choice_label' => 'nom',
                // les combinaisons de ces paramètres détermineront le type de
                // liste de choix : liste, liste déroulante, checkbox ou
                // radiobuttons
                'multiple' => true,
                'expanded' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fleur::class,
        ]);
    }
}
