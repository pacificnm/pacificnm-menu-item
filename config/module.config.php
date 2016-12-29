<?php

return array(
    'module' => array(
        'MenuItem' => array(
            'name' => 'MenuItem',
            'version' => '1.0.4',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/menu_item.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'MenuItem\Controller\ConsoleController' => 'MenuItem\Controller\Factory\ConsoleControllerFactory',
            'MenuItem\Controller\CreateController' => 'MenuItem\Controller\Factory\CreateControllerFactory',
            'MenuItem\Controller\DeleteController' => 'MenuItem\Controller\Factory\DeleteControllerFactory',
            'MenuItem\Controller\IndexController' => 'MenuItem\Controller\Factory\IndexControllerFactory',
            'MenuItem\Controller\RestController' => 'MenuItem\Controller\Factory\RestControllerFactory',
            'MenuItem\Controller\UpdateController' => 'MenuItem\Controller\Factory\UpdateControllerFactory',
            'MenuItem\Controller\ViewController' => 'MenuItem\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'MenuItem\Mapper\MysqlMapperInterface' => 'MenuItem\Mapper\Factory\MysqlMapperFactory',
            'MenuItem\Service\ServiceInterface' => 'MenuItem\Service\Factory\ServiceFactory',
            'MenuItem\Form\Form' => 'MenuItem\Form\Factory\FormFactory'
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
                        'controller' => 'MenuItem\Controller\CreateController',
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
                        'controller' => 'MenuItem\Controller\DeleteController',
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
                        'controller' => 'MenuItem\Controller\IndexController',
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
                        'controller' => 'MenuItem\Controller\RestController',
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
                        'controller' => 'MenuItem\Controller\UpdateController',
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
                        'controller' => 'MenuItem\Controller\ViewController',
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
                            'controller' => 'MenuItem\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                ),
                'menu-item-console-view' => array(
                    'options' => array(
                        'route' => 'menu-item --view [--id=]',
                        'defaults' => array(
                            'controller' => 'MenuItem\Controller\ConsoleController',
                            'action' => 'view'
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
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

