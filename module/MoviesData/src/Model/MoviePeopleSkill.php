<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 23:07
 */

namespace MoviesData\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MoviePeopleSkill
 * @package moviesdata\Model
 * @ORM\Entity
 * @ORM\Table(name="movie_people_skill")
 */
class MoviePeopleSkill
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="moviePeopleSkill")
     */
    private $movie;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="People", inversedBy="moviePeopleSkill")
     */
    private $people;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Skill", inversedBy="moviePeopleSkill")
     */
    private $skill;


    public function __construct()
    {
        $this->people = new ArrayCollection();
        $this->skill = new ArrayCollection();
        $this->movie = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|int
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @param $movie
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;
    }

    /**
     * @return ArrayCollection|int
     */
    public function getPeople()
    {
        return $this->people;
    }

    /**
     * @param int $people
     */
    public function setPeople($people)
    {
        $this->people = $people;
    }

    /**
     * @return ArrayCollection|int
     */
    public function getSkill()
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