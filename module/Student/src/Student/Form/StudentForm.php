<?php

namespace Student\Form;

use Zend\Form\Form;

class StudentForm extends Form {
 public function __construct($name = null) {
  // we want to ignore the name passed
  parent::__construct ( 'student' );
  $this->add ( array (
    'name' => 'stuCode',
    'type' => 'Text',
    'options' => array (
      'label' => 'Student Code' 
    ),
    'attributes' => array (
      'class' => 'form-control' 
    ) 
  ) );
  $this->add ( array (
    'name' => 'stuSSN',
    'type' => 'Text',
    'options' => array (
      'label' => 'Student Social Number' 
    ),
    'attributes' => array (
      'class' => 'form-control' 
    ) 
  ) );
  $this->add ( array (
    'name' => 'stuName',
    'type' => 'Text',
    'options' => array (
      'label' => 'Student Name' 
    ),
    'attributes' => array (
      'class' => 'form-control' 
    ) 
  ) );
  $this->add ( array (
    'name' => 'stuBirthdate',
    'type' => 'Text',
    'options' => array (
      'label' => 'Student day of birth' 
    ),
    'attributes' => array (
      'class' => 'form-control' 
    ) 
  ) );
  $this->add ( array (
    'type' => 'radio',
    'name' => 'stuSex',
    'options' => array (
      'value_options' => array (
        'Male' => 'Male',
        'Female' => 'Female' 
      ) 
    ),
    'attributes' => array (
      'style' => 'margin-left:10px;' 
    ) 
  ) );
  $this->add ( array (
    'name' => 'stuAddress',
    'type' => 'Text',
    'options' => array (
      'label' => 'Student Address' 
    ),
    'attributes' => array (
      'class' => 'form-control' 
    ) 
  ) );
  $this->add ( array (
    'name' => 'submit',
    'type' => 'Submit',
    'attributes' => array (
      'value' => 'Go',
      'id' => 'submitbutton',
      'class' => 'btn btn-default' 
    ) 
  ) );
 }
}