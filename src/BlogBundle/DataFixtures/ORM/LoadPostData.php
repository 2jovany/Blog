<?php

namespace BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BlogBundle\Entity\Post;

class LoadPostData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $post = new Post();
        $theTimeIs = new \DateTime("now");
        $post->setTitle('Post title')
            ->setAuthor('Jovany')
            ->setContent('Blah Blah Blah...')
            ->setCreatedAt($theTimeIs);

        $manager->persist($post);
        $manager->flush();
    }
}