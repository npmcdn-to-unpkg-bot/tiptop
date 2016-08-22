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
    /**
     * Content
     *
     * @var type 
     */
    private $content = array();
    
    /**
     * Container
     *
     * @var type 
     */
    private $container;
    
    /**
     * User
     * 
     * @var type 
     */
    private $user;
    
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
    
    /**
     * Entity Manager
     * 
     * @param type $em
     * @return \AppBundle\Event\RightWidgetEvent
     */
    public function setEntityManager($em)
    {
        $this->em = $em;
        
        return $this;
    }
    
    /**
     * Entiyt Manager
     * 
     * @return type
     */
    public function getEntityManager()
    {
        return $this->em;
    }
    
    /**
     * Set User
     * 
     * @param type $user
     * @return \AppBundle\Event\RightWidgetEvent
     */
    public function setUser($user)
    {
        $this->user = $user;
        
        return $this;
    }
    
    /**
     * Get User
     * 
     * @return type
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Add Widget
     * 
     * @param type $content
     */
    public function addWidget($content)
    {
        $this->content[] = $content;
    }
 
    /**
     * Get Widgets
     * 
     * @return type
     */
    public function getWidgets()
    {
        return $this->content;
    }
}