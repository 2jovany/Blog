<?php

namespace BlogBundle\Repository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
    public function getIdArrayByName($name)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT c.id FROM BlogBundle:Category c
                              WHERE c.title LIKE :name")
            ->setParameter('name', '%' . $name . '%')
            ->getResult();
    }

    public function getByIdArray($arrayId)
    {
        return $this->createQueryBuilder('c')
            ->where('c.id IN (:ids)')
            ->setParameter(':ids',$arrayId)
            ->getQuery()
            ->getResult();
    }
}
