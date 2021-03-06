<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 17:44
 */

namespace MoviesData\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Skill
 * @package moviesdata\Model
 * @ORM\Entity
 * @ORM\Table(name="skill")
 */
class Skill
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var int
     *
     * Many skills can be linked t many movies for many people
     * @ORM\OneToMany(targetEntity="MoviePeopleSkill", mappedBy="skill")
     */
    private $moviePeopleSkill ;

    /**
     * Skill constructor.
     */
    public function __construct()
    {
        $this->moviePeopleSkill = new ArrayCollection() ;
    }

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }



}