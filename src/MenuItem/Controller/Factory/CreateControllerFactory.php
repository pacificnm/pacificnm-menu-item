<?php
namespace MenuItem\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use MenuItem\Controller\CreateController;

class CreateControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \MenuItem\Controller\CreateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('MenuItem\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('MenuItem\Form\Form');
        
        return new CreateController($service, $form);
    }
}

