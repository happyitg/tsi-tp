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
 * @package MoviesData\Model
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
     * @ORM\OneToOne(targetEntity="Movie", inversedBy="id")
     * @ORM\JoinColumn(name="movie_id", referencedColumnName="id")
     */
    private $movie;

}