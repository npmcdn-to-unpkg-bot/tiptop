<?php

namespace Kit\AdsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', 'file', array('label' => 'Иконка', 'data_class' => null))
            ->add('title', 'text', array('label' => 'Название'))
            ->add('body', 'textarea', array('required' => false, 'label' => 'Содержание'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kit\AdsBundle\Entity\Ad'
        ));
    }

    public function getName()
    {
        return 'ad';
    }
}
