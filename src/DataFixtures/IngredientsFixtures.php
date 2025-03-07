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
        // /**
        //  * @var \Faker\Generator
        //  */
        // $faker = Factory::create('fr_FR');


        // for ($i=0; $i <50 ; $i++) { 
        //     $ingredient = new Ingredient();
        // $ingredient->setName($faker->word());
        // $ingredient->setPrice($faker->randomFloat(2,0.1,100));

        // $manager->persist($ingredient);
        // }

        // $manager->flush();


        // Liste des ingrédients réels avec leurs prix (en euros)
    $ingredients = [
        ['name' => 'Farine', 'price' => 1.20],
        ['name' => 'Sucre', 'price' => 1.50],
        ['name' => 'Sel', 'price' => 0.80],
        ['name' => 'Beurre', 'price' => 2.50],
        ['name' => 'Lait', 'price' => 1.00],
        ['name' => 'Œufs', 'price' => 2.80],
        ['name' => 'Fromage râpé', 'price' => 3.00],
        ['name' => 'Tomates', 'price' => 2.00],
        ['name' => 'Oignons', 'price' => 1.20],
        ['name' => 'Ail', 'price' => 1.50],
        ['name' => 'Pommes de terre', 'price' => 1.80],
        ['name' => 'Carottes', 'price' => 1.60],
        ['name' => 'Courgettes', 'price' => 2.20],
        ['name' => 'Poulet (500g)', 'price' => 5.00],
        ['name' => 'Viande hachée (500g)', 'price' => 6.50],
        ['name' => 'Saumon (filet)', 'price' => 12.00],
        ['name' => 'Thon (boîte)', 'price' => 2.00],
        ['name' => 'Crème fraîche', 'price' => 1.80],
        ['name' => 'Huile d\'olive', 'price' => 6.00],
        ['name' => 'Vinaigre balsamique', 'price' => 3.50],
        ['name' => 'Poivre', 'price' => 2.00],
        ['name' => 'Paprika', 'price' => 2.20],
        ['name' => 'Cumin', 'price' => 2.00],
        ['name' => 'Cannelle', 'price' => 2.50],
        ['name' => 'Levure chimique', 'price' => 1.00],
        ['name' => 'Chocolat noir (tablette)', 'price' => 2.20],
        ['name' => 'Miel', 'price' => 3.50],
        ['name' => 'Confiture', 'price' => 2.80],
        ['name' => 'Pain (baguette)', 'price' => 1.20],
        ['name' => 'Riz (1kg)', 'price' => 2.00],
        ['name' => 'Pâtes (1kg)', 'price' => 1.80],
        ['name' => 'Lentilles (500g)', 'price' => 2.20],
        ['name' => 'Pois chiches (500g)', 'price' => 2.50],
        ['name' => 'Yaourt (pack de 4)', 'price' => 2.80],
        ['name' => 'Jus d\'orange (1L)', 'price' => 3.00],
        ['name' => 'Vin rouge (bouteille)', 'price' => 8.00],
        ['name' => 'Bière (pack de 6)', 'price' => 7.50],
        ['name' => 'Eau (pack de 6)', 'price' => 3.00],
        ['name' => 'Salade', 'price' => 1.50],
        ['name' => 'Concombre', 'price' => 1.20],
        ['name' => 'Poivrons', 'price' => 2.50],
        ['name' => 'Champignons', 'price' => 3.00],
        ['name' => 'Basilic frais', 'price' => 2.00],
        ['name' => 'Persil frais', 'price' => 1.50],
        ['name' => 'Menthe fraîche', 'price' => 1.50],
        ['name' => 'Ananas (entier)', 'price' => 3.50],
        ['name' => 'Fraises (250g)', 'price' => 3.20],
        ['name' => 'Pommes (1kg)', 'price' => 2.80],
        ['name' => 'Banane (1kg)', 'price' => 2.20],
    ];

    foreach ($ingredients as $data) {
        $ingredient = new Ingredient();
        $ingredient->setName($data['name']);
        $ingredient->setPrice($data['price']);

        $manager->persist($ingredient);
    };

    $manager->flush();
}
}
