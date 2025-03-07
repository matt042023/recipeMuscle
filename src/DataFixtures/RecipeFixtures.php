<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RecipeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Récupérer tous les ingrédients déjà enregistrés
        $ingredients = $manager->getRepository(Ingredient::class)->findAll();

        // Liste de 20 recettes réelles
        $recipesData = [
            ["name" => "Pâtes Carbonara", "time" => 20, "difficulty" => 2, "nbPeople" => 2],
            ["name" => "Quiche Lorraine", "time" => 45, "difficulty" => 3, "nbPeople" => 4],
            ["name" => "Poulet au Curry", "time" => 35, "difficulty" => 3, "nbPeople" => 4],
            ["name" => "Ratatouille", "time" => 40, "difficulty" => 2, "nbPeople" => 4],
            ["name" => "Tartiflette", "time" => 60, "difficulty" => 3, "nbPeople" => 4],
            ["name" => "Pizza Margherita", "time" => 30, "difficulty" => 3, "nbPeople" => 2],
            ["name" => "Soupe à l'oignon", "time" => 40, "difficulty" => 2, "nbPeople" => 4],
            ["name" => "Lasagnes bolognaises", "time" => 90, "difficulty" => 4, "nbPeople" => 6],
            ["name" => "Gratin dauphinois", "time" => 60, "difficulty" => 3, "nbPeople" => 4],
            ["name" => "Salade César", "time" => 15, "difficulty" => 1, "nbPeople" => 2],
            ["name" => "Bœuf Bourguignon", "time" => 180, "difficulty" => 5, "nbPeople" => 6],
            ["name" => "Tarte Tatin", "time" => 50, "difficulty" => 3, "nbPeople" => 6],
            ["name" => "Clafoutis aux cerises", "time" => 45, "difficulty" => 2, "nbPeople" => 6],
            ["name" => "Crêpes Suzette", "time" => 25, "difficulty" => 2, "nbPeople" => 4],
            ["name" => "Coq au vin", "time" => 120, "difficulty" => 5, "nbPeople" => 6],
            ["name" => "Risotto aux champignons", "time" => 35, "difficulty" => 4, "nbPeople" => 4],
            ["name" => "Salade Niçoise", "time" => 20, "difficulty" => 2, "nbPeople" => 2],
            ["name" => "Omelette aux herbes", "time" => 10, "difficulty" => 1, "nbPeople" => 2],
            ["name" => "Moelleux au chocolat", "time" => 35, "difficulty" => 3, "nbPeople" => 6],
            ["name" => "Couscous", "time" => 90, "difficulty" => 4, "nbPeople" => 6]
        ];

        foreach ($recipesData as $data) {
            $recipe = new Recipe();
            $recipe->setName($data['name']);
            $recipe->setTime($data['time']);
            $recipe->setDifficulty($data['difficulty']);
            $recipe->setNbPeople($data['nbPeople']);
            $recipe->setDescription($faker->paragraph(3)); // Description aléatoire
            $recipe->setFavorite($faker->boolean(30)); // 30% de chance que la recette soit un favori

            // Sélection aléatoire de 3 à 6 ingrédients
            shuffle($ingredients);
            $selectedIngredients = array_slice($ingredients, 0, rand(3, 6));
            foreach ($selectedIngredients as $ingredient) {
                $recipe->addIngredient($ingredient);
            }

            // Calcul du prix total de la recette
            $totalPrice = array_sum(array_map(fn($ing) => $ing->getPrice(), $selectedIngredients));
            $recipe->setPrice($totalPrice);

            $manager->persist($recipe);
        }

        $manager->flush();
    }

    /**
     * Définit l'ordre des fixtures : IngredientsFixtures doit être exécutée en premier
     */
    public function getDependencies(): array
    {
        return [
            IngredientsFixtures::class,
        ];
    }
}
