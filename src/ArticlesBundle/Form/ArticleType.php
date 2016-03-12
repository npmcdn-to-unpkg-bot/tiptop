<?php

namespace Kit\ArticlesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array('label' => 'Название'))
            ->add('body', 'textarea', array('required' => false, 'label' => 'Содержание'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kit\ArticlesBundle\Entity\Article'
        ));
    }

    public function getName()
    {
        return 'kit_articlesbundle_articletype';
    }
}
