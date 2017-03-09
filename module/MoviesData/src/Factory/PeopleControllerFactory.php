<?php

/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 14:00
 */

namespace MoviesData\Factory ;

use Interop\Container\ContainerInterface;
use MoviesData\Controller\PeopleController;
use MoviesData\Form\AddPeopleForm;
use MoviesData\Form\EditPeopleForm;
use MoviesData\Service\PeopleService;
use Zend\ServiceManager\Factory\FactoryInterface;

class PeopleControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var  $peopleService */
        $peopleService = $container->get(PeopleService::class);

        /** @var  $addPeopleForm */
        $addPeopleForm = $container->get('FormElementManager')->get(AddPeopleForm::class);

        /** @var  $editPeopleForm */
        $editPeopleForm = $container->get('FormElementManager')->get(EditPeopleForm::class);

        return new PeopleController($peopleService, $addPeopleForm, $editPeopleForm);
    }

}