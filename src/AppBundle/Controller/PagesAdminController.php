<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PageType;

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
        $form = $this->createForm(new PageType() );
        
        if ($request->isMethod('POST'))
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $page = $form->getData();
                $em->persist($page);
                $em->flush();
                return $this->redirect($this->generateUrl('_system_admin_pages'));
            }
        }
        
        return $this->render('KitSystemBundle:PagesAdmin:add.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function EditAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('AppBundle:Page')
                       ->findOneById($id);
        
        $form = $this->createFormBuilder(new PageType() )->getForm();
        
        $form->setData($page);
        
        if ($request->isMethod('POST'))
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $page = $form->getData();
                $em->persist($page);
                $em->flush();
                return $this->redirect($this->generateUrl('_system_admin_pages'));
            }
        }
        
        return $this->render('AppBundle:PagesAdmin:edit.html.twig', array(
                    'page' => $page,
                    'form' => $form->createView()
        ));
    }

}
