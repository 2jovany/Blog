<?php

namespace BlogBundle\DataFixtures\ORM;

use BlogBundle\Entity\Category;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BlogBundle\Entity\Post;

class LoadPostData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $theTimeIs = new \DateTime('now');
        $category->setTitle('Test category name')
            ->setImage('<img src="/apple-touch-icon.png" >')
            ->setContent('Test Category Description')
            ->setCreatedAt($theTimeIs);
        $manager->persist($category);
        $manager->flush();

        $post = new Post();
        $theTimeIs = new \DateTime("now");
        $category_id = $category->getId();
        $post->setCategoryId($category_id)
            ->setTitle('Post title')
            ->setAuthor('Jovany')
            ->setContent('Blah Blah Blah...')
            ->setCreatedAt($theTimeIs);
        $manager->persist($post);
        $manager->flush();
    }
}