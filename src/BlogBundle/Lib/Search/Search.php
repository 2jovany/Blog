<?php

namespace BlogBundle\Lib\Search;

use BlogBundle\Repository\CategoryRepository;

class Search
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function search($string)
    {
        return $this->repository->getIdArrayByName($string);
    }
}
