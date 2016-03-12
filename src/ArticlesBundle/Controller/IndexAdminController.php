<?php

namespace Kit\ArticlesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use Kit\ArticlesBundle\Entity\Article;
use Kit\ArticlesBundle\Form\ArticleType;

/**
 * Description of ArticleAdminController
 *
 * @author anton
 */
class IndexAdminController extends Controller {
    //put your code here
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('KitArticlesBundle:Article')
                       ->findAll();

        return $this->render('KitArticlesBundle:IndexAdmin:Index.html.twig', array(
            'articles' => $articles
        ));
    }
    
    public function AddAction(Request $request)
    {        
        $form = $this->createForm(new ArticleType() );
        
        if ($request->isMethod('POST'))
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $page = $form->getData();
                $em->persist($page);
                $em->flush();
                return $this->redirect($this->generateUrl('_articles_admin_index'));
            }
        }
        
        return $this->render('KitArticlesBundle:IndexAdmin:Add.html.twig', array(
                    'form' => $form->createView()
        ));
    }
}