<?php

namespace ArticlesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use ArticlesBundle\Entity\Article;
use ArticlesBundle\Form\ArticleType;

/**
 * Description of ArticleAdminController
 *
 * @author anton
 */
class IndexAdminController extends Controller {
    //put your code here
    public function indexAction($page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ArticlesBundle:Article');
        $pagination = $repo->getPagination($page);
        
        $maxPages = ceil($pagination->count() / $repo::limit);
        
        return $this->render('ArticlesBundle:IndexAdmin:index.html.twig', array(
            'articles'  => $pagination->getIterator(),
            'maxPages'  => $maxPages,
            'thisPage'  => $page
        ));
    }
    
    public function AddAction(Request $request)
    {
        $form = $this->createForm(ArticleType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            /* @var $em Doctrine\ORM\EntityManager */
            $em = $this->getDoctrine()->getManager();
            
            $item = new Article();            
            $item->setData($form->getData());
            
            $em->persist($item);
            $em->flush();
            
            return $this->redirect($this->generateUrl('articles_admin_index'));
        }
        else {
            if ($errors = $form->getErrors() && !empty($errors)) {
                foreach ($form->getErrors() as $item) {
                    var_dump($item->getMessage());
                }
                exit;
            }
        }

        return $this->render('ArticlesBundle:IndexAdmin:add.html.twig', array(
            'form' => $form->createView()
        ));
    }
}