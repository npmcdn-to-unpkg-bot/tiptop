<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 10/14/15
 * Time: 23:42
 */
namespace AdsBundle\Controller;

use AppBundle\Controller\BaseController;
use AdsBundle\Entity\PageRepository;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository('KitAdsBundle:Ad')
                    ->findAll();
        
        return $this->render('KitAdsBundle:Index:index.html.twig', array(
            'items' => $items
        ));
    }
}