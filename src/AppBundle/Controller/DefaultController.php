<?php

namespace AppBundle\Controller;

use AppBundle\Controller\BaseController;
use AppBundle\Entity\PageRepository;
use AppBundle\Event\LeftMenuEvent;
use AppBundle\Event\RightMenuEvent;
use AppBundle\Event\RightWidgetEvent;
//use GalleriesBundle\Entity\GalleryRepository as KitGalleriesBundle;
//use GalleriesBundle\Entity\Gallery as Gallery;

class DefaultController extends BaseController
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('AppBundle:Page')
            ->findBySlug('home');

        $homePage = ( is_array($pages) ) ? $pages[0] : null;

        return $this->render('AppBundle:Default:index.html.twig', array(
            'homePage' => $homePage
        ));
    }

    public function menuAction($routeName)
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('AppBundle:Page')
            ->findAll();

        return $this->render('AppBundle:Default:menu.html.twig', array(
            'pages' => $pages,
            'routeName' => $routeName
        ));
    }

    /**
     * Right menu
     * 
     * @param type $routeName
     * @return type
     */
    public function rightMenuAction($routeName)
    {
        $eventDispatcher = $this->get('event_dispatcher');
        $rightMenuEvent = new RightMenuEvent();
        $eventDispatcher->dispatch('app.right_menu', $rightMenuEvent);

        return $this->render('AppBundle:Default:right-menu.html.twig', array(
            'items' => $rightMenuEvent->getItems(),
            'routeName' => $routeName
        ));
    }
    
    /**
     * Right Widget
     * 
     * @param type $routeName
     * @return type
     */
    public function rightWidgetAction($routeName)
    {
        $eventDispatcher = $this->get('event_dispatcher');
        $event = new RightWidgetEvent();
        $event->setContainer($this->container);
        $event->setEntityManager( $this->getDoctrine()->getEntityManager() );
        $event->setUser($this->getUser());
        $eventDispatcher->dispatch('app.right_widget', $event);

        return $this->render('AppBundle:Default:right-widget.html.twig', array(
            'items' => $event->getWidgets(),
            'routeName' => $routeName
        ));
    }
    
    public function leftMenuAction()
    {
//        $em = $this->getDoctrine()->getManager();
//        $gallery = $em->getRepository('GalleriesBundle:Gallery')
//            ->getMainGallery();
//
//        return $this->render('AppBundle:Default:left-menu.html.twig', array(
//            'images' => $gallery->getImages()
//        ));
        
        $eventDispatcher = $this->get('event_dispatcher');

        $leftMenuEvent = new LeftMenuEvent();
        var_dump($menuEvent);
        $eventDispatcher->dispatch('app.left_menu', $leftMenuEvent);
    exit;
        return $this->render('AppBundle:Default:left-menu.html.twig', array(
            'items' => $leftMenuEvent->getItems(),
           // 'routeName' => $routeName
        ));
        
    }

    public function mainMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $systemLogo = $em->getRepository('AppBundle:Setting')
            ->findOneBy(array(
                'name' => 'system_logo'
            ));

        return $this->render('AppBundle:Index:main-menu.html.twig', array(
            'systemLogo' => $systemLogo
        ));
    }
}
