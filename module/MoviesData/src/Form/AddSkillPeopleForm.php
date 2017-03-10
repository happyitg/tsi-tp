<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 07/03/2017
 * Time: 10:58
 */

namespace MoviesData\Form;


use MoviesData\Form\Fieldset\PeopleFieldset;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

/**
 * Class AddSkillPeopleForm
 * @package MoviesData\Form
 */
class AddSkillPeopleForm extends Form
{
    public function init()
    {

        $this->add(
            [
                'name' => 'people',
                'type' => PeopleFieldset::class,
                'options' => [
                    'use_as_base_fieldset' => true,
                ],

            ]
        );

        $this->setValidationGroup(
            [
                'people' => [

                    'skills',
                ],
            ]
        );

        $this->add(
            [
                'name' => 'submit',
                'type' => Submit::class,
                'attributes' => [
                    'value' => 'Add a skill',
                    'id'    => 'submitbutton',
                ],
            ]
        );
    }
}