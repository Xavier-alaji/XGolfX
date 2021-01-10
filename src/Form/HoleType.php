<?php

namespace App\Form;

use App\Entity\Hole;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number')
            ->add('par')
            ->add('distance')
            ->add('handicap')
            ->add('created_at')
            ->add('updated_at')
            ->add('created_by')
            ->add('updated_by')
            ->add('course_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Hole::class,
        ]);
    }
}
