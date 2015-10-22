<?php
namespace Student\Model;

use Zend\Db\TableGateway\TableGateway;

class StudentTable
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

    public function getStudent($stuCode)
    {
        $stuCode =  $stuCode;
        $rowset = $this->tableGateway->select(array(
            'stuCode' => $stuCode
        ));
        $row = $rowset->current();
        if (! $row) {
            throw new \Exception("Could not find row $stuCode");
        }
        return $row;
    }

    public function saveStudent(Student $student)
    {
        $data = array(
            'stuCode' => $student->stuCode,
            'stuSSN' => $student->stuSSN,
            'stuName' => $student->stuName,
            'stuBirthdate' => $student->stuBirthdate,
            'stuSex' => $student->stuSex,
            'stuAddress' => $student->stuAddress,
        );
        
        $stuCode = $student->stuCode;
        
            if ($this->getStudent($stuCode)) {
                $this->tableGateway->update($data, array(
                    'stuCode' => $stuCode
                ));
            } else {
                throw new \Exception('Student stuCode does not exist');
            }
        
    }
    
    public function addStudent(Student $student) {
     $data = array(
            'stuCode' => $student->stuCode,
            'stuSSN' => $student->stuSSN,
            'stuName' => $student->stuName,
            'stuBirthdate' => $student->stuBirthdate,
            'stuSex' => $student->stuSex,
            'stuAddress' => $student->stuAddress,
     );
     $this->tableGateway->insert($data);
    }

    public function deleteStudent($stuCode)
    {
        $this->tableGateway->delete(array(
            'stuCode' => $stuCode
        ));
    }
}