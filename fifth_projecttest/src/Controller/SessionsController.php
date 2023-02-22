<?php
namespace App\Controller;
use App\Controller\AppController;
   class SessionsController extends AppController {
   public function retrieveSessionData() {
      //create session object
      $session = $this->request->getSession();
      //read data from session
      $name = $session->read('name');
      $this->set('name',$name);
      $email = $session->read('email');
      $this->set('email',$email);
   }
   public function writeSessionData(){
      //create session object
      $session = $this->request->getSession();
      //write data in session
      $session->write('name','Chandresh Yadav');
      $session->write('email','chandresh@123yopmail.com');
   }
   public function checkSessionData(){
      //create session object
      $session = $this->request->getSession();
      //check session data
      $name = $session->check('name');
      $address = $session->check('address');
      $this->set('name',$name);
      $this->set('address',$address);
   }
   public function deleteSessionData(){
      //create session object
      $session = $this->request->getSession();
      //delete session data
      $session->delete('name');
   }
   public function destroySessionData(){
      //create session object
      $session = $this->request->getSession();
      //destroy session
      $session->destroy();
   }
   public function index(){
      
   }


}
?>