<?php
namespace Pacificnm\MenuItem\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\MenuItem\Controller\RestController;

class RestControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Pacificnm\MenuItem\Controller\Factory\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\MenuItem\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Pacificnm\MenuItem\Form\Form');
        
        return new RestController($service, $form);
    }
}

