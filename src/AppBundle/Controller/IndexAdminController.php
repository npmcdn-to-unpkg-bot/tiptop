<?php

namespace AppBundle\Controller;

use AppBundle\Event\MenuEvent;
use AppBundle\EventListener\AdminMenuListener;

class IndexAdminController extends AdminController
{
    public function indexAction()
    {
        return $this->render('AppBundle:IndexAdmin:index.html.twig');
    }
    
    public function menuAction($routeName)
    {
        $eventDispatcher = $this->get('event_dispatcher');

        $menuEvent = new MenuEvent();
        $eventDispatcher->dispatch('app.admin_menu', $menuEvent);
    
        return $this->render('AppBundle:IndexAdmin:menu.html.twig', array(
            'items' => $menuEvent->getItems(),
            'routeName' => $routeName
        ));
    }
}
