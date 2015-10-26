<?php

namespace Instructor\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Instructor\Model\Instructor;
use Instructor\Form\InstructorForm;
use Department\Model\Department;

class InstructorController extends AbstractActionController {
 protected $instructorTable;
 protected $departmentTable;
 
 public function indexAction() {
 
  return new ViewModel ( array (
    'instructors' => $this->getInstructorTable ()->fetchAll() 
  ) );
 }
 
 public function addAction() {
  $form = new InstructorForm ();
  $form->get ( 'submit' )->setValue ( 'Add' );
  $form->get ( 'submit' )->setAttribute ( 'class', 'btn btn-primary' );

  //Lay toan bo department tu DB.
  $departments = $this->getDepartmentTable()->fetchAll();
  $listoption =array();
  
  foreach ($departments as $item){
   $listoption[$item->deptCode] = $item->deptName;
  }
  
  $form->get ( 'deptCode' )->setOptions(array(
    'value_options' => $listoption
  ));
  
  
  $request = $this->getRequest ();
  if ($request->isPost ()) {
   $instructor = new Instructor ();
   $form->setInputFilter ( $instructor->getInputFilter () );
   $form->setData ( $request->getPost () );
   
   
   if ($form->isValid ()) {
    $instructor->exchangeArray ( $form->getData () );
    $this->getInstructorTable ()->addInstructor ( $instructor );
    // Redirect to list of instructors
    return $this->redirect ()->toRoute ( 'instructor' );
   }
  }
  return array (
    'form' => $form 
  );
 }
 
 public function editAction() {
  $insSSN = $this->params ()->fromRoute ( 'id', 0 );
  
  // Get the Instructor with the specified id. An exception is thrown
  // if it cannot be found, in which case go to the index page.
  try {
   $instructor = $this->getInstructorTable ()->getInstructor ( $insSSN );
  } catch ( \Exception $ex ) {
   return $this->redirect ()->toRoute ( 'instructor', array (
     'action' => 'index' 
   ) );
  }
  $form = new InstructorForm ();
  $form->bind ( $instructor );
  $form->get ( 'submit' )->setAttribute ( 'value', 'Save' );
  $form->get ( 'submit' )->setAttribute ( 'class', 'btn btn-success' );
  
  //Lay toan bo department tu DB.
  $departments = $this->getDepartmentTable()->fetchAll();
  $listoption =array();
  
  foreach ($departments as $item){
   $listoption[$item->deptCode] = $item->deptName;
  }
  
  $form->get ( 'deptCode' )->setOptions(array(
    'value_options' => $listoption
  ));
  
  $request = $this->getRequest ();
  if ($request->isPost ()) {
   $form->setInputFilter ( $instructor->getInputFilter () );
   $form->setData ( $request->getPost () );
   if ($form->isValid ()) {
    $this->getInstructorTable ()->saveInstructor ( $instructor );
    // Redirect to list of instructors
    return $this->redirect ()->toRoute ( 'instructor' );
   }
  }
  return array (
    'id' => $insSSN,
    'form' => $form 
  );
 }
 
 public function deleteAction() {
  $insSSN = $this->params ()->fromRoute ( 'id', "N/A" );
  if ($insSSN=="N/A") {
   
   return $this->redirect ()->toRoute ( 'instructor' );
  }
  
  $request = $this->getRequest ();
  if ($request->isPost ()) {
   $del = $request->getPost ( 'del', 'No' );
   if ($del == 'Yes') {
    
    //$deptCode = $request->getPost ( 'id' );
   // $deptCode = $this->params ()->fromRoute ( 'id', "N/A" );
 
    $this->getInstructorTable ()->deleteInstructor ( $insSSN );
   }
   
   // Redirect to list of instructors
   return $this->redirect ()->toRoute ( 'instructor' );
  }
  
  return array (
    'id' => $insSSN,
    'instructor' => $this->getInstructorTable ()->getInstructor ( $insSSN ) 
  );
 }
 
 public function getInstructorTable() {
  if (! $this->instructorTable) {
   $sm = $this->getServiceLocator ();
   $this->instructorTable = $sm->get ( 'Instructor\Model\InstructorTable' );
  }
  return $this->instructorTable;
 }
 
 public function getDepartmentTable() {
  if (! $this->departmentTable) {
   $sm = $this->getServiceLocator ();
   $this->departmentTable = $sm->get ( 'Department\Model\DepartmentTable' );
  }
  return $this->departmentTable;
 }
 
}
?>