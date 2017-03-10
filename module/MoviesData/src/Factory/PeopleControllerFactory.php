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
use MoviesData\Form\AddSkillPeopleForm;
use MoviesData\Form\EditPeopleForm;
use MoviesData\Service\PeopleService;
use Zend\ServiceManager\Factory\FactoryInterface;

class PeopleControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return PeopleController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var PeopleService $peopleService */
        $peopleService = $container->get(PeopleService::class);

        /** @var AddPeopleForm $addPeopleForm */
        $addPeopleForm = $container->get('FormElementManager')->get(AddPeopleForm::class);

        /** @var EditPeopleForm $editPeopleForm */
        $editPeopleForm = $container->get('FormElementManager')->get(EditPeopleForm::class);

        /** @var AddSkillPeopleForm $addSkillForm */
        $addSkillForm = $container->get('FormElementManager')->get(AddSkillPeopleForm::class);

        return new PeopleController($peopleService, $addPeopleForm, $editPeopleForm, $addSkillForm);
    }

}