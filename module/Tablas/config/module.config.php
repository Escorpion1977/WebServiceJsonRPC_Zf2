<?php
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'soapcontroller' => __DIR__ . '/../view',
        ),
        'strategies'=>array(
            'ViewJsonStrategy'
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'soapcontroller' => 'Tablas\Controller\IndexController',
        ),
    ),
    'controller_plugins' => array(
     'invokables' => array(
         'FuerzaventamenPlugin' => 'Tablas\Controller\Plugin\FuerzaventamenPlugin'
         )
    ), 
    'router' => array(
        'routes' => array(
            'soapcontroller' => array(
                'type' => 'Literal',
                'priority' => 1000,
                'options' => array(
                    'route' => '/tablas',
                    'defaults' => array(
                        'controller' => 'soapcontroller',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(                  
                ),
            ),
            'showtables' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/showtables',
                    'defaults' => array(
                        'controller' => 'soapcontroller',
                        'action'     => 'showtables',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(                  
                ),
            ),
        ),
    ),
);