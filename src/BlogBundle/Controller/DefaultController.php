<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $posts = $this->getDoctrine()
            ->getRepository('BlogBundle:Post')
            ->findAll();

        return $this->render('BlogBundle:Default:index.html.twig', array('posts'=>$posts));
    }
}
