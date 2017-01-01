<?php
namespace Pacificnm\MenuItem\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\MenuItem\Controller\DeleteController;

class DeleteControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\MenuItem\Controller\DeleteController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\MenuItem\Service\ServiceInterface');
        
        return new DeleteController($service);
    }
}

