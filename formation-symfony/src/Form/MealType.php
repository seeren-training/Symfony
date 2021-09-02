<?php

namespace App\Form;

use App\Entity\Meal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MealType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxAttendees', RangeType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 10
                ]
            ])
            ->add('date', DateTimeType::class, [
                "data" => new \DateTime()
            ])
            ->add('name', TextType::class)
            ->add('description', TextareaType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Meal::class,
        ]);
    }

}
