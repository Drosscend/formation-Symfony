<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\User;
use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                "label" => false,
                "attr" => ["placeholder" => "the tittle..."],
                "required" => true
            ])
            ->add('slug', TextType::class)
            ->add('content', TextareaType::class)
            ->add('imageUrl', UrlType::class)
            ->add('createdAt', DateType::class, ['input' => 'datetime_immutable'])
            ->add('updatedAt', DateType::class, ['input' => 'datetime_immutable']) 
            // ->add('author')
            // ->add('categories')

            ->add('author', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'full_name',
                'multiple' => false,
                'required' => true ])

            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => true,
                'required' => false,
                'expanded' => true ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
