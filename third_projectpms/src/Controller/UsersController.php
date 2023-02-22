<?php

declare(strict_types=1);

namespace App\Controller;
use App\Form\ContactForm;
class UsersController extends AppController{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login']);
    }
  
    public function signUp(){
        $this->viewBuilder()->setLayout('home_layout');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
               // dd($this->request->getData());
               $user = $this->Users->patchEntity($user, $this->request->getData());
               $image = $this->request->getData('image');
               $fileName = $image->getClientFilename();
               $path = WWW_ROOT.'img/'.DS.$fileName;
               if($fileName){
               $image->moveTo($path);
               $user->image = $fileName;
               }
            //   dd($user);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('You have Registered Successfully.'));

                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error(__('Registration failed. Please, try again.'));
            }
            $this->set(compact('user'));
        
    }
   
      // function for user and admin login
      public function login()
      {
        $this->viewBuilder()->setLayout('home_layout');
          $this->request->allowMethod(['get', 'post']);
          $result = $this->Authentication->getResult();
          if ($result && $result->isValid()) {
              $this->Flash->success(__('You are logged in successfully.'));
              $redirect = $this->request->getQuery('redirect', [
                  'controller' => 'Admin',
                  'action' => 'dashboard',
              ]);
      
              return $this->redirect($redirect);
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
              return $this->redirect(['controller' => 'Users', 'action' => 'login']);
          }
          $this->Flash->error(__('The user could not be deleted. Please, try again.'));
      }


      public function form(){
        $contact = new ContactForm();
        if ($this->request->is('post')) {
            if ($contact->execute($this->request->getData())) {
                $this->Flash->success('We will get back to you soon.');
            } else {
                $this->Flash->error('There was a problem submitting your form.');
            }
        }
        $this->set('contact', $contact);
       }
}

?>