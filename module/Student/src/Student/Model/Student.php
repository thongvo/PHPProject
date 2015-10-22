<?php

namespace Student\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Student implements InputFilterAwareInterface{
 //public $id;
 public $stuCode;
 public $stuSSN;
 public $stuName;
 public $stuBirthdate;
 public $stuSex;
 public $stuAddress;
 protected $inputFilter;
 
 public function exchangeArray($data) {
  //$this->id = (! empty ( $data ['id'] )) ? $data ['id'] : null;
  $this->stuCode = (! empty ( $data ['stuCode'] )) ? $data ['stuCode'] : null;
  $this->stuSSN = (! empty ( $data ['stuSSN'] )) ? $data ['stuSSN'] : null;
  $this->stuName = (! empty ( $data ['stuName'] )) ? $data ['stuName'] : null;
  $this->stuBirthdate = (! empty ( $data ['stuBirthdate'] )) ? $data ['stuBirthdate'] : null;
  $this->stuSex = (! empty ( $data ['stuSex'] )) ? $data ['stuSex'] : null;
  $this->stuAddress = (! empty ( $data ['stuAddress'] )) ? $data ['stuAddress'] : null;
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
     'name' => 'stuCode',
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
     'name' => 'stuSSN',
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
     'name' => 'stuName',
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