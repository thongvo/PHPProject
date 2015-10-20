<?php
namespace Department\Model;

use Zend\Db\TableGateway\TableGateway;

class DepartmentTable
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getDepartment($deptCode)
    {
        $deptCode =  $deptCode;
        $rowset = $this->tableGateway->select(array(
            'deptCode' => $deptCode
        ));
        $row = $rowset->current();
        if (! $row) {
            throw new \Exception("Could not find row $deptCode");
        }
        return $row;
    }

    public function saveDepartment(Department $department)
    {
        $data = array(
            'deptCode' => $department->deptCode,
            'deptName' => $department->deptName,
            'deptOffice' => $department->deptOffice,
            'deptPhone' => $department->deptPhone,
        );
        
        $deptCode = $department->deptCode;
        
            if ($this->getDepartment($deptCode)) {
                $this->tableGateway->update($data, array(
                    'deptCode' => $deptCode
                ));
            } else {
                throw new \Exception('Department deptCode does not exist');
            }
        
    }
    
    public function addDepartment(Department $department) {
     $data = array(
       'deptCode' => $department->deptCode,
       'deptName' => $department->deptName,
       'deptOffice' => $department->deptOffice,
       'deptPhone' => $department->deptPhone,
     );
     $this->tableGateway->insert($data);
    }

    public function deleteDepartment($deptCode)
    {
        $this->tableGateway->delete(array(
            'deptCode' => $deptCode
        ));
    }
}