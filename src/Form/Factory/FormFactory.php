<?php
namespace Pacificnm\MenuItem\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\MenuItem\Form\Form;


class FormFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Menu\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $service = $serviceLocator->get('Pacificnm\Menu\Service\ServiceInterface');
        
        return new Form($service);
    }
}

