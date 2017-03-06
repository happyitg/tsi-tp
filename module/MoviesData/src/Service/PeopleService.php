<?php

/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 14:17
 */

namespace MoviesData\Service ;

use Doctrine\ORM\EntityManager;
use MoviesData\Model\People;
use MoviesData\Repository\PeopleRepository;
use MoviesData\ServiceInterface\CrudInterface;

class PeopleService implements CrudInterface
{
    /**
     * @var EntityManager $entityManager
     */
    private $entityManager ;

    /**
     * @var PeopleRepository $peopleRepository
     */
    private $peopleRepository ;

    /**
     * ActorService constructor.
     * @param EntityManager $entityManager
     * @param PeopleRepository $peopleRepository
     */
    public function __construct(EntityManager $entityManager, PeopleRepository $peopleRepository)
    {
        $this->entityManager = $entityManager;

        $this->peopleRepository = $peopleRepository ;
    }

    /**
     * @param People $people
     * @return People
     */
    public function insert($people)
    {
        /** add a Actor into the Unit Of Work */
        $this->entityManager->persist($people);

        $this->entityManager->flush();

        /** in this step, the object Actor has been passed by the unit Of Work and put it into the database */
        return $people ;
    }

    public function delete($people)
    {
        $this->entityManager->remove($people);

        $this->entityManager->flush();

        return true ;
    }

    public function update($people)
    {
        $this->entityManager->flush();

        return $people ;
    }

    /**
     * @return People[]
     */
    public function selectAll()
    {
        return $this->peopleRepository->getAll();

    }

    /**
     * @param $objectId
     * @return array
     */
    public function selectOne($objectId)
    {
        return $this->peopleRepository->getOneById($objectId);
    }
}