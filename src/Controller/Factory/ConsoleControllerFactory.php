<?php
namespace Pacificnm\MenuItem\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\MenuItem\Controller\ConsoleController;

class ConsoleControllerFactory
{
    /**
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Menu\Controller\ConsoleController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
    
        $service = $realServiceLocator->get('Pacificnm\MenuItem\Service\ServiceInterface');
    
        $console = $realServiceLocator->get('console');
    
        return new ConsoleController($service, $console);
    }
}

