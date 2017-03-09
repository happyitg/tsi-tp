<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 06/03/2017
 * Time: 13:54
 */

namespace MoviesData ;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use MoviesData\Controller\ActorController;
use MoviesData\Controller\CommentController;
use MoviesData\Controller\DirectorController;
use MoviesData\Controller\MovieController;
use MoviesData\Controller\PeopleController;
use MoviesData\Factory\ActorControllerFactory;
use MoviesData\Factory\PeopleControllerFactory;
use MoviesData\Factory\PeopleFieldsetFactory;
use MoviesData\Factory\PeopleServiceFactory;
use MoviesData\Form\Fieldset\PeopleFieldset;
use MoviesData\Service\PeopleService;
use Zend\Router\Http\Segment;

return [

    'doctrine' => [
        'driver' => [
            'movies_data_entities' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => ['module/MoviesData/src/Model'],
            ],
            'orm_default' => [
                'drivers' => [
                    'MoviesData\Model' => 'movies_data_entities',
                ],
            ],
        ],
    ],

    'router' => [
        'routes' => [
            'people' => [
                'type'    => Segment::class,
                'options' => [
                    'route'       => '/people[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => PeopleController::class,
                        'action' => 'index',
                    ],
                ],
            ],

        ],
    ],

    'controllers' => [
        'factories' => [
            PeopleController::class => PeopleControllerFactory::class,

        ],
    ],
    'view_manager' => [

        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    'form_elements' => [
        'factories' => [
            PeopleFieldset::class => PeopleFieldsetFactory::class,
        ],
    ],

    'service_manager' => [
        'factories' => [
            PeopleService::class => PeopleServiceFactory::class,
        ]
    ],




];