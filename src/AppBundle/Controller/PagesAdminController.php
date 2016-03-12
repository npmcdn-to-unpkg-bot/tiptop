<?php

namespace Kit\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Kit\SystemBundle\Form\PageType;

class PagesAdminController extends Controller
{
    public function ListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('KitSystemBundle:Page')
                       ->findAll();
        
        return $this->render('KitSystemBundle:PagesAdmin:list.html.twig', array(
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
        $page = $em->getRepository('KitSystemBundle:Page')
                       ->findOneById($id);
        
        $form = $this->createForm(new PageType() );
        
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
        
        return $this->render('KitSystemBundle:PagesAdmin:edit.html.twig', array(
                    'page' => $page,
                    'form' => $form->createView()
        ));
    }

}
