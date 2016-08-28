<?php

namespace AppBundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PageType;
use AppBundle\Entity\Page;

class PagesController extends Controller
{
    public function ListAction($page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:Page');
        $pagination = $repo->getPagination($page);
        
        $maxPages = ceil($pagination->count() / $repo::limit);
        
        return $this->render('AppBundle:Pages:backend/list.html.twig', array(
            'pages'     => $pagination->getIterator(),
            'maxPages'  => $maxPages,
            'thisPage'  => $page
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
            
            $this->addFlash(
                'success',
                $this->get('translator')->trans('page.added.success', array(
                        '%name%' => $page->getTitle()
                    ),
                    'admin'
                )
            );
        
            return $this->redirectToRoute('app_backend_pages_first');
        }
        
        return $this->render('AppBundle:Pages:backend/add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function EditAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('AppBundle:Page')
                       ->findOneById($id);
        
        $form = $this->createForm(PageType::class, $page);

        $form->handleRequest($request);
          
        if ($form->isSubmitted() && $form->isValid())
        {   
            $page = $form->getData();
            $em->persist($page);
            $em->flush();
            
            $this->addFlash(
                'success',
                $this->get('translator')->trans('page.edited.success', array(
                        '%name%' => $page->getTitle()
                    ),
                    'admin'
                )
            );
            
            return $this->redirectToRoute('app_admin_pages');
        }
        
        return $this->render('AppBundle:Pages:admin/edit.html.twig', array(
                    'page' => $page,
                    'form' => $form->createView()
        ));
    }
    
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('AppBundle:Page')
                       ->findOneById($id);
        if ($page)
        {
            $em->remove($page);
            $em->flush();
            
            $this->addFlash(
                'success',
                $this->get('translator')->trans('page.deleted.success', array(
                        '%name%' => $page->getTitle()
                    ),
                    'admin'
                )
            );
        }
        else {
            
            $this->addFlash(
                'success',
                $this->get('translator')->trans('page.already_deleted.success', array(), 'admin')
            );
        }

        return $this->redirectToRoute('app_backend_pages_first');
    }
}
