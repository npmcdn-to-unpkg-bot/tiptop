<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 18.01.15
 * Time: 12:25
 */

namespace AppBundle\EventListener;

use AppBundle\Event\MenuEvent;

class MenuListener
{
    public function onMenuBuild(MenuEvent $event)
    {
        $event->addItem('_system_admin_settings', 'Настройки');
        $event->addItem('_system_admin_pages', 'Странички');
    }
}