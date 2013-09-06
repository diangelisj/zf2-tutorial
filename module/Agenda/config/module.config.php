<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Agenda\Controller\Agenda' => 'Agenda\Controller\AgendaController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'agenda' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/agenda[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Agenda\Controller\Agenda',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'agenda' => __DIR__ . '/../view',
        ),
    ),
);

