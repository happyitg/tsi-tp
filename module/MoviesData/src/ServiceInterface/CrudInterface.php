<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 16:14
 */

namespace MoviesData\ServiceInterface;

/**
 * Interface CrudInterface
 * @package MoviesData\ServiceInterface
 */
interface CrudInterface
{

    /**
     * @param $object
     * @return mixed
     */
    public function insert($object);

    /**
     * @param $object
     * @return mixed
     */
    public function delete($object);

    /**
     * @param $object
     * @return mixed
     */
    public function update($object);

    /**
     * @return mixed
     */
    public function selectAll();

    /**
     * @param $objectId
     * @return mixed
     */
    public function selectOne($objectId);



}