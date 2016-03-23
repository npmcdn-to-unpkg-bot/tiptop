<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array('label' => 'Название'))
            ->add('slug', 'text', array('label' => 'Название в ссылке'))
            ->add('image', 'file', array('label' => 'Иконка', 'data_class' => null))
            ->add('nameInMenu', 'text', array('label' => 'Название в меню'))
            ->add('body', 'textarea', array('required' => false, 'label' => 'Содержание'))
            ->add('keywords', 'text', array('label' => 'Keywords (для SEO)'))
            ->add('description', 'text', array('label' => 'Description (для SEO)'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Page'
        ));
    }

    public function getName()
    {
        return 'page';
    }
}
