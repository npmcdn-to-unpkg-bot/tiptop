<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label' => 'Название'))
            ->add('slug', TextType::class, array('label' => 'Название в ссылке'))
            ->add('image', FileType::class, array('required' => false, 'label' => 'Иконка', 'data_class' => null))
            ->add('nameInMenu', TextType::class, array('label' => 'Название в меню'))
            ->add('body', TextareaType::class, array('required' => false, 'label' => 'Содержание'))
            ->add('keywords', TextType::class, array('label' => 'Keywords (для SEO)'))
            ->add('description', TextType::class, array('label' => 'Description (для SEO)'))
            ->add('save', SubmitType::class)
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Page',
        ));
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
