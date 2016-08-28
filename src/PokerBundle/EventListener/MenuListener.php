<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 18.01.15
 * Time: 12:25
 */

namespace PokerBundle\EventListener;

use AppBundle\Event\MenuEvent;

class MenuListener
{
    public function onMenuBuild(MenuEvent $event)
    {
        $event->addItem('app_admin_settings', 'Настройки');
        $event->addItem('app_admin_pages', 'Странички');
    }
}