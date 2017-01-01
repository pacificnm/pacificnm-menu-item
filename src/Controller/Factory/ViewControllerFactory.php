<?php
namespace Pacificnm\MenuItem\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\MenuItem\Controller\ViewController;

class ViewControllerFactory
{
    
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\MenuItem\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\MenuItem\Service\ServiceInterface');
        
        $menuService = $realServiceLocator->get('Pacificnm\Menu\Service\ServiceInterface');
        
        return new ViewController($service, $menuService);
    }
}

