<?php

declare(strict_types=1);

namespace App\Form\Type;

use DateTime;
use DateTimeInterface;
use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Length;


class ProductType extends AbstractType{

    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code', TextType::class)
            ->add('name', TextType::class)
            ->add('category', IntegerType::class)
            ->add('created_at', DateType::class)
            ->add('updated_at',DateType::class);
            // ->add('description', TextTy:class, [
            //     'constrains' => [
            //         new NotNull(),
            //     ]
            // ])
            // ->add('price', IntegerType::class, [
            //     'constrains' => [
            //         new NotNull(),
            //     ]
            // ])
            // ->add('brand', IntegerType::class, [
            //     'constrains' => [
            //         new NotNull(),
            //     ]
            // ])
            // ->add('category', IntegerType::class, [
            //     'constrains' => [
            //         new NotNull(),
            //     ]
            // ])
            // ->add('price', MoneyType::class, [
            //     'constrains' => [
            //         new NotNull(),
            //     ]
            // ])

    }

    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }

}