<?php

namespace Kit\GalleriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $galleries = $em->getRepository('KitGalleriesBundle:Gallery')
                       ->findAll();
        
        return $this->render('KitGalleriesBundle:Default:index.html.twig', array(
            'galleries' => $galleries
        ));
    }
    
    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $gallery = $em->getRepository('KitGalleriesBundle:Gallery')
                       ->findOneById($id);
        
        return $this->render('KitGalleriesBundle:Default:view.html.twig', array(
                    'gallery' => $gallery
        ));
    }
}
