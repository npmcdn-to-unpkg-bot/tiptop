<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExtraController extends Controller
{
    public function extraAction($parameter)
    {
        return new Response($parameter);
    }
}