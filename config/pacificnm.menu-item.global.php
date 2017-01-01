<?php

return array(
    'module' => array(
        'MenuItem' => array(
            'name' => 'MenuItem',
            'version' => '1.0.5',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/menu_item.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Pacificnm\MenuItem\Controller\ConsoleController' => 'Pacificnm\MenuItem\Controller\Factory\ConsoleControllerFactory',
            'Pacificnm\MenuItem\Controller\CreateController' => 'Pacificnm\MenuItem\Controller\Factory\CreateControllerFactory',
            'Pacificnm\MenuItem\Controller\DeleteController' => 'Pacificnm\MenuItem\Controller\Factory\DeleteControllerFactory',
            'Pacificnm\MenuItem\Controller\IndexController' => 'Pacificnm\MenuItem\Controller\Factory\IndexControllerFactory',
            'Pacificnm\MenuItem\Controller\RestController' => 'Pacificnm\MenuItem\Controller\Factory\RestControllerFactory',
            'Pacificnm\MenuItem\Controller\UpdateController' => 'Pacificnm\MenuItem\Controller\Factory\UpdateControllerFactory',
            'Pacificnm\MenuItem\Controller\ViewController' => 'Pacificnm\MenuItem\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Pacificnm\MenuItem\Mapper\MysqlMapperInterface' => 'Pacificnm\MenuItem\Mapper\Factory\MysqlMapperFactory',
            'Pacificnm\MenuItem\Service\ServiceInterface' => 'Pacificnm\MenuItem\Service\Factory\ServiceFactory',
            'Pacificnm\MenuItem\Form\Form' => 'Pacificnm\MenuItem\Form\Factory\FormFactory'
        )
    ),
    'router' => array(
        'routes' => array(
            'menu-item-create' => array(
                'pageTitle' => 'Menu Item',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'menu-index',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/menu-item/create',
                    'defaults' => array(
                        'controller' => 'Pacificnm\MenuItem\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'menu-item-delete' => array(
                'pageTitle' => 'Menu Item',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'menu-index',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/menu-item/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\MenuItem\Controller\DeleteController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'menu-item-index' => array(
                'pageTitle' => 'Menu Item',
                'pageSubTitle' => 'Home',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'menu-index',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/menu-item',
                    'defaults' => array(
                        'controller' => 'Pacificnm\MenuItem\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'menu-item-rest' => array(
                'pageTitle' => 'Menu Item',
                'pageSubTitle' => 'Rest',
                'activeSubMenuItem' => 'menu-index',
                'layout' => 'rest',
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/menu-item[/:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\MenuItem\Controller\RestController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'menu-item-update' => array(
                'pageTitle' => 'Menu Item',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'menu-index',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/menu-item/update/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\MenuItem\Controller\UpdateController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'menu-item-view' => array(
                'pageTitle' => 'Menu Item',
                'pageSubTitle' => 'View',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'menu-index',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/menu-item/view/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\MenuItem\Controller\ViewController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            )
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'menu-item-console-index' => array(
                    'options' => array(
                        'route' => 'menu-item --list',
                        'defaults' => array(
                            'controller' => 'Pacificnm\MenuItem\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                ),
                'menu-item-console-view' => array(
                    'options' => array(
                        'route' => 'menu-item --view [--id=]',
                        'defaults' => array(
                            'controller' => 'Pacificnm\MenuItem\Controller\ConsoleController',
                            'action' => 'view'
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Pacificnm\MenuItem' => true
        ),
        'template_map' => array(
            'pacificnm/menu-item/create/index' => __DIR__ . '/../view/menu-item/create/index.phtml',
            'pacificnm/menu-item/delete/index' => __DIR__ . '/../view/menu-item/delete/index.phtml',
            'pacificnm/menu-item/index/index' => __DIR__ . '/../view/menu-item/index/index.phtml',
            'pacificnm/menu-item/update/index' => __DIR__ . '/../view/menu-item/update/index.phtml',
            'pacificnm/menu-item/view/index' => __DIR__ . '/../view/menu-item/view/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'user' => array(),
            'administrator' => array(
                'menu-item-create',
                'menu-item-delete',
                'menu-item-index',
                'menu-item-update',
                'menu-item-view'
            )
        )
    ),
    'menu' => array(
        'default' => array(
            array(
                'name' => 'Admin',
                'route' => 'admin-index',
                'icon' => 'fa fa-gear',
                'order' => 99,
                'location' => 'left',
                'active' => true,
                'items' => array()
            )
        )
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Admin',
                'route' => 'admin-index',
                'useRouteMatch' => true,
                'pages' => array(
                    array(
                        'label' => 'Menu',
                        'route' => 'menu-index',
                        'useRouteMatch' => true,
                        'pages' => array(
                            array(
                                'label' => 'View',
                                'route' => 'menu-view',
                                'useRouteMatch' => true,
                                'pages' => array(
                                    array(
                                        'label' => 'Item',
                                        'route' => 'menu-item-view',
                                        'useRouteMatch' => true,
                                        'pages' => array(
                                            array(
                                                'label' => 'Edit',
                                                'route' => 'menu-item-update',
                                                'useRouteMatch' => true,
                                            ),
                                            array(
                                                'label' => 'Delete',
                                                'route' => 'menu-item-delete',
                                                'useRouteMatch' => true,
                                            )
                                        )
                                    )
                                )
                            )
                        )
                    )
                )
            )
        )
    )
);

