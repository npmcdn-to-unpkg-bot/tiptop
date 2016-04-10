<?php

namespace AdsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{
    public function listAction($page = 1, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository('AdsBundle:Ad')
                       ->findAll();
        
        $data = array();
        foreach ($items as $item) {
            $data[] = $item->toArray();
        }

        return new JsonResponse($data);
    }
}