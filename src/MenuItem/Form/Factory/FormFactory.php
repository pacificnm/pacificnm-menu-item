<?php
namespace MenuItem\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use MenuItem\Form\Form;


class FormFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Menu\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $service = $serviceLocator->get('Menu\Service\ServiceInterface');
        
        return new Form($service);
    }
}

