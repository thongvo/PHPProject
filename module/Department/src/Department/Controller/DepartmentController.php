<?php

namespace Department\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Department\Model\Department;
use Department\Form\DepartmentForm;

class DepartmentController extends AbstractActionController {
 protected $departmentTable;
 
 public function indexAction() {
 
  return new ViewModel ( array (
    'departments' => $this->getDepartmentTable ()->fetchAll() 
  ) );
 }
 
 public function addAction() {
  $form = new DepartmentForm ();
  $form->get ( 'submit' )->setValue ( 'Add' );
  $form->get ( 'submit' )->setAttribute ( 'class', 'btn btn-primary' );

  
  $request = $this->getRequest ();
  if ($request->isPost ()) {
   $department = new Department ();
   $form->setInputFilter ( $department->getInputFilter () );
   $form->setData ( $request->getPost () );
   if ($form->isValid ()) {
    $department->exchangeArray ( $form->getData () );
    $this->getDepartmentTable ()->addDepartment ( $department );
    // Redirect to list of departments
    return $this->redirect ()->toRoute ( 'department' );
   }
  }
  return array (
    'form' => $form 
  );
 }
 
 public function editAction() {
  $deptCode = $this->params ()->fromRoute ( 'id', 0 );
  
  // Get the Department with the specified id. An exception is thrown
  // if it cannot be found, in which case go to the index page.
  try {
   $department = $this->getDepartmentTable ()->getDepartment ( $deptCode );
  } catch ( \Exception $ex ) {
   return $this->redirect ()->toRoute ( 'department', array (
     'action' => 'index' 
   ) );
  }
  $form = new DepartmentForm ();
  $form->bind ( $department );
  $form->get ( 'submit' )->setAttribute ( 'value', 'Save' );
  $form->get ( 'submit' )->setAttribute ( 'class', 'btn btn-success' );
  $request = $this->getRequest ();
  if ($request->isPost ()) {
   $form->setInputFilter ( $department->getInputFilter () );
   $form->setData ( $request->getPost () );
   if ($form->isValid ()) {
    $this->getDepartmentTable ()->saveDepartment ( $department );
    // Redirect to list of departments
    return $this->redirect ()->toRoute ( 'department' );
   }
  }
  return array (
    'id' => $deptCode,
    'form' => $form 
  );
 }
 
 public function deleteAction() {
  $deptCode = $this->params ()->fromRoute ( 'id', "N/A" );
  if ($deptCode=="N/A") {
   
   return $this->redirect ()->toRoute ( 'department' );
  }
  
  $request = $this->getRequest ();
  if ($request->isPost ()) {
   $del = $request->getPost ( 'del', 'No' );
   if ($del == 'Yes') {
    
    //$deptCode = $request->getPost ( 'id' );
   // $deptCode = $this->params ()->fromRoute ( 'id', "N/A" );
 
    $this->getDepartmentTable ()->deleteDepartment ( $deptCode );
   }
   
   // Redirect to list of departments
   return $this->redirect ()->toRoute ( 'department' );
  }
  
  return array (
    'id' => $deptCode,
    'department' => $this->getDepartmentTable ()->getDepartment ( $deptCode ) 
  );
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