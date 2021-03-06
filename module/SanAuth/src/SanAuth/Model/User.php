<?php
namespace SanAuth\Model;

use Zend\Form\Form;

class User extends Form {
 public function __construct($name = null) {
  // we want to ignore the name passed
  parent::__construct ( 'user' );

  $this->add ( array (
    'name' => 'username',
    'type' => 'Text',
    'options' => array (
      'label' => 'Username'
    ),
    'attributes' => array(
      'class' => 'form-control',
      'required' => true,
    ),
  ) );
  $this->add ( array (
    'name' => 'password',
    'type' => 'Password',
    'options' => array (
      'label' => 'Password'
    ),
    'attributes' => array(
      'class' => 'form-control',
      'required' => true,
    ),
  ) );
  $this->add ( array (
    'name' => 'submit',
    'type' => 'Submit',
    'attributes' => array (
      'value' => 'Login',
      'id' => 'submitbutton',
      'class' => 'btn btn-primary',
    )
  ) );
 }
}