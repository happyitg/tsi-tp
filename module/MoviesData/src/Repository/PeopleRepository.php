<?php

/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 14:17
 */

namespace MoviesData\Repository ;

use Doctrine\ORM\EntityRepository;
use MoviesData\Model\People;

class PeopleRepository extends EntityRepository
{
    /**
     * @return People[]
     */
    public function getAll()
    {

        $query = $this->createQueryBuilder('people')
            ->getQuery()
            ->getResult();

        return $query ;

    }

    /**
     * @param int $id
     * @return array
     */
    public function getOneById(int $id)
    {
        $query = $this->createQueryBuilder('people')
            ->andWhere('people.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        return $query;
    }
}