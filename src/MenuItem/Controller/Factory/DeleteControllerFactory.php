<?php
namespace MenuItem\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use MenuItem\Controller\DeleteController;

class DeleteControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \MenuItem\Controller\DeleteController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('MenuItem\Service\ServiceInterface');
        
        return new DeleteController($service);
    }
}

