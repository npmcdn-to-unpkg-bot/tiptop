<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 18.01.15
 * Time: 12:25
 */

namespace AppBundle\EventListener;

use AppBundle\Event\RightMenuEvent;

class RightMenuListener
{
    public function onRightMenuBuild(RightMenuEvent $event)
    {
        $event->addItem('_ads_index', 'Новости');
        //$event->addItem('_system_admin_pages', 'Странички');
    }
}