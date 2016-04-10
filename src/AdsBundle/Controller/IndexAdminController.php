<?php

namespace AdsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use AdsBundle\Entity\Ad;
use AdsBundle\Form\AdType;
use AppBundle\Controller\AdminController;

/**
 * Description of AdAdminController
 *
 * @author anton
 */
class IndexAdminController extends AdminController
{
    //put your code here
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository('AdsBundle:Ad')
                       ->findAll();

        return $this->render('AdsBundle:IndexAdmin:Index.html.twig', array(
            'ads' => $items
        ));
    }
    
    public function AddAction(Request $request)
    {        
        $form = $this->createForm(new AdType() );
        
        if ($request->isMethod('POST'))
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $page = $form->getData();
                $em->persist($page);
                $em->flush();
                return $this->redirect($this->generateUrl('_ads_admin_index'));
            }
        }
        
        return $this->render('AdsBundle:IndexAdmin:Add.html.twig', array(
                    'form' => $form->createView()
        ));
    }
    
    public function EditAction($id, Request $request)
    {        
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('AdsBundle:Ad')
                       ->findOneById($id);
        
        $form = $this->createForm(new AdType() );
        $form->setData($item);
        if ($request->isMethod('POST'))
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $item = $form->getData();
                $em->persist($item);
                $em->flush();
                return $this->redirect($this->generateUrl('_ads_admin_ads'));
            }
        }
        
        return $this->render('AppBundle:PagesAdmin:edit.html.twig', array(
            'form' => $form->createView(),
            'page' => $item
        ));
    }
}