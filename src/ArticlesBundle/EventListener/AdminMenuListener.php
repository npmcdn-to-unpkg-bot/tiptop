<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 18.01.15
 * Time: 12:25
 */

namespace ArticlesBundle\EventListener;

use AppBundle\Event\MenuEvent;

class AdminMenuListener
{
    public function onAdminMenuBuild(MenuEvent $event)
    {
        $event->addItem('articles_admin_index', 'Новости');
    }
}