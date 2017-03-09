<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 07/03/2017
 * Time: 11:27
 */

namespace MoviesData\Factory;


use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use MoviesData\Model\People;
use MoviesData\Repository\PeopleRepository;
use MoviesData\Service\PeopleService;
use Zend\ServiceManager\Factory\FactoryInterface;

class PeopleServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return PeopleService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get(EntityManager::class);

        /** @var PeopleRepository $peopleRepository */
        $peopleRepository = $entityManager->getRepository(People::class);

        return new PeopleService($entityManager, $peopleRepository);
    }

}