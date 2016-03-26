<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PageType;
use AppBundle\Entity\Page;

class PagesAdminController extends Controller
{
    public function ListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('AppBundle:Page')
                       ->findAll();
        
        return $this->render('AppBundle:PagesAdmin:list.html.twig', array(
            'pages' => $pages
        ));
    }

    public function AddAction(Request $request)
    {
        $page = new Page();
        $form = $this->createForm(PageType::class, $page);
            
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $page = $form->getData();
            $em->persist($page);
            $em->flush();

            return $this->redirectToRoute('_system_admin_pages');
        }
        
        return $this->render('AppBundle:PagesAdmin:add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function EditAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('AppBundle:Page')
                       ->findOneById($id);
        
        $form = $this->createForm(PageType::class, $page);
        
 //       $form->setData($page);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $page = $form->getData();
            $em->persist($page);
            $em->flush();
            
            return $this->redirectToRoute('_system_admin_pages');
        }
        
        return $this->render('AppBundle:PagesAdmin:edit.html.twig', array(
                    'page' => $page,
                    'form' => $form->createView()
        ));
    }

}
