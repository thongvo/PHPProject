<?php

namespace Subject\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Subject\Model\Subject;
use Subject\Form\SubjectForm;
use Department\Model\Department;

class SubjectController extends AbstractActionController {
 protected $subjectTable;
 protected $departmentTable;
 
 public function indexAction() {
  
  $subjects = $this->getSubjectTable ()->fetchAll();
//   $departments = array();
//   foreach ($subjects as $subject) {
//    $department = $this->getDepartmentTable()->getDepartment($subject->deptCode);
//    array_push($departments, $department);
//   }
  return new ViewModel ( array (
    'subjects' => $subjects,
    'department_sv' => $this->getDepartmentTable()
  ) );
 }
 
 public function addAction() {
  $form = new SubjectForm ();
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
   $subject = new Subject ();
   $form->setInputFilter ( $subject->getInputFilter () );
   $form->setData ( $request->getPost () );
   
   
   if ($form->isValid ()) {
    $subject->exchangeArray ( $form->getData () );
    $this->getSubjectTable ()->addSubject ( $subject );
    // Redirect to list of instructors
    return $this->redirect ()->toRoute ( 'subject' );
   }
  }
  return array (
    'form' => $form 
  );
 }
 
 public function editAction() {
  $subCode = $this->params ()->fromRoute ( 'id', 0 );
  
  // Get the Subject with the specified id. An exception is thrown
  // if it cannot be found, in which case go to the index page.
  try {
   $subject = $this->getSubjectTable ()->getSubject ( $subCode );
  } catch ( \Exception $ex ) {
   return $this->redirect ()->toRoute ( 'subject', array (
     'action' => 'index' 
   ) );
  }
  $form = new SubjectForm ();
  $form->bind ( $subject );
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
   $form->setInputFilter ( $subject->getInputFilter () );
   $form->setData ( $request->getPost () );
   if ($form->isValid ()) {
    $this->getSubjectTable ()->saveSubject ( $subject );
    // Redirect to list of instructors
    return $this->redirect ()->toRoute ( 'subject' );
   }
  }
  return array (
    'id' => $subCode,
    'form' => $form 
  );
 }
 
 public function deleteAction() {
  $subCode = $this->params ()->fromRoute ( 'id', "N/A" );
  if ($subCode=="N/A") {
   
   return $this->redirect ()->toRoute ( 'subject' );
  }
  
  $request = $this->getRequest ();
  if ($request->isPost ()) {
   $del = $request->getPost ( 'del', 'No' );
   if ($del == 'Yes') {
    
    //$deptCode = $request->getPost ( 'id' );
   // $deptCode = $this->params ()->fromRoute ( 'id', "N/A" );
 
    $this->getSubjectTable ()->deleteSubject ( $subCode );
   }
   
   // Redirect to list of instructors
   return $this->redirect ()->toRoute ( 'subject' );
  }
  
  return array (
    'id' => $subCode,
    'subject' => $this->getSubjectTable ()->getSubject ( $subCode ) 
  );
 }
 
 public function getSubjectTable() {
  if (! $this->subjectTable) {
   $sm = $this->getServiceLocator ();
   $this->subjectTable = $sm->get ( 'Subject\Model\SubjectTable' );
  }
  return $this->subjectTable;
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