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
 * Class EditPeopleForm
 * @package MoviesData\Form
 */
class EditPeopleForm extends Form
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
                'id',
                'first_name',
                'last_name',
                'birth_date',
                'gender',
            ]
        );

        $this->add(
            [
                'name' => 'submit',
                'type' => Submit::class,
                'attributes' => [
                    'value' => 'Edit this person',
                    'id'    => 'submitaction',
                ],
            ]
        );
    }

}