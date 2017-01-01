<?php
namespace Pacificnm\MenuItem\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\MenuItem\Service\Service;

class ServiceFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Pacificnm\MenuItem\Mapper\MysqlMapperInterface');
        
        return new Service($mapper);
    }
}

