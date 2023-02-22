<?php

namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\EventInterface;

   class TestController extends AppController
  {
    public $connection;
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->connection = ConnectionManager::get('assignment5'); 
        $auth = $this->Authentication->getIdentity();
        $this->set(compact('auth'));
    }
    public function create()
  {
    $data= $this->connection->insert("Connections",[
        "name" => "sumit",
        "email" => "sumit@gmail.com",
        "phone" => "1234567890"
    ]); 
    $this->connection->insert("Connections" ,[
        "name" => "Angle",
        "email" => "Angle12345@gmail.com",
        "phone" => "123489085"
    ]);

    if($this->request->is("post")){
        $data = $this->request->getData();
        print_r($data);
    }
   $this->Flash->set('You have successfully registered',[ 'element' => 'success']);
  } 
} 
?> 