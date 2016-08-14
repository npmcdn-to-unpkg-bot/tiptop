<?php

namespace ArticlesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('attr' => ['class' => 'form-control'], 'label' => 'Название', 'label_attr' => ['class' => 'input-group-addon']))
            ->add('image', FileType::class, array('label' => 'Главное Фото', 'data_class' => null))
            ->add('body', TextareaType::class, array('attr' => ['class' => 'form-control'],'required' => false, 'label' => 'Содержание', 'label_attr' => ['class' => 'input-group-addon']))
            ->add('submit', SubmitType::class, array('attr' => ['class' => 'form-control'],'label' => 'Отправить'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ArticlesBundle\Entity\Article'
        ));
    }

    public function getName()
    {
        return 'articlesbundle_articletype';
    }
}
