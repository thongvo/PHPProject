<?php

namespace Department\Form;

use Zend\Form\Form;

class DepartmentForm extends Form {
 public function __construct($name = null) {
  // we want to ignore the name passed
  parent::__construct ( 'department' );
  $this->add ( array (
    'name' => 'deptCode',
    'type' => 'Text',
    'options' => array (
      'label' => 'Department Code' 
    ),
    'attributes' => array(
      'class' => 'form-control'
    ),
  ) );
  $this->add ( array (
    'name' => 'deptName',
    'type' => 'Text',
    'options' => array (
      'label' => 'Department Name' 
    ),
    'attributes' => array(
      'class' => 'form-control'
    ),
  ) );
  $this->add ( array (
    'name' => 'deptOffice',
    'type' => 'Text',
    'options' => array (
      'label' => 'Department Office'
    ),
    'attributes' => array(
      'class' => 'form-control'
    ),
  ) );
  $this->add ( array (
    'name' => 'deptPhone',
    'type' => 'Text',
    'options' => array (
      'label' => 'Department Phone'
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