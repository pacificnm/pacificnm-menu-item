<?php
namespace MenuItem\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use MenuItem\Controller\ConsoleController;

class ConsoleControllerFactory
{
    /**
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Menu\Controller\ConsoleController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
    
        $service = $realServiceLocator->get('MenuItem\Service\ServiceInterface');
    
        $console = $realServiceLocator->get('console');
    
        return new ConsoleController($service, $console);
    }
}

