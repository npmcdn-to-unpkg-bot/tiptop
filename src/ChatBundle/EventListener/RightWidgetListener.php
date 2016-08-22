<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 18.01.15
 * Time: 12:25
 */

namespace ChatBundle\EventListener;

use AppBundle\Event\RightWidgetEvent;
use ChatBundle\Entity\Chat;

class RightWidgetListener
{
    public function onRightWidgetBuild(RightWidgetEvent $event)
    {
        $container = $event->getContainer();
        
        if ($event->getUser())
        {
            $em = $event->getEntityManager();
            $chat = $em->getRepository('ChatBundle:Chat')->findAll();
            $response = $container->get('templating')->render('ChatBundle:Default:widget.html.twig', array(
                "chat" => $chat
            ));
            $event->addWidget($response);
        }
    }
}