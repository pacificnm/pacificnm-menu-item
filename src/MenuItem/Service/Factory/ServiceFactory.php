<?php
namespace MenuItem\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use MenuItem\Service\Service;

class ServiceFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('MenuItem\Mapper\MysqlMapperInterface');
        
        return new Service($mapper);
    }
}

