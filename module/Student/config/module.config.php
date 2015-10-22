<?php
return array (
  'router' => array (
    'routes' => array (
      'student' => array (
        'type' => 'segment',
        'options' => array (
          'route' => '/student[/:action][/:id]',
          'constraints' => array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
            'id' => '[a-zA-Z][a-zA-Z0-9_-]*' 
          ),
          'defaults' => array (
            'controller' => 'Student\Controller\Student',
            'action' => 'index' 
          ) 
        ) 
      ) 
    ) 
  ),
  'controllers' => array (
    'invokables' => array (
      'Student\Controller\Student' => 'Student\Controller\StudentController' 
    ) 
  ),
  
  'view_manager' => array (
    'doctype' => 'HTML5',
    'template_map' => array (
      'student/student/index' => __DIR__ . '/../view/student/student/index.phtml' 
    ),
    'template_path_stack' => array (
      __DIR__ . '/../view' 
    ) 
  ) 
);