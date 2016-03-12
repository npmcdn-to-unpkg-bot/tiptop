<?php

namespace AppBundle\Controller;

use AppBundle\Controller\BaseController;
use AppBundle\Entity\PageRepository;
use GalleriesBundle\Entity\GalleryRepository as KitGalleriesBundle;
use GalleriesBundle\Entity\Gallery as Gallery;

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

    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('AppBundle:Page')
            ->findAll();

        return $this->render('AppBundle:Index:menu.html.twig', array(
            'pages' => $pages
        ));
    }

    public function rightMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $gallery = $em->getRepository('KitGalleriesBundle:Gallery')
            ->getMainGallery();

        return $this->render('AppBundle:Index:right-menu.html.twig', array(
            'images' => $gallery->getImages()
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
