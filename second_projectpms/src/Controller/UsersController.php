<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login']);
        $this->Model = $this->loadModel('UserProfile');
        $this->Model = $this->loadModel('Products');
        $this->Model = $this->loadModel('ProductComment');
        $this->Model = $this->loadModel('ProductCategories');
        $this->Model = $this->loadModel('Users');
    }
    

    // function for main website page
    public function index()
    {
        $this->viewBuilder()->setLayout('user_layout');
    }
    public function product()
    {
        
    }
    public function about()
    {
        
    }
    public function blogList()
    {
        
    }
    public function contact()
    {
        
    }
    public function testimonial()
    {
        
    }


    // function for view user profile
    public function view($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->user_type == 1) {
            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Admin', 'action' => 'dashboard']);
        }else{
            $this->viewBuilder()->setLayout('my_layout');
            $user = $this->Users->get($id, [
                'contain' => ['UserProfile'],
            ]);

            $this->set(compact('user'));
        }
    }

    public function emailCheck(){
        $this->layout = false;
        $this->autoRender = false;
        $email = $this->request->getQuery('email');
        $user = $this->Users->find('all')->where(['email'=>$email])->first();
        // dd($user);
        if($user){
            if($this->request->is('ajax')){
                // start code will work in case of json return from here
                echo json_encode(array(
                    'status'=>1,
                    'message'=>'Email allready exist',
                ));
               die;
            }else{
                echo json_encode(array(
                    'status'=>0,
                    'message'=>'Email allready not exist',
                ));
               die;

            }

    }

        
}
    // function for new registration
    public function registration()
    {
       

        $result = $this->Authentication->getIdentity();
        if ($result == null) {

            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $image = $this->request->getData('image');
                $fileName = $image->getClientFilename();
                $targetPath = WWW_ROOT . 'img/' . DS . $fileName;
                if ($fileName) {
                    $image->moveTo($targetPath);
                    $user->image = $fileName;
                }
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('You have Registered Successfully.'));

                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error(__('Registration failed. Please, try again.'));
            }
            $this->set(compact('user'));
        } else {
            $this->Flash->error(__('You have already registerd'));
            return $this->redirect(['action' => 'products']);
        }

        // $user = $this->Users->newEmptyEntity();
        // if ($this->request->is('ajax')) {
           

        //         $user = $this->Users->patchEntity($user, $this->request->getData());
            
                // $image = $this->request->getData('image');
                // $fileName = $image->getClientFilename();
                // $path = WWW_ROOT.'img/'.$fileName;
    
                // if($fileName){
                //     $image->moveTo($path);
                //     $user->image = $fileName;
                // }
        //         if ($this->Users->save($user)) {
    
        //             echo json_encode(array(
        //                 "status" => 1,
        //                 "message" => "user has been created"
        //             )); 
    
        //             exit;
        //         }
        //         echo json_encode(array(
        //             "status" => 0,
        //             "message" => "failed"
        //         )); 

        //         exit;

           
        // }
    }

    // function for edit user profile
    public function updateProfile($id = null)
    {
        $this->viewBuilder()->setLayout('my_layout');
        $user = $this->Authentication->getIdentity();
        if ($user->user_type == 1) {
            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Admin', 'action' => 'dashboard']);
        }else{
        $user = $this->Users->get($id, [
            'contain' => ['UserProfile'],
        ]);

        $newFile = $user['image'];

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $userImage = $this->request->getData("image");
            $fileName = $userImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $newFile;
            }

            $data["image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $hasFileError = $userImage->getError();
                if ($hasFileError > 0) {
                    $data["image"] = "";
                } else {
                    $fileType = $userImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg" || $fileType == "image/webp") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $userImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }
                $this->Flash->success(__('The user has been updated.'));

                return $this->redirect(['action' => 'view', $user->id]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    }
    
    // function for delete user profile
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // function for user and admin login
    public function login()
    {
        
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $result = $this->Authentication->getIdentity();
            if($result->user_type ==1 && $result->status == 1){
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Admin',
                'action' => 'dashboard',
            ]);
    
            return $this->redirect($redirect);
          }
            if($result->user_type ==0 && $result->status == 1){
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'products',
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
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    }

    // function to logout user and redirect on user index
    public function logout1()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            $this->Flash->success(__('You are logged out successfully.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }
        $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    }


    //====================Product Area That will be played by user=======================//
    
    // function for list all products at the admin panel
    public function products()
    {
        $this->viewBuilder()->setLayout('my_layout');
        $user = $this->Authentication->getIdentity();
        $this->set(compact('user'));

        // without ajax

        // if ($user->user_type == 1) {
        //     $this->Flash->error(__('You are not authorize to access that page'));
        //     return $this->redirect(['controller' => 'Admin', 'action' => 'dashboard']);
        // } else {
        //     $key = $this->request->getQuery('key');
        //     if ($key) {
        //         $query = $this->Products->find('all')->where(['product_title like' => '%' . $key . '%']);
        //         $products = $this->paginate($query,['limit'=> '3']);
        //         $this->set(compact('products'));
                
        //     } else {
        //         $query = $this->Products;
        //         $products = $this->paginate($query,['limit'=> '3']);
        //         $this->set(compact('products'));
        //     }
        // }
        
        // with ajax

        $productCategories = $this->paginate($this->ProductCategories);
        $this->set(compact('productCategories'));
        $id = $this->request->getQuery('category_id');
        if($id == null){

            $products = $this->Products->find('all');
            
        }else{
            $products = $this->Products->find('all')->where(['category_id'=>$id]);

        }
        $this->set(compact('products'));
        if($this->request->is('ajax')){

            $this->render('/element/flash/product_list');
        }

    }

    // function for view product and add comment on product
    public function viewProduct($id=null,$uid=null)
    {
        
        $this->viewBuilder()->setLayout('edit_layout');
        $user = $this->Authentication->getIdentity();
        if ($user->user_type == 1) {
            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Admin', 'action' => 'dashboard']);
        }else{
        $user = $this->Authentication->getIdentity();
        $uid=$user->id;
        if($user->user_type == 0){
            // $result = $this->ProductComment->find('all')->where(['id'=>$id,'user_id'=>$uid])->first();
            // dd($result);
            $username = $this->Users->get($uid, [
                'contain' => ['UserProfile'],
            ]);
        // dd($user->email);
            $product = $this->Products->get($id, [
                'contain' => ['ProductComment','ProductCategories'],
            ]);
            
            $comment = $this->ProductComment->newEmptyEntity();
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Authentication->getIdentity();
                $data = $this->request->getData();
                $comment['product_id'] = $id;
                $comment['user_id'] = $user->id;
                $comment['name'] = $username->user_profile->first_name;
                $comment = $this->ProductComment->patchEntity($comment, $data);
                if ($this->ProductComment->save($comment)) {
                    $this->Flash->success(__('The comment has been saved.'));
                    return $this->redirect(['action' => 'viewProduct', $id]);
                }
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            }

            $this->set(compact('user','product', 'comment'));
        }else{
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    
        }
    }
        
    }

    //============================================//

    // function to send email for reset password
    public function cart(){

        $this->viewBuilder()->setLayout('my_layout');
        $user = $this->Authentication->getIdentity();
        $this->set(compact('user'));
    }

}