<?php

namespace PokerBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PokerController extends Controller
{
    public function outsAction()
    {
        return $this->render('PokerBundle:Poker:frontend/outs.html.twig');
    }
}
