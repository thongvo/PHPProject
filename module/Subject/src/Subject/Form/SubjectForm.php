<?php

namespace Subject\Form;

use Zend\Form\Form;

class SubjectForm extends Form {
 public function __construct($name = null) {
  // we want to ignore the name passed
  parent::__construct ( 'subject' );
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
    'name' => 'subCode',
    'type' => 'Text',
    'options' => array (
      'label' => 'Subject Code'
    ),
    'attributes' => array(
      'class' => 'form-control'
    ),
  ) );
  $this->add ( array (
    'name' => 'subName',
    'type' => 'Text',
    'options' => array (
      'label' => 'Subject Name' 
    ),
    'attributes' => array(
      'class' => 'form-control'
    ),
  ) );
  $this->add ( array (
    'name' => 'subCredit',
    'type' => 'Text',
    'options' => array (
      'label' => 'Subject Credits'
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