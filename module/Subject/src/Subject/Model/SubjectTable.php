<?php
namespace Subject\Model;

use Zend\Db\TableGateway\TableGateway;

class SubjectTable
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

    public function getSubject($subCode)
    {
        $subCode =  $subCode;
        $rowset = $this->tableGateway->select(array(
            'subCode' => $subCode
        ));
        $row = $rowset->current();
        if (! $row) {
            throw new \Exception("Could not find row $subCode");
        }
        return $row;
    }

    public function saveSubject(Subject $subject)
    {
        $data = array(
            'subCode' => $subject->subCode,
            'subName' => $subject->subName,
            'subCredit' => $subject->subCredit,
            'deptCode' => $subject->deptCode,
        );
        
        $subCode = $subject->subCode;
        
            if ($this->getSubject($subCode)) {
                $this->tableGateway->update($data, array(
                    'subCode' => $subCode
                ));
            } else {
                throw new \Exception('Subject subCode does not exist');
            }
        
    }
    
    public function addSubject(Subject $subject) {
     $data = array(
            'subCode' => $subject->subCode,
            'subName' => $subject->subName,
            'subCredit' => $subject->subCredit,
            'deptCode' => $subject->deptCode,
     );
     $this->tableGateway->insert($data);
    }

    public function deleteSubject($subCode)
    {
        $this->tableGateway->delete(array(
            'subCode' => $subCode
        ));
    }
}