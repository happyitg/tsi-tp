<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 23:40
 */

namespace MoviesData\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Poster
 * @package moviesdata\Model
 * @ORM\Entity
 * @ORM\Table(name="poster")
 */
class Poster
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
     * @ORM\Column(name="url", type="text")
     */
    private $url ;

    /**
     * @var int
     *
     * One poster has one movie
     * @ORM\OneToOne(targetEntity="Movie", inversedBy="poster")
     */
    private $movie;

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
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @param int $movie
     */
    public function setMovie(int $movie = null)
    {
        $this->movie = $movie;
    }



}