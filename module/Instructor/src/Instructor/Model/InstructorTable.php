<?php
namespace Instructor\Model;

use Zend\Db\TableGateway\TableGateway;

class InstructorTable
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

    public function getInstructor($insSSN)
    {
        $insSSN =  $insSSN;
        $rowset = $this->tableGateway->select(array(
            'insSSN' => $insSSN
        ));
        $row = $rowset->current();
        if (! $row) {
            throw new \Exception("Could not find row $insSSN");
        }
        return $row;
    }

    public function saveInstructor(Instructor $instructor)
    {
        $data = array(
            'insSSN' => $instructor->insSSN,
            'insName' => $instructor->insName,
            'insBirthdate' => $instructor->insBirthdate,
            'insSex' => $instructor->insSex,
            'deptCode' => $instructor->deptCode,
        );
        
        $insSSN = $instructor->insSSN;
        
            if ($this->getInstructor($insSSN)) {
                $this->tableGateway->update($data, array(
                    'insSSN' => $insSSN
                ));
            } else {
                throw new \Exception('Instructor insSSN does not exist');
            }
        
    }
    
    public function addInstructor(Instructor $instructor) {
     $data = array(
            'insSSN' => $instructor->insSSN,
            'insName' => $instructor->insName,
            'insBirthdate' => $instructor->insBirthdate,
            'insSex' => $instructor->insSex,
            'deptCode' => $instructor->deptCode,
     );
     $this->tableGateway->insert($data);
    }

    public function deleteInstructor($insSSN)
    {
        $this->tableGateway->delete(array(
            'insSSN' => $insSSN
        ));
    }
}