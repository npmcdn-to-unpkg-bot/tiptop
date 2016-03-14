<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 18.01.15
 * Time: 12:25
 */

namespace AppBundle\EventListener;

use AppBundle\Event\LeftMenuEvent;

class LeftMenuListener
{
    public function onLeftMenuBuild(LeftMenuEvent $event)
    {exit("!!!");
        $event->addItem('_system_admin_settings', 'Настройки');
        $event->addItem('_system_admin_pages', 'Странички');
    }
}