<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\PositiveOrZero;
use Symfony\Component\Validator\Constraints\Required;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',TextType::class,[
                
            ])
            ->add('description',TextareaType::class,[
                
            ])
            ->add('price',NumberType::class,[
                'constraints' =>[
                    new PositiveOrZero(message:'veuillez entrer un chiffre entier'),
                    new NotBlank(message:'veuillez entrer une valeur')
                ],
                'attr' => [
                    'placeholder' => 'entrer un chiffre'
                ]
            ])
            ->add('bedroom',NumberType::class,[

                'constraints' =>[
                    new PositiveOrZero(message:'veuillez entrer un chiffre entier'),
                    new NotBlank(message:'veuillez entrer une valeur')
                ],
                ]
            )
            ->add('bathroom',NumberType::class,)
            ->add('year',DateType::class,[
                'widget' => 'single_text',
            ])
            ->add('floor',NumberType::class,)
            ->add('buildingCondition',TextType::class)
            ->add('livingArea',NumberType::class)
            ->add('kitchenType',TextType::class)
            ->add('energyClass',ChoiceType::class,)
            ->add('numberClass',TextType::class)
            ->add('adress',TextType::class)
            ->add('zipCod',TextType::class)
            ->add('city',TextType::class)
            ->add('state',ChoiceType::class,[
                'choices' => ['louer' => 'louer', 'acheter' => 'acheter']
                ,
                'choice_attr' => [
                    'louer' => ['data-color' => 'Red'],
                    'acheter' => ['data-color' => 'Yellow'],
                ],
            ])
            ->add('category',EntityType::class,[
                'class' => Category::class,
                'choice_label' => 'title'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
