<?php

/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 13:59
 */

namespace MoviesData\Controller ;


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
     * ActorController constructor.
     * @param PeopleService $peopleService
     */
    public function __construct(PeopleService $peopleService)
    {
        $this->peopleService = $peopleService ;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel([
            'actor' => $this->peopleService->selectAll()
        ]);
    }


}