<?php

namespace Subject\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Subject implements InputFilterAwareInterface{
 //public $id;
 public $subCode;
 public $subName;
 public $subCredit;
 public $deptCode;
 protected $inputFilter;
 
 public function exchangeArray($data) {
  //$this->id = (! empty ( $data ['id'] )) ? $data ['id'] : null;
  $this->subCode = (! empty ( $data ['subCode'] )) ? $data ['subCode'] : null;
  $this->subName = (! empty ( $data ['subName'] )) ? $data ['subName'] : null;
  $this->subCredit = (! empty ( $data ['subCredit'] )) ? $data ['subCredit'] : null;
  $this->deptCode = (! empty ( $data ['deptCode'] )) ? $data ['deptCode'] : null;
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
     'name' => 'subCode',
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
     'name' => 'subName',
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
     'name' => 'subCredit',
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