<?php

namespace Instructor\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Instructor implements InputFilterAwareInterface{
 //public $id;
 public $insSSN;
 public $insName;
 public $insBirthdate;
 public $insSex;
 public $deptCode;
 protected $inputFilter;
 
 public function exchangeArray($data) {
  //$this->id = (! empty ( $data ['id'] )) ? $data ['id'] : null;
  $this->insSSN = (! empty ( $data ['insSSN'] )) ? $data ['insSSN'] : null;
  $this->insName = (! empty ( $data ['insName'] )) ? $data ['insName'] : null;
  $this->insBirthdate = (! empty ( $data ['insBirthdate'] )) ? $data ['insBirthdate'] : null;
  $this->insSex = (! empty ( $data ['insSex'] )) ? $data ['insSex'] : null;
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
     'name' => 'insSSN',
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
     'name' => 'insName',
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
     'name' => 'insBirthdate',
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
     'name' => 'insSex',
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