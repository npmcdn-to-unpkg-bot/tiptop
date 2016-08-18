<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 18.01.15
 * Time: 12:25
 */

namespace ChatBundle\EventListener;

use AppBundle\Event\RightWidgetEvent;

class RightWidgetListener
{
    public function onRightWidgetBuild(RightWidgetEvent $event)
    {
        $container = $event->getContainer();
        $response = $container->get('templating')->render('ChatBundle:Default:widget.html.twig', array(

        ));
        $event->addWidget($response);
    }
}