<?php
return array (
  'router' => array (
    'routes' => array (
      'subject' => array (
        'type' => 'segment',
        'options' => array (
          'route' => '/subject[/:action][/:id]',
          'constraints' => array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
            'id' => '[a-zA-Z][a-zA-Z0-9_-]*' 
          ),
          'defaults' => array (
            'controller' => 'Subject\Controller\Subject',
            'action' => 'index' 
          ) 
        ) 
      ) 
    ) 
  ),
  'controllers' => array (
    'invokables' => array (
      'Subject\Controller\Subject' => 'Subject\Controller\SubjectController' 
    ) 
  ),
  
  'view_manager' => array (
    'doctype' => 'HTML5',
    'template_map' => array (
      'subject/subject/index' => __DIR__ . '/../view/subject/subject/index.phtml' 
    ),
    'template_path_stack' => array (
      __DIR__ . '/../view' 
    ) 
  ) 
);