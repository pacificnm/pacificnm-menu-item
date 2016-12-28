<?php
namespace MenuItem\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use MenuItem\Controller\ViewController;

class ViewControllerFactory
{
    
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \MenuItem\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('MenuItem\Service\ServiceInterface');
        
        $menuService = $realServiceLocator->get('Menu\Service\ServiceInterface');
        
        return new ViewController($service, $menuService);
    }
}

