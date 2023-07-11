<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Form\FormBuilderInterface;

class PaysType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class)
            ->add('image', FileType::class, [
                'label' => "Sélectionner l'image du pays",

                'mapped' => false, // cette propriété ne sera pas affecté dans l'entité quand on envoie le formulaire. On doit la récuperer avec $form['image']->getData()
                'required' => false // l'utilisateur n'est pas obligé d'uploader un fichier
            ]);
    }
}
