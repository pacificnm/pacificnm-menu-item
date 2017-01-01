<?php
namespace Pacificnm\MenuItem\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\MenuItem\Controller\CreateController;

class CreateControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Pacificnm\MenuItem\Controller\CreateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\MenuItem\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Pacificnm\MenuItem\Form\Form');
        
        return new CreateController($service, $form);
    }
}

