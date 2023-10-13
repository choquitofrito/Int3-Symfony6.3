<?php

namespace App\DataFixtures;

use App\Entity\Recette;
use App\Entity\Ingredients;
use App\Entity\DetailsRecette;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DetailsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
    // on recupère toutes les recettes et tous les ingrédients
    $rep = $manager->getRepository(Recette::class);
    $recette = $rep->findAll();

    $rep = $manager->getRepository(Ingredients::class);
    $ingredient = $rep->findAll();

    // créer des DetailsRecette
    for ($i = 0; $i < 10; $i++) {
        // choisir une recette+un ingrédients au hasard
        $recetteChoisie = $recette[rand(0, count($recette) - 1)];
        $ingredientChoisi = $ingredient[rand(0, count($ingredient) - 1)];

        $detailRecette = new DetailsRecette();
        $detailRecette->setIngredients($ingredientChoisi);
        $detailRecette->setRecette($recetteChoisie);
        $detailRecette->setQuantite(rand(5, 20));
        $detailRecette->setMesure('gr');
        
        $recetteChoisie->addDetail($detailRecette);
        $ingredientChoisi->addDetail($detailRecette);

        $manager->persist($detailRecette);
    }
    $manager->flush();
}

public function getDependencies()
{
    return ([
        IngredientsFixtures::class,
        RecetteFixtures::class
    ]);
}
}