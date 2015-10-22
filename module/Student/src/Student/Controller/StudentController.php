<?php

namespace Student\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Student\Model\Student;
use Student\Form\StudentForm;

class StudentController extends AbstractActionController {
 protected $studentTable;
 
 public function indexAction() {
 
  return new ViewModel ( array (
    'students' => $this->getStudentTable ()->fetchAll() 
  ) );
 }
 
 public function addAction() {
  $form = new StudentForm ();
  $form->get ( 'submit' )->setValue ( 'Add' );
  $form->get ( 'submit' )->setAttribute ( 'class', 'btn btn-primary' );

  
  $request = $this->getRequest ();
  if ($request->isPost ()) {
   $student = new Student ();
   $form->setInputFilter ( $student->getInputFilter () );
   $form->setData ( $request->getPost () );
   if ($form->isValid ()) {
    $student->exchangeArray ( $form->getData () );
    $this->getStudentTable ()->addStudent ( $student );
    // Redirect to list of departments
    return $this->redirect ()->toRoute ( 'student' );
   }
  }
  return array (
    'form' => $form 
  );
 }
 
 public function editAction() {
  $stuCode = $this->params ()->fromRoute ( 'id', 0 );
  
  // Get the Album with the specified id. An exception is thrown
  // if it cannot be found, in which case go to the index page.
  try {
   $student = $this->getStudentTable ()->getStudent ( $stuCode );
  } catch ( \Exception $ex ) {
   return $this->redirect ()->toRoute ( 'student', array (
     'action' => 'index' 
   ) );
  }
  $form = new StudentForm ();
  $form->bind ( $student );
  $form->get ( 'submit' )->setAttribute ( 'value', 'Save' );
  $form->get ( 'submit' )->setAttribute ( 'class', 'btn btn-success' );
  $request = $this->getRequest ();
  if ($request->isPost ()) {
   $form->setInputFilter ( $student->getInputFilter () );
   $form->setData ( $request->getPost () );
   if ($form->isValid ()) {
    $this->getStudentTable ()->saveStudent ( $student );
    // Redirect to list of albums
    return $this->redirect ()->toRoute ( 'student' );
   }
  }
  return array (
    'id' => $stuCode,
    'form' => $form 
  );
 }
 
 public function deleteAction() {
  $stuCode = $this->params ()->fromRoute ( 'id', "N/A" );
  if ($stuCode=="N/A") {
   
   return $this->redirect ()->toRoute ( 'student' );
  }
  
  $request = $this->getRequest ();
  if ($request->isPost ()) {
   $del = $request->getPost ( 'del', 'No' );
   if ($del == 'Yes') {
    
    //$deptCode = $request->getPost ( 'id' );
   // $deptCode = $this->params ()->fromRoute ( 'id', "N/A" );
 
    $this->getStudentTable ()->deleteStudent ( $stuCode );
   }
   
   // Redirect to list of albums
   return $this->redirect ()->toRoute ( 'student' );
  }
  
  return array (
    'id' => $stuCode,
    'student' => $this->getStudentTable ()->getStudent ( $stuCode ) 
  );
 }
 
 public function getStudentTable() {
  if (! $this->studentTable) {
   $sm = $this->getServiceLocator ();
   $this->studentTable = $sm->get ( 'Student\Model\StudentTable' );
  }
  return $this->studentTable;
 }
 
}
?>