<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 10/03/2017
 * Time: 14:19
 */

namespace MoviesData\Form;



use MoviesData\Form\Fieldset\SkillFieldset;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

class AddSkillForm extends Form
{
    public function init()
    {
        $this->add(
            [
                'name' => 'skill',
                'type' => SkillFieldset::class,
            ]
        );

        $this->setValidationGroup(
            [
                'skill' => [
                    'name',
                ],
            ]
        );

        $this->add(
            [
                'name' => 'submit',
                'type '=> Submit::class,
            ]
        );
    }
}