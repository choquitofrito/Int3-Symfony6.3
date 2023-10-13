<?php

namespace App\Form;

use App\Entity\Ingredients;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\DetailsRecette;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Form\DataTransformer\IngredientsTransformer;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class DetailsRecetteType extends AbstractType
{

    private IngredientsTransformer $ingTr;

    public function __construct(IngredientsTransformer $ingTr)
    {
        $this->ingTr = $ingTr;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder
            ->add(
                'quantite',
                NumberType::class,

                // on ne mettra pas ici de contraintes car on ne les gére pas actuellement en js
                // ['constraints' => [
                //     new Assert\Positive(),
                //     new Assert\LessThan(10000)
                // ]
                //]
            )
            ->add('mesure', TextType::class)
            ->add(
                'ingredients',
                HiddenType::class,
                [
                    'attr' => [
                        'class' => 'hidden_detail_ingredient',
                    ]
                ]
            )
            ->get('ingredients')
            ->addModelTransformer($this->ingTr);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DetailsRecette::class,
        ]);
    }
}
