<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RouteType extends AbstractType
{
    protected $router;
    
    public function __construct( \Symfony\Bundle\FrameworkBundle\Routing\Router $router)
    {
        $this->router = $router;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $allRouters = array_keys( $this->router->getRouteCollection()->all() );
                
        $resolver->setDefaults(array(
            'choices' => array_combine($allRouters, $allRouters)
        ));
    }

    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'route';
    }
}