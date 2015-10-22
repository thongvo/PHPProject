<?php
return array (
  'router' => array (
    'routes' => array (
      'instructor' => array (
        'type' => 'segment',
        'options' => array (
          'route' => '/instructor[/:action][/:id]',
          'constraints' => array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
            'id' => '[a-zA-Z][a-zA-Z0-9_-]*' 
          ),
          'defaults' => array (
            'controller' => 'Instructor\Controller\Instructor',
            'action' => 'index' 
          ) 
        ) 
      ) 
    ) 
  ),
  'controllers' => array (
    'invokables' => array (
      'Instructor\Controller\Instructor' => 'Instructor\Controller\InstructorController' 
    ) 
  ),
  
  'view_manager' => array (
    'doctype' => 'HTML5',
    'template_map' => array (
      'instructor/instructor/index' => __DIR__ . '/../view/instructor/instructor/index.phtml' 
    ),
    'template_path_stack' => array (
      __DIR__ . '/../view' 
    ) 
  ) 
);