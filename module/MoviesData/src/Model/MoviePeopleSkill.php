<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 23:07
 */

namespace MoviesData\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class MoviePeopleSkill
 * @package MoviesData\Model
 * @ORM\Entity
 * @ORM\Table(name="movie_people_skill")
 */
class MoviePeopleSkill
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id ;
    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="id")
     */
    private $movie;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="People", inversedBy="id")
     */
    private $people;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Skill", inversedBy="id")
     */
    private $skill;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getMovie(): int
    {
        return $this->movie;
    }

    /**
     * @param int $movie
     */
    public function setMovie(int $movie)
    {
        $this->movie = $movie;
    }

    /**
     * @return int
     */
    public function getPeople(): int
    {
        return $this->people;
    }

    /**
     * @param int $people
     */
    public function setPeople(int $people)
    {
        $this->people = $people;
    }

    /**
     * @return int
     */
    public function getSkill(): int
    {
        return $this->skill;
    }

    /**
     * @param int $skill
     */
    public function setSkill(int $skill)
    {
        $this->skill = $skill;
    }




}