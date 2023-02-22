<?php

namespace App\Controller;

use App\Controller\AppController;

class StudentsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
       
        $this->loadModel("Students");
        // Created app.php file inside /templates/layout/app.php
        $this->viewBuilder()->setLayout("app");
    }

    public function addStudent()
    {
        $this->set("title", "Add Stduent");
        if ($this->request->is('ajax')) {
            
            $student = $this->Students->newEmptyEntity();

            $student = $this->Students->patchEntity($student, $this->request->getData());
            if ($this->Students->save($student)) {

                $this->Flash->success(__('Student has been created'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "Student has been created"
                )); 

                exit;
            }

            $this->Flash->error(__('Failed to save student data'));

            echo json_encode(array(
                "status" => 0,
                "message" => "Failed to create"
            )); 

            exit;
        }
    }

    public function listStudents()
    {
        $students = $this->Students->find()->toList();
        $this->set("title", "List Student");
        $this->set(compact("students"));
    }

    public function editStudents($id = null)
    {
        if ($this->request->is('ajax')) {
            $student = $this->Students->get($this->request->getData('student_id'));
            $student = $this->Students->patchEntity($student, $this->request->getData());

            if ($this->Students->save($student)) {

                $this->Flash->success(__('Student has been updated'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "Student has been updated"
                )); 

                exit;
            }

            $this->Flash->error(__('Failed to update student data'));

            echo json_encode(array(
                "status" => 0,
                "message" => "Failed to update student data"
            )); 

            exit;
        }
        else{
            $student = $this->Students->get($id, [
                'contain' => [],
            ]);
            $this->set(compact('student'));
            $this->set("title", "Edit Student");
        }
    }

    public function deleteStudent()
    {
        if ($this->request->is('ajax')) {

            $student = $this->Students->get($this->request->getData("student_id"));

            if ($this->Students->delete($student)) {

                $this->Flash->success(__('The student has been deleted.'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "deleted"
                )); 
    
                exit;

            } else {
                $this->Flash->error(__('The student could not be deleted. Please, try again.'));

                echo json_encode(array(
                    "status" => 0,
                    "message" => "The student could not be deleted. Please, try again."
                )); 
    
                exit;
            }   
        }
    }
}
?>
