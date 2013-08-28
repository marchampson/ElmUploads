<?php

namespace ElmUploads;

return array(
    'controllers' => array(
        'invokables' => array(
            'ElmUploads\Controller\Upload' => 'ElmUploads\Controller\UploadController',
        ),
        'factories' => array(
        ),
    ),
    'service_manager' => array(
    ),
    'router' => array(
        'routes' => array(
            'uploads-cms' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/elements/upload[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]*'
                    ),
                    'defaults' => array(
                        'controller' => 'ElmUploads\Controller\Upload',
                        'action' => 'index'
                    )
                )
            ),
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'layout' => 'layout/layout',
        'template_path_stack' => array(
            'elm-uploads' => __DIR__ . '/../view'
        ),
    ),
    'view_helpers' => array(
        'invokables' => array()
    ),
    
    // MODULE CONFIGURATIONS
    'module_config' => array(
            'upload_location'           => __DIR__ . '/../data/uploads',
            'image_upload_location'		=> __DIR__ . '/../data/images',
            'search_index'		=> __DIR__ . '/../data/search_index'		
    ),
);
