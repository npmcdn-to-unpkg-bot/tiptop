<?php

namespace AppBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Doctrine\ORM\EntityManager;

class ExtraLoader extends Loader {
    
    private $loaded = false;
    
    protected $em;
    
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function load($resource, $type = null)
    {
        if (true === $this->loaded) {
            throw new \RuntimeException('Do not add the "extra" loader twice');
        }

        $collection = new RouteCollection();
        $activeBundles = $this->em->getRepository('AppBundle:Bundle')
                            ->findByIsActive(1);

        foreach ($activeBundles as $bundleName)
        {
            $resource = '@' . $bundleName->getName() . '/Resources/config/routing.yml';
            $type = 'yaml';
            $importedRoutes = $this->import($resource, $type);
            $collection->addCollection($importedRoutes);
        }

        $collection->addCollection($importedRoutes);

        $routeSettings = $this->em->getRepository('AppBundle:Setting')
                            ->find('system_mainpage_route');
        
        $routeSettingsParams = $this->em->getRepository('AppBundle:Setting')
                            ->find('system_mainpage_route_params');
        
        $options = $routeSettingsParams->getValue();

        $options = json_decode($options);
        $options = get_object_vars($options);

        $route = $collection->get( $routeSettings->getValue() );
        if ($route)
        {
            $route->addDefaults($options);
            $route->addOptions($options);
            $defaults = $route->getDefaults();
        }
        else {
            $defaults = array(
                '_controller' => 'ArticlesBundle:Index:index',
            );
        }

        $mainroute = new Route('/', $defaults);
        $collection->add('mainpage', $mainroute);

        return $collection;
    }

    public function supports($resource, $type = null)
    {
        return 'extra' === $type;
    }
}