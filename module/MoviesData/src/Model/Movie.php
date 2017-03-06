<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 14:54
 */

namespace MoviesData\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Movie
 * @package MoviesData\Model
 * @ORM\Entity
 * @ORM\Table(name="movie")
 */
class Movie
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
     * @ORM\Column(name="title", type="string")
     */
    private $title ;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="launch_date", type="datetime")
     */
    private $launchDate ;

    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="text")
     */
    private $synopsis ;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note ;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationDate ;

    /**
     * @var \DateTime \ Null
     *
     * @ORM\Column(name="modification_date", type="datetime", nullable=true)
     */
    private $modificationDate ;


    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="MovieType")
     * @ORM\JoinColumn(name="movie_type_id", referencedColumnName="id")
     */
    private $movieType ;

    /**
     * @var int
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="movie")
     */
    private $comments;

    /**
     * @var int
     *
     * Many movies have many peoples for many skills
     *
     * @ORM\OneToMany(targetEntity="MoviePeopleSkill", mappedBy="movie")
     */
    private $moviePeopleSkill;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="Poster", mappedBy="id")
     *
     */
    private $poster ;

    /**
     * Movie constructor.
     */
    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->moviePeopleSkill = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getComments(): int
    {
        return $this->comments;
    }

    /**
     * @param int $comments
     */
    public function setComments(int $comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return int
     */
    public function getMoviePeopleSkill(): int
    {
        return $this->moviePeopleSkill;
    }

    /**
     * @param int $moviePeopleSkill
     */
    public function setMoviePeopleSkill(int $moviePeopleSkill)
    {
        $this->moviePeopleSkill = $moviePeopleSkill;
    }

    /**
     * @return int
     */
    public function getPoster(): int
    {
        return $this->poster;
    }

    /**
     * @param int $poster
     */
    public function setPoster(int $poster)
    {
        $this->poster = $poster;
    }


    /**
     * @return int
     */
    public function getMovieType(): int
    {
        return $this->movieType;
    }

    /**
     * @param int $movieType
     */
    public function setMovieType(int $movieType = null)
    {
        $this->movieType = $movieType;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return \DateTime
     */
    public function getLaunchDate(): \DateTime
    {
        return $this->launchDate;
    }

    /**
     * @param \DateTime $launchDate
     */
    public function setLaunchDate(\DateTime $launchDate)
    {
        $this->launchDate = $launchDate;
    }

    /**
     * @return string
     */
    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    /**
     * @param string $synopsis
     */
    public function setSynopsis(string $synopsis)
    {
        $this->synopsis = $synopsis;
    }

    /**
     * @return int
     */
    public function getNote(): int
    {
        return $this->note;
    }

    /**
     * @param int $note
     */
    public function setNote(int $note)
    {
        $this->note = $note;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate(\DateTime $creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return \DateTime \ Null
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @param \DateTime $modificationDate
     */
    public function setModificationDate(\DateTime $modificationDate = null)
    {
        $this->modificationDate = $modificationDate;
    }


}