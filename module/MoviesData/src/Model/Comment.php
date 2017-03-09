<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 14:54
 */

namespace MoviesData\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Comment
 * @package moviesdata\Model
 * @ORM\Entity
 * @ORM\Table(name="comment")
 */
class Comment
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id ;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=50)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="comments")
     * @ORM\JoinColumn(name="movie_id", referencedColumnName="id")
     */
    private $movie;

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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }


}