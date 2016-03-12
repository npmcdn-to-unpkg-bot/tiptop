<?php

namespace Kit\ArticlesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    protected $disableRightMenu = true;
    
    public function __construct()
    {
        
    }
    
    public function indexAction()
    {   
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository('KitArticlesBundle:Article')
                       ->findAll();
        
        return $this->render('KitArticlesBundle:Index:index.html.twig', array(
            'items' => $items,
            'disableRightMenu' => $this->disableRightMenu
        ));
    }
    
    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('KitArticlesBundle:Article')
                       ->findOneById($id);
        
        return $this->render('KitArticlesBundle:Index:view.html.twig', array(
            'item' => $item,
            'disableRightMenu' => $this->disableRightMenu
        ));
    }
}
