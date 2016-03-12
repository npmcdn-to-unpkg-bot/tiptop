<?php

namespace Kit\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Kit\SystemBundle\Entity\PageRepository;

class PagesController extends Controller
{
    public function indexAction(Request $request)
    {
        $slug = $request->get('slug');
        
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('KitSystemBundle:Page')
                       ->findOneBySlug($slug);
        
        return $this->render('KitSystemBundle:Pages:page.html.twig',array(
            'page' => $page
        ));
    }
}
