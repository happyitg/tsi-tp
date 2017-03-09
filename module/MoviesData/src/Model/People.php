<?php

/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 14:00
 */

namespace MoviesData\Model ;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class moviesdata
 * @package moviesdata\Model
 * @ORM\Entity(repositoryClass="MoviesData\Repository\PeopleRepository")
 * @ORM\Table(name="people")
 */
class People
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
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=50)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth_date", type="datetime")
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string")
     */
    private $gender;

    /**
     * @var int
     *
     * many peoples are in many movies for one of his skills
     * @ORM\OneToMany(targetEntity="MoviePeopleSkill", mappedBy="people")
     */
    private $moviePeopleSkill ;

    /**
     * @var int
     *
     * Many people have many skills
     * @ORM\ManyToMany(targetEntity="Skill")
     * @ORM\JoinTable(
     *     name="people_skill",
     *     joinColumns=
     *     {
     *          @ORM\JoinColumn(name="people_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="skill_id", referencedColumnName="id", unique=true)
     *     }
     * )
     */
    private $skills;

    /**
     * people constructor.
     */
    public function __construct()
    {
        $this->moviePeopleSkill = new ArrayCollection();
        $this->skills = new ArrayCollection();

    }

    /**
     * @return ArrayCollection|int
     */
    public function getMoviePeopleSkill()
    {
        return $this->moviePeopleSkill;
    }

    /**
     * @param $moviePeopleSkill
     */
    public function setMoviePeopleSkill($moviePeopleSkill)
    {
        $this->moviePeopleSkill = $moviePeopleSkill;
    }

    /**
     * @return ArrayCollection|int
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }



    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }



}