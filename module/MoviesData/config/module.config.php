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
use MoviesData\Factory\ActorControllerFactory;
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
            'actor' => [
                'type'    => Segment::class,
                'options' => [
                    'route'       => '/actor[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => ActorController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'director' => [
                'type'    => Segment::class,
                'options' => [
                    'route'       => '/director[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => DirectorController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'movie' => [
                'type'    => Segment::class,
                'options' => [
                    'route'       => '/movie[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => MovieController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'comment' => [
                'type'    => Segment::class,
                'options' => [
                    'route'       => '/comment[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => CommentController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            ActorController::class => ActorControllerFactory::class,

        ],
    ],
    'view_manager' => [

        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],




];