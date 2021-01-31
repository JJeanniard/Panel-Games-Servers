<?php

namespace App\Form;

use App\Entity\Dedier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DedierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sshLogin')
            ->add('sshPassword')
            ->add('sshKey')
            ->add('description')
            ->add('sshPort')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dedier::class,
        ]);
    }
}
