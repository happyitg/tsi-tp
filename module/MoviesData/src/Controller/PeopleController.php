<?php

/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 13:59
 */

namespace MoviesData\Controller ;

use MoviesData\Form\AddPeopleForm;
use MoviesData\Form\AddSkillPeopleForm;
use MoviesData\Form\EditPeopleForm;
use MoviesData\Model\People;
use MoviesData\Service\PeopleService;
use Zend\Http\Request;
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
     * @var AddSkillPeopleForm
     */
    private $addSkillPeopleForm;

    /**
     * PeopleController constructor.
     * @param PeopleService $peopleService
     * @param AddPeopleForm $addPeopleForm
     * @param EditPeopleForm $editPeopleForm
     * @param AddSkillPeopleForm $addSkillPeopleForm
     */
    public function __construct(PeopleService $peopleService, AddPeopleForm $addPeopleForm,
                                EditPeopleForm $editPeopleForm, AddSkillPeopleForm $addSkillPeopleForm)
    {
        $this->peopleService = $peopleService ;

        $this->addPeopleForm = $addPeopleForm;

        $this->editPeopleForm = $editPeopleForm;

        $this->addSkillPeopleForm = $addSkillPeopleForm ;

    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {

        return new ViewModel([
            'allPeople' => $this->peopleService->selectAll()
        ]);
    }

    /**
     * @return \Zend\Http\Response|ViewModel
     */
    public function addAction()
    {
        /** @var Request $getRequest */
        $getRequest = $this->getRequest();

        if($getRequest->isPost()) {

            $dataObject = $getRequest->getPost() ;
            $this->addPeopleForm->setData($dataObject);


            if ($this->addPeopleForm->isValid()) {


                // TODO: make the model to call the create
                /** @var People $peopleModel */
                $peopleModel = $this->addPeopleForm->getData();
                $birthDate = $peopleModel->getBirthDate();
                $peopleModel->setBirthDate(\DateTime::createFromFormat('Y-m-d', $birthDate));

                $this->peopleService->insert($peopleModel);

                return $this->redirect()->toRoute('people');
            }

        }

        return new ViewModel([
            'addPerson' => $this->addPeopleForm
        ]);
    }

    public function editAction()
    {
        
    }

    public function deleteAction()
    {

    }

    public function addSkillAction()
    {
        $peopleId = (int)$this->params('id_people');
        $people = $this->peopleService->selectOne($peopleId);

        if(!$people){
            $this->redirect()->toRoute('people');
        }

        $this->addSkillPeopleForm->bind($people);

        /** @var Request $request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->addSkillPeopleForm->setData($request->getPost());
            if ($this->addSkillPeopleForm->isValid()) {
                /** @var People $people */
                $people = $this->addSkillPeopleForm->getData();
                $this->peopleService->update($people);

                return $this->redirect()->toRoute('people');
            }
        }

        return new ViewModel([
            'addSkillPeopleForm' => $this->addSkillPeopleForm,
            'people' => $people,
        ]);
    }

}