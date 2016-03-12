<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 18.01.15
 * Time: 12:25
 */

namespace AdsBundle\EventListener;

use AppBundle\Event\MenuEvent;

class AdminMenuListener
{
    public function onAdminMenuBuild(MenuEvent $event)
    {
        $event->addItem('_ads_admin_index', 'Обьявления');
    }
}