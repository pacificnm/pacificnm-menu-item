<?php
namespace MenuItem\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use MenuItem\Controller\UpdateController;

class UpdateControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \MenuItem\Controller\UpdateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('MenuItem\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('MenuItem\Form\Form');
        
        return new UpdateController($service, $form);
    }
}

