<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 18.01.15
 * Time: 17:44
 */
namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class RightMenuEvent extends Event
{
    private $items = array();
    
    public function addItem($path, $name)
    {
        $this->items[] = array(
            'path' => $path,
            'name' => $name
        );
    }
 
    public function getItems()
    {
        return $this->items;
    }
}