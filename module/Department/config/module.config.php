<?php
return array (
  'router' => array (
    'routes' => array (
      'department' => array (
        'type' => 'segment',
        'options' => array (
          'route' => '/department[/:action][/:id]',
          'constraints' => array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
            'id' => '[a-zA-Z][a-zA-Z0-9_-]*' 
          ),
          'defaults' => array (
            'controller' => 'Department\Controller\Department',
            'action' => 'index' 
          ) 
        ) 
      ) 
    ) 
  ),
  'controllers' => array (
    'invokables' => array (
      'Department\Controller\Department' => 'Department\Controller\DepartmentController' 
    ) 
  ),
  
  'view_manager' => array (
    'doctype' => 'HTML5',
    'template_map' => array (
      'department/department/index' => __DIR__ . '/../view/department/department/index.phtml' 
    ),
    'template_path_stack' => array (
      __DIR__ . '/../view' 
    ) 
  ) 
);