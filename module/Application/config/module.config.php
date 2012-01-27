<?php
return array(
    'layout'                => 'layout/layout.phtml',
    'display_exceptions'    => true,
    'di'                    => array(
        'instance' => array(
            'alias' => array(
                'index' => 'Application\Controller\IndexController',
                'worker' => 'Application\Controller\WorkerController',
                'error' => 'Application\Controller\ErrorController',
                'library' => 'Application\Form\Library',
                'view'  => 'Zend\View\PhpRenderer',
            ),
            'Application\Controller\IndexController' => array(
                'parameters' => array(
                    'libraryTable' => 'Application\Model\LibraryTable'
                ),
            ),
            'Application\Controller\WorkerController' => array(
                'parameters' => array(
                    'workerTable' => 'Application\Model\WorkerTable'
                ),
            ),
            'Application\Model\LibraryTable' => array(
                'parameters' => array(
                    'config' => 'Zend\Db\Adapter\PdoMysql'
                ),
            ),
            'Application\Model\WorkerTable' => array(
                'parameters' => array(
                    'config' => 'Zend\Db\Adapter\PdoMysql'
                ),
            ),
            'Zend\Db\Adapter\PdoMysql' => array(
               'parameters' => array(
                   'config' => array(
                       'host' => 'localhost',
                       'username' => 'root',
                       'password' => 'aleks',
                       'dbname' => 'skylib'
                   )
               )  
            ),
            'Zend\View\PhpRenderer' => array(
                'parameters' => array(
                    'resolver' => 'Zend\View\TemplatePathStack',
                    'options'  => array(
                        'script_paths' => array(
                            'application' => __DIR__ . '/../view',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'routes' => array(
        'default' => array(
            'type'    => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route'    => '/[:controller[/:action]]',
                'constraints' => array(
                    'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                ),
                'defaults' => array(
                    'controller' => 'index',
                    'action'     => 'index',
                ),
            ),
        ),
        'home' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route'    => '/',
                'defaults' => array(
                    'controller' => 'index',
                    'action'     => 'index',
                ),
            ),
        ),
    ),
);
