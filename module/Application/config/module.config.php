<?php
return array(
	'db' => array(
         'driver'         => 'Pdo',
         'username'       => 'root',
         'password'       => '',
         'dsn'            => 'mysql:dbname=blog;host=localhost',
         'driver_options' => array(
             \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
         )
     ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/dev',
                    'defaults' => array(
                        'controller'    => 'Application\Controller\Dev',
                        'action'        => 'index',
                    ),
                ),
            ),
			'application' => array(
                 'type'    => 'Literal',
                 'options' => array(
                     'route'    => '/list',
                     'defaults' => array(
                         'controller'    => 'Application\Controller\List',
                         'action'        => 'index',
                     ),
                 ),
             ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
      ),
		'factories' => array(
         'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
		 'Application\Mapper\PostMapperInterface'   => 'Application\Factory\ZendDbSqlMapperFactory',
         'Application\Service\PostServiceInterface' => 'Application\Service\Factory\PostServiceFactory'
		
      ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
			'db' => 'Zend\Db\Adapter\Adapter',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'invokables' => array(
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
			'Application\Controller\Dev' => 'Application\Controller\DevController',
        ),
		'factories' => array(
             'Application\Controller\List' => 'Application\Factory\ListControllerFactory'
         )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
