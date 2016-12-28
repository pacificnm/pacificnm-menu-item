<?php
namespace MenuItem\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use MenuItem\Controller\RestController;

class RestControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \MenuItem\Controller\Factory\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('MenuItem\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('MenuItem\Form\Form');
        
        return new RestController($service, $form);
    }
}

