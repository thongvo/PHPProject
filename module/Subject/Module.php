<?php
namespace Subject;

use Subject\Model\Subject;
use Subject\Model\SubjectTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Subject\Model\SubjectTable' => function ($sm) {
                    $tableGateway = $sm->get('SubjectTableGateway');
                    $table = new SubjectTable($tableGateway);
                    return $table;
                },
                'SubjectTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Subject());
                    return new TableGateway('subject', $dbAdapter, null, $resultSetPrototype);
                }
            )
        );
    }
}

?>