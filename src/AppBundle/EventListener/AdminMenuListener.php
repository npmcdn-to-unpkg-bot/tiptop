<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 18.01.15
 * Time: 12:25
 */

namespace AppBundle\EventListener;

use AppBundle\Event\MenuEvent;

class AdminMenuListener
{
    public function onAdminMenuBuild(MenuEvent $event)
    {
        $event->addItem('app_admin_settings', 'Настройки');
        $event->addItem('app_backend_pages_first', 'Странички');
    }
}