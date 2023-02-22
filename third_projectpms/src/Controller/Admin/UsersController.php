<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use App\Form\ContactForm;

class UsersController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login']);
        $this->loadModel('Users');
        $this->loadModel('UserProfile');
        $this->loadModel('ProductCategories');
        $this->loadModel('Products');
        $this->loadComponent('flash');
        $auth = $this->Authentication->getIdentity();
        $this->set(compact('auth'));
    }

    //====================functions for users management start=========================// 

    //fuhnction to show dashboard after login
    public function dashboard()
    {
    }

    // function to view admin profile
    public function profile($id = null)
    {
        $user = $this->Users->get($id, ['contain' => ['UserProfile']]);
        $this->set(compact('user'));
    }

    // function to view admin profile
    public function userProfile($id = null)
    {
        $user = $this->Users->get($id, ['contain' => ['UserProfile']]);
        $this->set(compact('user'));

        // $id = $this->request->getQuery('user_id');
        // // dd($id);
        // $user = $this->Users->get($id ,['contain' => ['UserProfile']]);
        // $this->set(compact('user'));
        // if($this->request->is('ajax')){
        //     $this->autoRender = false;
        //     // $this->viewBuilder()->setLayout('default');
        //     $this->render('/element/flash/user_view');

        // }
    }
    public function login()
    {
        $this->viewBuilder()->setLayout('home_layout');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $result = $this->Authentication->getIdentity();
            if($result->user_type == 1 && $result->status == 1){
                $this->Flash->success(__('You are logged in successfully.'));
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'dashboard',
                ]);
    
                return $this->redirect($redirect);

            }
           
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

     // function to logout user
     public function logout()
     {
         $result = $this->Authentication->getResult();
         if ($result && $result->isValid()) {
             $this->Authentication->logout();
             $this->Flash->success(__('You are logged out successfully.'));
             return $this->redirect(['controller' => 'users', 'action' => 'login']);
         }
         $this->Flash->error(__('The user could not be deleted. Please, try again.'));
     }
    //  public function userList($id = null)
    //  {   
    //      $id = $_GET['id'];
    //      $user = $this->Users->get($id);
    //      echo json_encode($user);
    //      exit;
    //  }
    //function to view all listed users
    public function userList($id=null)
    {
       
        // $users = $this->paginate($this->Users, ['contain' => ['UserProfile']]);
        // $this->set(compact('users'));
        // if($this->request->is('ajax')){
        //     $this->layout = false;
        //     $id = $this->request->getQuery('user_id');
        //     $user = $this->Users->get($id,['contain'=>['UserProfile']]);
        //     $this->set(compact('user'));
        //     $this->render('/element/flash/modal');            
        // }
        // $result = $this->Authentication->getIdentity();
        // $uid = $result->id;
        // $user = $this->Users->get($uid,['contain'=>['UserProfile']]);
        // $this->set(compact('user'));
          
        $status=$this->request->getQuery('status');
        if($status == null){
            $users=$this->Users->find('all')->contain(['UserProfile']);
        }else{
            $users=$this->Users->find('all')->contain(['UserProfile'])->where(['status'=>$status]);
        }
        
        $this->set(compact('users'));
        if($this->request->is('ajax')){
         
        //    $this->autoRender = false;
           
        //    $this->layout = false;
           $this->render('/element/flash/user_index');
        }

        
    }

    public function getView($id=null){
        // $this->autoRender = false;
        // if($this->request->is('ajax')){
        //     $this->layout = false;
        //     $id = $this->request->getQuery('user_id');
        //     dd($id);
        //     $user = $this->Users->get($id,['contain'=>['UserProfile']]);
        //     $this->set(compact('user'));
        //     $this->render('/element/flash/modal');            
        // }

        $id = $_GET['id'];
        $user = $this->Users->get($id,['contain'=>['UserProfile']]);
        echo json_encode($user);
        exit;
       
       
    }

    // function to delete users
    public function delete()
    {

        if($this->request->is('ajax')){
            $this->autoRender = false;
            $id = $this->request->getQuery('user_id');
            $delete_status = $this->request->getQuery('delete_status');
          
            $user = $this->Users->get($id);
            if($delete_status == 2){
                $user->delete_status = 3;     
            }else{     
                $user->delete_status = 2;
            }     
            if($this->Users->save($user)){

              echo json_encode(array(
                    "status" => 1,
                    "message" => "The student has been deleted."
                )); 
            }
        }
    }

     // function to change user status
     public function userStatus($id=null,$status){
        

        $this->request->allowMethod('post');
        $user = $this->Users->get($id);     
        if($status == 1){
            $user->status = 0;     
        }else{     
            $user->status = 1;
        }     
        if($this->Users->save($user)){
            $this->Flash->success(__('The user status has been changed.'));     
        }
        return $this->redirect(['action' => 'userList']);

   }

   public function form(){
    $contact = new ContactForm();
    if ($this->request->is('post')) {
        if ($contact->execute($this->request->getData())) {
            $this->Flash->success('We will get back to you soon.');
            $this->redirect(['action'=>'dashboard']);
        } else {
            $this->Flash->error('There was a problem submitting your form.');
        }
    }
    $this->set('contact', $contact);
   }
    //====================functions for users management end=========================// 




}

