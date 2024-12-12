<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class IngredientsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /**
         * @var \Faker\Generator
         */
        $faker = Factory::create('fr_FR');


        for ($i=0; $i <50 ; $i++) { 
            $ingredient = new Ingredient();
        $ingredient->setName($faker->word());
        $ingredient->setPrice($faker->randomFloat(2,0.1,100));

        $manager->persist($ingredient);
        }

        $manager->flush();
    }
}
