<?php
namespace Application;

use Application\Controller\Admin as AdminController;
use Application\Controller\Index as IndexController;
use Application\Controller\Line as LineController;
use Application\Model\Factory\Controller\Admin as AdminControllerFactory;
use Application\Model\Factory\Controller\Index as IndexControllerFactory;
use Application\Model\Factory\Controller\Line as LineControllerFactory;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'admin' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/admin[/:action]',
                    'defaults' => [
                        'controller' => AdminController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'line' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/line/:lineId/:lineSlug',
                    'defaults' => [
                        'controller' => LineController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            AdminController::class  => AdminControllerFactory::class,
            IndexController::class => IndexControllerFactory::class,
            LineController::class   => LineControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'abstract_factories' => [
            \Zend\Db\Adapter\AdapterAbstractServiceFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
