<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 18.01.15
 * Time: 17:44
 */
namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class RightWidgetEvent extends Event
{
    private $content = array();
    
    private $container;
    
    /**
     * Set container
     * 
     * @param type $container
     * @return \AppBundle\Event\RightWidgetEvent
     */
    public function setContainer($container)
    {
        $this->container = $container;
        
        return $this;
    }
    
    /**
     * Get container
     * 
     * @return type
     */
    public function getContainer()
    {
        return $this->container;
    }
    
    public function addWidget($content)
    {
        $this->content[] = $content;
    }
 
    public function getWidgets()
    {
        return $this->content;
    }
}