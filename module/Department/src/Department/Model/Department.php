<?php

namespace Department\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Department implements InputFilterAwareInterface{
 //public $id;
 public $deptCode;
 public $deptName;
 public $deptOffice;
 public $deptPhone;
 protected $inputFilter;
 
 public function exchangeArray($data) {
  //$this->id = (! empty ( $data ['id'] )) ? $data ['id'] : null;
  $this->deptCode = (! empty ( $data ['deptCode'] )) ? $data ['deptCode'] : null;
  $this->deptName = (! empty ( $data ['deptName'] )) ? $data ['deptName'] : null;
  $this->deptOffice = (! empty ( $data ['deptOffice'] )) ? $data ['deptOffice'] : null;
  $this->deptPhone = (! empty ( $data ['deptPhone'] )) ? $data ['deptPhone'] : null;
 }
 
 public function getArrayCopy() {
  return get_object_vars($this);
 }
 
 // Add content to these methods:
 public function setInputFilter(InputFilterInterface $inputFilter) {
  throw new \Exception ( "Not used" );
 }
 public function getInputFilter() {
  if (! $this->inputFilter) {
   $inputFilter = new InputFilter ();
//    $inputFilter->add ( array (
//      'name' => 'id',
//      'required' => true,
//      'filters' => array (
//        array (
//          'name' => 'Int' 
//        ) 
//      ) 
//    ) );
   $inputFilter->add ( array (
     'name' => 'deptCode',
     'required' => true,
     'filters' => array (
       array (
         'name' => 'StripTags' 
       ),
       array (
         'name' => 'StringTrim' 
       ) 
     ),
     'validators' => array (
       array (
         'name' => 'StringLength',
         'options' => array (
           'encoding' => 'UTF-8',
           'min' => 1,
           'max' => 100 
         ) 
       ) 
     ) 
   ) );
   $inputFilter->add ( array (
     'name' => 'deptName',
     'required' => true,
     'filters' => array (
       array (
         'name' => 'StripTags' 
       ),
       array (
         'name' => 'StringTrim' 
       ) 
     ),
     'validators' => array (
       array (
         'name' => 'StringLength',
         'options' => array (
           'encoding' => 'UTF-8',
           'min' => 1,
           'max' => 100 
         ) 
       ) 
     ) 
   ) );
   $inputFilter->add ( array (
     'name' => 'deptOffice',
     'required' => true,
     'filters' => array (
       array (
         'name' => 'StripTags'
       ),
       array (
         'name' => 'StringTrim'
       )
     ),
     'validators' => array (
       array (
         'name' => 'StringLength',
         'options' => array (
           'encoding' => 'UTF-8',
           'min' => 1,
           'max' => 100
         )
       )
     )
   ) );
   $inputFilter->add ( array (
     'name' => 'deptPhone',
     'required' => true,
     'filters' => array (
       array (
         'name' => 'StripTags'
       ),
       array (
         'name' => 'StringTrim'
       )
     ),
     'validators' => array (
       array (
         'name' => 'StringLength',
         'options' => array (
           'encoding' => 'UTF-8',
           'min' => 1,
           'max' => 100
         )
       )
     )
   ) );
   $this->inputFilter = $inputFilter;
  }
  return $this->inputFilter;
 }
}