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
use Zend\Filter\Boolean;

class PeopleService implements PeopleInterface
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
    public function insert(People $people): People
    {
        /** add a people into the Unit Of Work */

        $this->entityManager->persist($people);


        $this->entityManager->flush();

        /** in this step, the object people has been passed by the unit Of Work and put it into the database */
        return $people ;
    }

    /**
     * @param People $people
     * @return bool
     */
    public function delete(People $people): bool
    {
        $this->entityManager->remove($people);

        $this->entityManager->flush();

        return true ;
    }

    public function update(People $people): People
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
     * @param int $objectId
     * @return mixed
     *
     */
    public function selectOne(int $objectId)
    {
        return $this->peopleRepository->getOneById($objectId);
    }
}