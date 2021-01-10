<?php

namespace App\Form;

use App\Entity\Shot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('blankshot')
            ->add('club_type')
            ->add('club_subtype')
            ->add('lie_type')
            ->add('lie_subtype')
            ->add('trajectory')
            ->add('wind_type')
            ->add('rain_type')
            ->add('created_at')
            ->add('updated_at')
            ->add('created_by')
            ->add('updated_by')
            ->add('hole_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Shot::class,
        ]);
    }
}
