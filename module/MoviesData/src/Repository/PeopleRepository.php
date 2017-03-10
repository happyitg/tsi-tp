<?php

/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 14:17
 */

namespace MoviesData\Repository ;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;

class PeopleRepository extends EntityRepository
{
    /**
     * @return mixed
     */
    public function getAll()
    {

        return $this->createQueryBuilder('p')
            ->leftJoin('p.skills', 's')
            ->addSelect('s')
            ->leftJoin('p.moviePeopleSkill', 'mps')
            ->addSelect('mps')
            ->leftJoin('mps.movie', 'm')
            ->addSelect('m')
            ->leftJoin('m.poster', 'poster')
            ->addSelect('poster')
            ->leftJoin('mps.skill', 'ms')
            ->addSelect('ms')
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult() ;

    }

    /**
     * @param int $id
     * @return array
     */
    public function getOneById(int $id)
    {
        $query = $this->createQueryBuilder('p')
            ->leftJoin('p.skills', 's')
            ->addSelect('s')
            ->andWhere('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();

        return $query;
    }
}