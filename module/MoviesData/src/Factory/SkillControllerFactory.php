<?php
/**
 * Created by PhpStorm.
 * User: kevin_n
 * Date: 10/03/2017
 * Time: 14:15
 */

namespace MoviesData\Factory;


use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use MoviesData\Controller\SkillController;
use Zend\ServiceManager\Factory\FactoryInterface;

class SkillControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $skillService = $container->get(EntityManager::class)->get(SkillService::class);

        $addSkillForm = $container->get('FormElementManager')->get(AddSkillForm::class);

        $editSkillForm = $container->get('FormElementManager')->get(EditSkillForm::class);

        return new SkillController($skillService, $addSkillForm, $editSkillForm);

    }

}