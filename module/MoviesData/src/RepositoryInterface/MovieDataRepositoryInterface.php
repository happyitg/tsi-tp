<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 17:41
 */

namespace MoviesData\RepositoryInterface;


interface MovieDataRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param int $id
     * @return mixed
     */
    public function getOneById(int $id);
}
