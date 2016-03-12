<?php

namespace Kit\GalleriesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GalleryImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', 'file', array('required' => true, 'label' => 'Добавить изображение'))
            ->add('gallery_id', 'hidden', array())
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kit\GalleriesBundle\Entity\GalleryImage'
        ));
    }

    public function getName()
    {
        return 'kit_galleriesbundle_galleryimagetype';
    }
}
