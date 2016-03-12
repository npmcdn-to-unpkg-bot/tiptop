<?php

namespace Kit\GalleriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use Kit\GalleriesBundle\Entity\Gallery;
use Kit\GalleriesBundle\Form\GalleryType;
use Kit\GalleriesBundle\Form\GalleryImageType;

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
        $galleries = $em->getRepository('KitGalleriesBundle:Gallery')
                       ->findAll();
        
        return $this->render('KitGalleriesBundle:IndexAdmin:index.html.twig', array(
            'galleries' => $galleries
        ));
    }
    
    public function AddAction(Request $request)
    {  
        $form = $this->createForm(new GalleryType() );
        
        if ($request->isMethod('POST'))
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $page = $form->getData();
                $em->persist($page);
                $em->flush();
                return $this->redirect($this->generateUrl('_gallery_admin_index'));
            }
        }
        
        return $this->render('KitGalleriesBundle:IndexAdmin:Add.html.twig', array(
                    'form' => $form->createView()
        ));
    }
    
   public function EditAction($id, Request $request)
   {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('KitGalleriesBundle:Gallery')
                       ->findOneById($id);
        
        $form = $this->createForm(new GalleryType() );
        $form->setData($page);
        
        if ($request->isMethod('POST'))
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $page = $form->getData();
                $em->persist($page);
                $em->flush();
                return $this->redirect($this->generateUrl('_gallery_admin_index'));
            }
        }
        
        return $this->render('KitGalleriesBundle:IndexAdmin:edit.html.twig', array(
                    'gallery' => $page,
                    'form' => $form->createView()
        ));
    }
    
    public function AddImagesAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $gallery = $em->getRepository('KitGalleriesBundle:Gallery')
                       ->findOneById($id);

        if ( $gallery )
        {
            $form = $this->createForm(new GalleryImageType());
    
            if ($request->isMethod('POST'))
            {
                $form->bind($request);
                if ($form->isValid())
                {
                    $galleryImage = $form->getData();
                    $galleryImage->setGallery($gallery);
                    $em->persist($galleryImage);
                    $em->flush();
                    return $this->redirect($this->generateUrl('_gallery_admin_index'));
                }
            }
            
            return $this->render('KitGalleriesBundle:IndexAdmin:AddImages.html.twig', array(
                'gallery' => $gallery,
                'form' => $form->createView()
            ));
        }
        else {
            
            return $this->redirect($this->generateUrl('_gallery_admin_index'));
            
        }
    }
    
    public function ViewAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $gallery = $em->getRepository('KitGalleriesBundle:Gallery')
                       ->findOneById($id);
    
        
        return $this->render('KitGalleriesBundle:IndexAdmin:View.html.twig', array(
            'gallery' => $gallery,
            'images' => $gallery->getImages()
        ));
    }
}