<?php

namespace Kit\GalleriesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GalleryType extends AbstractType
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
            'data_class' => 'Kit\GalleriesBundle\Entity\Gallery'
        ));
    }

    public function getName()
    {
        return 'kit_galleriesbundle_gallerytype';
    }
}
