<?php
namespace App\Form\DataTransformer;

use App\Entity\Ingredients;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class IngredientsTransformer implements DataTransformerInterface
{

    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
    }

    
    public function transform($value)
    {
        if (!$value instanceof Ingredients) {
            return '';
        }

        return $value->getId();
    }


    // quand on fait le submit
    public function reverseTransform($value)
    {
        if (!$value) {
            return null;
        }

        // Load the Ingredients entity using the ID
        $ingredients = $this->entityManager->getRepository(Ingredients::class)->find($value);

        if (!$ingredients) {
            throw new TransformationFailedException(sprintf(
                'The Ingredients with ID "%s" does not exist!',
                $value
            ));
        }

        return $ingredients;
    }
}
