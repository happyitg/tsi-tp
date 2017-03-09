<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 07/03/2017
 * Time: 11:08
 */

namespace MoviesData\Form\Fieldset;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;
use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use DoctrineORMModule\Service\DoctrineObjectHydratorFactory;
use MoviesData\Model\People;
use MoviesData\Model\Skill;
use Zend\Filter\DateSelect;
use Zend\Filter\StringToUpper;
use Zend\Filter\StringTrim;
use Zend\Filter\UpperCaseWords;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\Date;
use Zend\Validator\StringLength;


/**
 * Class PeopleFieldset
 * @package MoviesData\Form\Fieldset
 * @ORM\Entity
 * @ORM\Table(name="People")
 */
class PeopleFieldset extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager ;

    /**
     * PeopleFieldset constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager ;

        parent::__construct();
    }


    public function init()
    {

        $this->setHydrator(new DoctrineObject($this->entityManager))
            ->setObject(new People());

        $this->add(
            [
                'name' => 'id',
                'type' => Element\Hidden::class,
            ]
        );

        $this->add(
            [
                'name' => 'first_name',
                'type' => Element\Text::class,
                'options' => [
                    'label' => 'First Name',
                ],
            ]
        );

        $this->add(
            [
                'name' => 'last_name',
                'type' => Element\Text::class,
                'options' => [
                    'label' => 'Last Name',
                ],
            ]
        );

        $this->add(
            [
                'name' => 'birth_date',
                'type' => Element\DateSelect::class,
                'options' => [
                    'label' => 'Birth Date',
                    'min_year' => date('Y') - 90,
                    'max_year' => date('Y') - 5,
                ],
            ]
        );

        $this->add(
            [
                'name' => 'gender',
                'type' => Element\Radio::class,
                'options' => [

                ]
            ]
        );

        $this->add(
            [
                'type' => ObjectSelect::class,
                'name' => 'skills',
                'options' => [
                    'object_manager' => $this->entityManager,
                    'target_class' => Skill::class,
                    'label_generator' => function(Skill $skill){
                        return $skill->getName();
                    },
                    'display_empty_item' => true,
                    'empty_item_label' => '--',
                    'label' => 'Skill',
                ],
            ]
        );

    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {

        return [
            'id' => [
                'required' => true,
            ],
            'first_name' => [
                'required' => true,
                'filters' => [
                    [
                        'name' => StringTrim::class,
                    ],
                    [
                        'name' => UpperCaseWords::class,
                    ],
                ],
                'validators' => [
                    [
                        'name'    => StringLength::class,
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 50,
                        ],
                    ],
                ],
            ],
            'last_name' => [
                'required' => true ,
                'filters' => [
                    [
                        'name' => StringTrim::class,
                    ],
                    [
                        'name' => StringToUpper::class,
                    ]
                ],
                'validators' => [
                    [
                        'name'    => StringLength::class,
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 50,
                        ],
                    ],
                ],
            ],
            'birth_date' => [
                'required' => true,
                'filters' => [
                    [
                        'name' => DateSelect::class,
                    ]
                ],
                'validator' => [
                    'name' => Date::class,
                ]
            ],

            'gender' => [
                'required' => true,
                'filters' => [
                    [
                        'name' => StringTrim::class,
                    ]
                ],
            ],

            'skills' => [
                'required' => true ,
            ],

            'movie_people_skill' => [
                'required' => false,
            ],
        ];
    }

}