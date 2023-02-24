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
        $this->Model = $this->loadModel('Cart');
        $this->Model = $this->loadModel('LikeDislike');
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
            $username = $this->Users->get($uid, [
                'contain' => ['UserProfile'],
            ]);
        // dd($user->email);
            $product = $this->Products->get($id, [
                'contain' => ['ProductComment','ProductCategories','LikeDislike'],
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

    // function to list cart details
    public function cart(){

        $this->viewBuilder()->setLayout('my_layout');
        $user = $this->Authentication->getIdentity();
        $id = $user->id;
        $this->set(compact('user'));
        // $details = $this->Cart->get($id);
        $details = $this->Cart->find('all')->contain(['Users','Products'])->where(['user_id'=>$id])->all();
        //dd($details);
        $dearray = array();
        foreach($details as $detail){
            $dearray[] =+ $detail->items;
        }
       
        // $product = $this->Cart->find('all');
        
        $this->set(compact('details','user','dearray'));
    }

    // function to add product in cart
    public function cartDetails($id=null){
        $user = $this->Authentication->getIdentity();
        if($user){
           $carts = $this->paginate($this->Cart);
           foreach($carts as $cart){
            if($cart->user_id == $user->id && $cart->product_id == $id){
               $this->Flash->error(__('The product have already save in your cart'));
               return $this->redirect(['controller'=>'users','action'=>'view-product',$id]);
            }
           }

           $cart = $this->Cart->newEmptyEntity();
           $cart->user_id = $user->id;
           $cart->product_id = $id;
           if($this->Cart->save($cart)){
              $this->Flash->success(__('Product has been saved in your cart'));
              return $this->redirect(['controller'=>'users','action'=>'cart']);
           }
        }
    }

    // function to like a product
    public function like($id=null){

        $user = $this->Authentication->getIdentity();
       if($user){
            $like = $this->LikeDislike->find('all')->where(['user_id'=>$user->id,'product_id'=>$id])->all();
            $likearray = array();
            foreach($like as $like){
                $likearray[]  += $like->items;
            }

            if(!empty($likearray)){
                $promote = $this->LikeDislike->find('all')->where(['user_id'=>$user->id,'product_id'=>$id])->first();
                if($promote->promote == 1){
                    $promote = $this->LikeDislike->patchEntity($promote,$this->request->getData());
                    $promote->promote = 0;
                    $promote->demote = 0;

                    if($this->LikeDislike->save($promote)){
                        $this->Flash->success(__('Liked'));
                        return $this->redirect(['controller'=>'users','action'=>'view-product',$id]);

                    }else{
                        $this->Flash->error(__('not liked'));

                    }

                    
                }else{
                    $promote = $this->LikeDislike->patchEntity($promote,$this->request->getData());
                    $promote->promote = 1;
                    $promote->demote = 0;
                    
                    if($this->LikeDislike->save($promote)){
                        $this->Flash->success(__('Liked'));
                        return $this->redirect(['controller'=>'users','action'=>'view-product',$id]);

                    }else{
                        $this->Flash->error(__('not liked'));

                    }
                }
            }

            $reaction = $this->LikeDislike->newEmptyEntity();
            $reaction->user_id = $user->id;
            $reaction->product_id = $id;
            $reaction->promote = 1;
            if($this->LikeDislike->save($reaction)){
                $this->Flash->success(__('Liked'));
                return $this->redirect(['controller'=>'users','action'=>'view-product',$id]);
            }else{
                $this->Flash->error(__('not liked'));
            }
       }else{

           $this->Flash->error(__('try again'));
           return $this->redirect(['controller'=>'users','action'=>'view-product',$id]);
       }
    }

    // function to dislike
    public function dislike($id=null){
        $user = $this->Authentication->getIdentity();
       if($user){
            $like = $this->LikeDislike->find('all')->where(['user_id'=>$user->id,'product_id'=>$id])->all();
            $likearray = array();
            foreach($like as $like){
                $likearray[]  += $like->items;
            }

            if(!empty($likearray)){
                $promote = $this->LikeDislike->find('all')->where(['user_id'=>$user->id,'product_id'=>$id])->first();
                if($promote->demote == 1){
                    $promote = $this->LikeDislike->patchEntity($promote,$this->request->getData());
                    $promote->promote = 0;
                    $promote->demote = 0;

                    if($this->LikeDislike->save($promote)){
                        $this->Flash->success(__('Liked'));
                        return $this->redirect(['controller'=>'users','action'=>'view-product',$id]);

                    }else{
                        $this->Flash->error(__('not liked'));

                    }

                    
                }else{
                    $promote = $this->LikeDislike->patchEntity($promote,$this->request->getData());
                    $promote->promote = 0;
                    $promote->demote = 1;
                    
                    if($this->LikeDislike->save($promote)){
                        $this->Flash->success(__('Liked'));
                        return $this->redirect(['controller'=>'users','action'=>'view-product',$id]);

                    }else{
                        $this->Flash->error(__('not liked'));

                    }
                }
            }

            $reaction = $this->LikeDislike->newEmptyEntity();
            $reaction->user_id = $user->id;
            $reaction->product_id = $id;
            $reaction->demote = 1;
            if($this->LikeDislike->save($reaction)){
                $this->Flash->success(__('Liked'));
                return $this->redirect(['controller'=>'users','action'=>'view-product',$id]);
            }else{
                $this->Flash->error(__('not liked'));
            }
       }else{

           $this->Flash->error(__('try again'));
           return $this->redirect(['controller'=>'users','action'=>'view-product',$id]);
       }
    }

    // function to increase product quantity
    public function increase($id=null){
        if($this->request->is('ajax')){
            $this->autoRender = false;
            $id = $_GET['id'];
            $cart = $this->Cart->get($id);
            $cart->quantity = $cart->quantity + 1;

            if($this->Cart->save($cart)){
                // $this->Flash->success(__('increases'));
                //return $this->redirect(['controller'=>'users','action'=>'cart']);
                echo "increased";
            }else{
                // $this->Flash->error(__('Not increase'));
                echo "decreased";
            }
        }
    }

    // function to decrease product quantity
    public function decrease($id=null){

        if($this->request->is('ajax')){
            $this->autoRender = false;
            $id = $_GET['id'];
            $cart = $this->Cart->get($id);
            // dd($cart->quantity);
        
            if($cart->quantity == 1){
                // $this->Flash->error(__('at least one quantity should be present'));
                // return $this->redirect(['controller'=>'users','action'=>'cart']);
                echo "require";
            }
            $cart->quantity = $cart->quantity - 1;

            if($this->Cart->save($cart)){
                // $this->Flash->success(__('decreased'));
                echo "decreased";
                // die;
            // return $this->redirect(['controller'=>'users','action'=>'cart']);
            }else{
                // $this->Flash->error(__('Not decreased'));
                echo "notdecreases";
            }
        }
    }

    public function deleteCart(){
        $this->autoRender = false;
        $id = $_GET['id'];
        $cart = $this->Cart->get($id);
        if($this->Cart->delete($cart)){
            echo "deleted"; 
        }else{
            echo "failed";
        }
    }



}