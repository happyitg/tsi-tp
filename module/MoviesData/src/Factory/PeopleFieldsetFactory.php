<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 09/03/2017
 * Time: 01:51
 */

namespace MoviesData\Factory;


use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use MoviesData\Form\Fieldset\PeopleFieldset;
use Zend\ServiceManager\Factory\FactoryInterface;

class PeopleFieldsetFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get(EntityManager::class);

        return new PeopleFieldset($entityManager);

    }


}