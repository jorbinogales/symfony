<?php

declare(strict_types=1);

namespace App\Form\Type;

use DateTime;
use DateTimeInterface;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotNull;


class CategoryType extends AbstractType{

    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('active', TextType::class)
            ->add('created_at', DateType::class, array(
                'data' => new \DateTime()
            ))
            ->add('updated_at',DateType::class, array(
                'data' => new \DateTime()
            ));

    }

    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }

}