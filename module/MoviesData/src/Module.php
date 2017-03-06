<?php

/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 14:00
 */

namespace MoviesData ;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class module implements ConfigProviderInterface
{
    public function getConfig()
    {

        return include __DIR__ . '/../config/module.config.php';
    }

}