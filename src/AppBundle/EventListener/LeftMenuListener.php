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
        $event->addItem('app_admin_settings', 'Настройки');
        $event->addItem('app_admin_pages', 'Странички');
    }
}