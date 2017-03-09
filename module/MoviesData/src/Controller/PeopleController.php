<?php

/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 13:59
 */

namespace MoviesData\Controller ;


use MoviesData\Form\AddPeopleForm;
use MoviesData\Form\EditPeopleForm;
use MoviesData\Service\PeopleService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PeopleController extends AbstractActionController
{

    /**
     * @var PeopleService
     */
    private $peopleService;

    /**
     * @var AddPeopleForm
     */
    private $addPeopleForm;

    /**
     * @var EditPeopleForm
     */
    private $editPeopleForm;

    /**
     * PeopleController constructor.
     * @param PeopleService $peopleService
     * @param AddPeopleForm $addPeopleForm
     * @param EditPeopleForm $editPeopleForm
     */
    public function __construct(PeopleService $peopleService, AddPeopleForm $addPeopleForm, EditPeopleForm $editPeopleForm)
    {
        /** @var PeopleService peopleService */
        $this->peopleService = $peopleService ;

        /** @var AddPeopleForm addPeopleForm */
        $this->addPeopleForm = $addPeopleForm;

        /** @var EditPeopleForm editPeopleForm */
        $this->editPeopleForm = $editPeopleForm;

    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {

        return new ViewModel([
            'all_people' => $this->peopleService->selectAll()
        ]);
    }

    /**
     * @return ViewModel
     */
    public function addAction()
    {
        // TODO : put the getRequest and do the check with calling the people Service

        return new ViewModel([
            'form' => $this->addPeopleForm
        ]);
    }

}