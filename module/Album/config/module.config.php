<?php
return array (
  'router' => array (
    'routes' => array (
      'album' => array (
        'type' => 'segment',
        'options' => array (
          'route' => '/album[/:action][/:id]',
          'constraints' => array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
            'id' => '[0-9]+' 
          ),
          'defaults' => array (
            'controller' => 'Album\Controller\Album',
            'action' => 'index' 
          ) 
        ) 
      ) 
    ) 
  ),
  'controllers' => array (
    'invokables' => array (
      'Album\Controller\Album' => 'Album\Controller\AlbumController' 
    ) 
  ),
  
  'view_manager' => array (
    'doctype' => 'HTML5',
    'template_map' => array (
      'album/album/index' => __DIR__ . '/../view/album/album/index.phtml' 
    ),
    'template_path_stack' => array (
      __DIR__ . '/../view' 
    ) 
  ) 
);