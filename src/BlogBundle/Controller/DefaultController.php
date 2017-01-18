<?php

namespace BlogBundle\Controller;

//use BlogBundle\Lib\Search\Search; //service
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    protected $requestStack;

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

    public function searchAction()
    {

//        $search = new Search(); //service
        $search = $this->get('search');
        $result = $search->search($this->get('request_stack')->getCurrentRequest());

        $repository = $this->getDoctrine()
            ->getRepository('BlogBundle:Category');

        $query = $repository->createQueryBuilder('c')
            ->where('c.id IN (:ids)')
            ->setParameter(':ids',$result)
            ->getQuery();

        $categories = $query->getResult();

        return $this->render('BlogBundle:Default:categories.html.twig', array('categories'=>$categories));
    }
}
