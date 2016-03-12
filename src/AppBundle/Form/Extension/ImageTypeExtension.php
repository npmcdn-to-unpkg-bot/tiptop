<?php 

namespace AppBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ImageTypeExtension extends AbstractTypeExtension
{
    protected $imagePath = NULL;
    
    /**
     * Returns the name of the type being extended.
     *
     * @return string The name of the type being extended
     */
    public function getExtendedType()
    {
        return 'file';
    }
    
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
        return $this;
    }
    
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * Add the image_path option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('image_path'));
    }

    /**
     * Pass the image URL to the view
     *
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if ( empty($this->imagePath) )
        {
            $parentData = $form->getParent()->getData();
            if (isset($parentData) && is_object($parentData)) {
                $image = $parentData->getImage();
                if (isset($image)) {
                    $imageUrl = $parentData->getWebPath();
                    $this->imagePath = $imageUrl;
                }
            }
        }
        $view->vars['image_path'] = $this->imagePath;
    }
}