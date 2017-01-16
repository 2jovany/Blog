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

    public function categoryAction()
    {
        $categories = $this->getDoctrine()
            ->getRepository('BlogBundle:Category')
            ->findAll();

        return $this->render('BlogBundle:Default:categories.html.twig', array('categories'=>$categories));
    }

    public function postsAction($id)
    {
        $posts = $this->getDoctrine()
            ->getRepository('BlogBundle:Post')
            ->findBy(array('category_id' => $id));
        return $this->render('BlogBundle:Default:index.html.twig', array('posts'=>$posts));
    }
}
