<?php
namespace Instructor;

use Instructor\Model\Instructor;
use Instructor\Model\InstructorTable;
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
                'Instructor\Model\InstructorTable' => function ($sm) {
                    $tableGateway = $sm->get('InstructorTableGateway');
                    $table = new InstructorTable($tableGateway);
                    return $table;
                },
                'InstructorTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Instructor());
                    return new TableGateway('instructor', $dbAdapter, null, $resultSetPrototype);
                }
            )
        );
    }
}

?>