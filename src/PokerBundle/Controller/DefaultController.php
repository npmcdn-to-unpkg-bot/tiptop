<?php

namespace PokerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PokerBundle:Default:index.html.twig');
    }
}
