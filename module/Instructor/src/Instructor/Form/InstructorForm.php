<?php

namespace Instructor\Form;

use Zend\Form\Form;

class InstructorForm extends Form {
 public function __construct($name = null) {
  // we want to ignore the name passed
  parent::__construct ( 'instructor' );
  $this->add ( array (
    'name' => 'deptCode',
    'type' => 'Select',
    'options' => array (
      'label' => 'Department' 
    ),
    'attributes' => array(
      'class' => 'form-control'
    ),
  ) );
  $this->add ( array (
    'name' => 'insSSN',
    'type' => 'Text',
    'options' => array (
      'label' => 'Instructor Social Number'
    ),
    'attributes' => array(
      'class' => 'form-control'
    ),
  ) );
  $this->add ( array (
    'name' => 'insName',
    'type' => 'Text',
    'options' => array (
      'label' => 'Instructor Name' 
    ),
    'attributes' => array(
      'class' => 'form-control'
    ),
  ) );
  $this->add ( array (
    'name' => 'insBirthdate',
    'type' => 'Text',
    'options' => array (
      'label' => 'Instructor day of birth'
    ),
    'attributes' => array(
      'class' => 'form-control'
    ),
  ) );
  $this->add ( array (
    'name' => 'insSex',
    'type' => 'Text',
    'options' => array (
      'label' => 'Instructor Sex'
    ),
    'attributes' => array(
      'class' => 'form-control'
    ),
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