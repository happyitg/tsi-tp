<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 10/03/2017
 * Time: 14:36
 */

namespace MoviesData\Service;


use Doctrine\ORM\EntityManager;
use MoviesData\Repository\MoviePeopleSkillRepository;

class MoviePeopleSkillService
{

    private $entityManager ;

    private $moviePeopleSkillRepository ;

    public function __construct(EntityManager $entityManager, MoviePeopleSkillRepository $moviePeopleSkillRepository)
    {
        $this->entityManager = $entityManager ;

        $this->moviePeopleSkillRepository = $moviePeopleSkillRepository ;
    }

    public function insert($moviePeopleSkill)
    {
        $this->entityManager->persist($moviePeopleSkill);
        $this->entityManager->flush();

        return $moviePeopleSkill;

    }

    public function update($moviePeopleSkill)
    {

    }
}