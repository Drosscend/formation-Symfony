<?php

namespace App\Form;

use App\Entity\Chanson;
use App\Entity\Artiste;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChansonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                "attr" => ["placeholder" => "Le nom de la chanson..."],
                "required" => true
            ])
            ->add('dateSortie', DateType::class, [
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
                'required' => true
            ])
            ->add('artistes', EntityType::class, [
                'class' => Artiste::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'required' => false,
                'expanded' => true 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chanson::class,
        ]);
    }
}
