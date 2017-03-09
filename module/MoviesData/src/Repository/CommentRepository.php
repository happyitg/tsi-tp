<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 17:37
 */

namespace MoviesData\Repository;


use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository
{

    public function getAll()
    {
        $query = $this->createQueryBuilder('c')
            ->getQuery()
            ->getResult();

        return $query;
    }

    public function getOneById(int $id)
    {
        $query = $this->createQueryBuilder('c')
            ->andWhere('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        return $query;
    }

}