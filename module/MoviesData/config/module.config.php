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
use MoviesData\Controller\SkillController;
use MoviesData\Factory\ActorControllerFactory;
use MoviesData\Factory\PeopleControllerFactory;
use MoviesData\Factory\PeopleFieldsetFactory;
use MoviesData\Factory\PeopleServiceFactory;
use MoviesData\Form\Fieldset\PeopleFieldset;
use MoviesData\Service\PeopleService;
use Zend\Router\Http\Literal;
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
                'type' => Literal::class,
                'options' => [
                    'route' => '/people',
                    'defaults' => [
                        'controller' =>PeopleController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'add' => [
                        'type'    => Literal::class,
                        'options' => [
                            'route'       => '/people/add',
                            'defaults' => [
                                'action' => 'add',
                            ],
                        ],
                    ],
                    'edit' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'       => '/people/edit/:id',
                            'constraints' => [
                                'id'     => '[0-9]+',
                            ],
                            'defaults' => [
                                'action' => 'edit',
                            ],
                        ],
                    ],
                    'delete' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'       => '/people/delete/:id',
                            'constraints' => [
                                'id'     => '[0-9]+',
                            ],
                            'defaults' => [
                                'action' => 'delete',
                            ],
                        ],
                    ],
                    'add_skill' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/:id_people/skills/add',
                            'constraints' => [
                                'id_people' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => PeopleController::class,
                                'action' => 'add-skill',
                            ],
                        ],
                    ],
                ]
            ],
            'skill' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/skill[/:action[/:id]]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => SkillController::class,
                        'action' => 'index',
                    ]
                ]
            ],
            'movie-people-skill' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/movie-people-skill[/:action[/:id]]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => MoviePeopleSkillController::class,
                        'action' => 'index',
                    ],
                ]
            ]
        ],
    ],

    'controllers' => [
        'factories' => [
            PeopleController::class => PeopleControllerFactory::class,
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
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

];