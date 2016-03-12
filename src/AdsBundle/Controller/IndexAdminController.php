<?php

namespace Kit\AdsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use Kit\AdsBundle\Entity\Ad;
use Kit\AdsBundle\Form\AdType;

/**
 * Description of AdAdminController
 *
 * @author anton
 */
class IndexAdminController extends Controller {
    //put your code here
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository('KitAdsBundle:Ad')
                       ->findAll();

        return $this->render('KitAdsBundle:IndexAdmin:Index.html.twig', array(
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
        
        return $this->render('KitAdsBundle:IndexAdmin:Add.html.twig', array(
                    'form' => $form->createView()
        ));
    }
    
    public function EditAction($id, Request $request)
    {        
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('KitAdsBundle:Ad')
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
        
        return $this->render('KitSystemBundle:PagesAdmin:edit.html.twig', array(
            'form' => $form->createView(),
            'page' => $item
        ));
    }
}