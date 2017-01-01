<?php
namespace Pacificnm\MenuItem;

class Module
{
    public function getConsoleUsage()
    {
        return array(
            'menu-item --list' => 'lists all Menu Items',
            'menu-item --view [--id=]' => 'gets a single menu item by its id'
        );
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/../config/pacificnm.menu-item.global.php';
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/'
                ),
            ),
        );
    }
}

