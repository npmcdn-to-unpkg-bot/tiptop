<?php

namespace ChatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use React\ZMQ\Context;
use ChatBundle\Entity\Chat;

class DefaultController extends Controller
{
    public function postAction(Request $request)
    {
        $text = $request->get('text');
        $user = $this->getUser();
        
        $message = new Chat();
        $message->setUser($user->getId());
        $message->setText($text);
        $message->setCreated(new \DateTime("now"));
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($message);
        $em->flush();
        
        // This is our new stuff
        $context = new \ZMQContext();
        $socket = $context->getSocket(\ZMQ::SOCKET_PUSH, 'test');
        $socket->connect("tcp://localhost:5555");
        
        $socket->send(json_encode(["category" => "test", "text" => $text]));
        
        return new JsonResponse(["message" => "success"]); 
    }
}