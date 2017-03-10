<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 10/03/2017
 * Time: 14:21
 */

namespace MoviesData\Form\Fieldset;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;
use Zend\Filter\StringTrim;
use Zend\Filter\UpperCaseWords;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 * Class SkillFieldset
 * @package MoviesData\Form\Fieldset
 * @ORM\Entity
 * @ORM\Table(name="skill")
 */
class SkillFieldset extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * SkillFieldset constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }


    public function init()
    {

        $this->add(
            [
                'name' => 'id',
                'type' => Hidden::class,
            ]
        );

        $this->add(
            [
                'name' => 'name',
                'type' => Text::class,
                'options' => [
                    'label' => 'Skill name',
                ],
            ]
        );
    }

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
            ],
        ];
    }


}