<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Profile'],
        ]);

        $this->set(compact('customer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {


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

        // $customer = $this->Customers->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     // dd($this->request->getData());
        //     $customer = $this->Customers->patchEntity($customer, $this->request->getData());


        //     $image = $this->request->getData('image_file');
        //     $name = $image->getClientFilename();
        //     $path = WWW_ROOT.'img'.DS.$name;
        //     if($name)
        //         $image->moveTo($path);
        //         $customer ->image=$name;

            
            
        //     if ($this->Customers->save($customer,
        //     [
        //         'associated' => ['Profile','Skills','Subskills'],
                
        //     ])) {
        //         $this->Flash->success(__('The customer has been saved.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        // }
        // $this->set(compact('customer'));
    }
    // public function ajaxAddStudent(){
    //     $customer = $this->Customers->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         die('1hjdjhdgdfjd');
            
    //         $name = $this->request->getData('name');
    //         $email = $this->request->getData('email');
    //         $password = $this->request->getData('password');

    //         $customer = $this->Students->patchEntity($customer, $this->request->getData());
    //         if ($this->Students->save($customer)) {
                
    //             $this->Flash->success(__('Student has been created'));   
    //         }
    //         $this->Flash->error(__('Failed to save student data'));
    //     }
    // }





    // public function add()
    // {
       
    //     $user = $this->Customers->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $data = $this->request->getData();
    //         $user = $this->Customers->patchEntity($user, $data);
            
            
    //          $userImage = $this->request->getData("image_file");
 
    //          debug($userImage);
    //          exit;
    //          $fileName = $userImage->getClientFilename();
    //          $data["image"] = $fileName;

    //         if ($this->Customers->save($user, [
    //             'associated' => ['Profile','Skills','Subskills'],
                
    //         ])) {
    //             $hasFileError = $userImage->getError();
    //             if ($hasFileError > 0) {
    //                 // no file uploaded
    //                 $data["image"] = "";
    //             } else {
    //                 // file uploaded
    //                 $fileType = $userImage->getClientMediaType();
    
    //                 if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
    //                     $imagePath = WWW_ROOT . "img/" . $fileName;
    //                     $userImage->moveTo($imagePath);
    //                     $data["image"] = $fileName;
    //                 }
    //             }
    //             $this->Flash->success(__('The user has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('user'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $this->set(compact('customer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
