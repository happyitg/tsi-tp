<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 10/03/2017
 * Time: 00:16
 */

namespace MoviesData\Service;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;
use MoviesData\Repository\MovieRepository;

/**
 * Class MovieService
 * @package MoviesData\Service
 * @ORM\Entity
 * @ORM\Table(name="movie")
 */
class MovieService
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var MovieRepository
     */
    private $movieRepository ;

    /**
     * MovieService constructor.
     * @param EntityManager $entityManager
     * @param MovieRepository $movieRepository
     */
    public function __construct(EntityManager $entityManager, MovieRepository $movieRepository)
    {
        $this->entityManager = $entityManager;

        $this->movieRepository = $movieRepository ;
    }


    public function insert($movie)
    {
        $this->entityManager->persist($movie);
        $this->entityManager->flush();

        return $movie;
    }

    public function update($movie)
    {
        $this->entityManager->flush();

        return $movie ;
    }

    public function selectOne($objectId)
    {
        return $this->movieRepository->getOneById($objectId);

    }

}