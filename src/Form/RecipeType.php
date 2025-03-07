<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\Ingredient;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('time', NumberType::class, [
                'required' => false,
                'label' => 'Temps (en minutes)',
            ])
            ->add('nbPeople', NumberType::class, [
                'required' => false,
                'label' => 'Nombre de personnes',
            ])
            ->add('difficulty', ChoiceType::class, [
                'choices' => [
                    'Facile' => 1,
                    'Moyen' => 2,
                    'Difficile' => 3,
                    'Très difficile' => 4,
                    'Expert' => 5
                ],
                'label' => 'Difficulté',
            ])
            ->add('description', TextareaType::class)
            ->add('price', NumberType::class, [
                'required' => false,
                'label' => 'Prix estimé (€)',
            ])
            ->add('isFavorite')
            ->add('ingredients', EntityType::class, [
                'class' => Ingredient::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true, // Checkbox
                'label' => 'Ingrédients',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
