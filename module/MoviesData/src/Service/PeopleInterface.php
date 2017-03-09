<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 16:14
 */

namespace MoviesData\Service;

use MoviesData\Model\People;

/**
 * Interface CrudInterface
 * @package moviesdata\ServiceInterface
 */
interface PeopleInterface
{

    /**
     * @param People $object
     * @return People
     */
    public function insert(People $object): People;

    /**
     * @param People $object
     * @return bool
     */
    public function delete(People $object): bool ;

    /**
     * @param People $object
     * @return People
     */
    public function update(People $object): People;

    /**
     * @return mixed
     */
    public function selectAll();

    /**
     * @param int $objectId
     * @return mixed
     */
    public function selectOne(int $objectId);



}