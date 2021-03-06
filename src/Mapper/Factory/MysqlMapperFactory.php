<?php
namespace Pacificnm\MenuItem\Mapper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\MenuItem\Mapper\MysqlMapper;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use Pacificnm\MenuItem\Hydrator\Hydrator;
use Pacificnm\MenuItem\Entity\Entity;

class MysqlMapperFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Pacificnm\MenuItem\Mapper\MysqlMapper
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new AggregateHydrator();
        
        $hydrator->add(new Hydrator());
        
        $prototype = new Entity();
        
        $readAdapter = $serviceLocator->get('db2');
        
        $writeAdapter = $serviceLocator->get('db1');
        
        return new MysqlMapper($readAdapter, $writeAdapter, $hydrator, $prototype);
    }
}

