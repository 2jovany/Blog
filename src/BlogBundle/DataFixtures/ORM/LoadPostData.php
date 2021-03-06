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
        $num = 0;
        for ($i = 1; $i <= 3; $i++) {
            $category = new Category();
            $theTimeIs = new \DateTime('now');
            $category->setTitle("Test category name - $i")
                ->setImage('<img src="/apple-touch-icon.png" >')
                ->setContent("Test Category Description - $i")
                ->setCreatedAt($theTimeIs);
            $manager->persist($category);
            $manager->flush();

            for ($y = 1; $y <= 5; $y++) {
                $num++;
                $post = new Post();
                $theTimeIs = new \DateTime("now");
                $category_id = $category->getId();
                $post->setCategoryId($category_id)
                    ->setTitle("Post title - $num")
                    ->setAuthor('Jovany')
                    ->setContent("Blah Blah Blah... - $num")
                    ->setCreatedAt($theTimeIs);
                $manager->persist($post);
                $manager->flush();
            }
        }
    }
}