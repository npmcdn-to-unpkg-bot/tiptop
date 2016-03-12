<?php

namespace Kit\ProductsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;

/**
 * Description of GalleryAdminController
 *
 * @author anton
 */
class IndexAdminController extends Controller {
    //put your code here
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Products = $em->getRepository('KitProductsBundle:Product')
                       ->findAll();
        
        return $this->render('KitProductsBundle:IndexAdmin:index.html.twig', array(
            'Products' => $Products
        ));
    }
}