<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\PageRepository;

class PagesController extends Controller
{
    public function indexAction(Request $request)
    {
        $slug = $request->get('slug');
        
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('AppBundle:Page')
                       ->findOneBySlug($slug);
        
        return $this->render('AppBundle:Pages:page.html.twig',array(
            'page' => $page
        ));
    }
}
