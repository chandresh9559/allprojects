<?php
declare(strict_types=1);

namespace App\Controller;


class AdminController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        
        $this->Model = $this->loadModel('Users');
        $this->Model = $this->loadModel('UserProfile');
        $this->Model = $this->loadModel('ProductCategories');
        $this->Model = $this->loadModel('Products');
        $this->Model = $this->loadModel('ProductComment');
        $this->viewBuilder()->setLayout('admin_layout');
        
    }

    // function for admin index page
    public function dashboard($id=null)
    {
        $productCategories = $this->paginate($this->ProductCategories);
        $this->set(compact('productCategories'));

        $this->request->allowMethod(['get', 'post']);
        $user = $this->Authentication->getIdentity();
        if ($user->user_type == 0) {
            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Users', 'action' => 'products', $user->id]);
        } else {
            $this->set(compact('user'));
        }
        
    }

     // function for edit user profile
     public function updateProfile($id = null)
     {
        // $productCategories = $this->paginate($this->ProductCategories);
        // $this->set(compact('productCategories'));
        $user = $this->Authentication->getIdentity();
        if ($user->user_type == 0) {
            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Users', 'action' => 'products', $user->id]);
        } else {
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
                 $this->Flash->success(__('Profile has been updated.'));
 
                 return $this->redirect(['action' => 'viewProfile',$user->id]);
             }
             $this->Flash->error(__('Profile could not be saved. Please, try again.'));
         }
         $this->set(compact('user'));
        }
 
     }

    //================User Area That will be managed by admin=====================//

    // function for list all user at the admin panel
    public function userList()
    {
        $productCategories = $this->paginate($this->ProductCategories);
        $this->set(compact('productCategories'));
     
        // $user = $this->Authentication->getIdentity();
        // $this->set(compact('user'));
        // $users = $this->paginate($this->Users,['contain'=>['UserProfile']]);

        
        $user = $this->Authentication->getIdentity();
        $this->set(compact('user'));
        if ($user->user_type == 0) {
            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Users', 'action' => 'products']);
        } else {
            $users = $this->paginate($this->Users, ['contain' => ['UserProfile']]);

            $this->set(compact('users'));
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

    // function for view admin profile
    public function viewProfile($id = null)
    {
        $user = $this->Authentication->getIdentity();
        // $this->set(compact('user'));
        if ($user->user_type == 0) {
            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Users', 'action' => 'products']);
        }else{
            $productCategories = $this->paginate($this->ProductCategories);
            $this->set(compact('productCategories'));
            $user = $this->Users->get($id, [
                'contain' => ['UserProfile'],
            ]);

            $this->set(compact('user'));
        }
        
    }


    // function for delete users 
    public function deleteUser($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'userList']);
    }


    //=====================Product Area That will be managed by admin==========================//

    // function for add product
    public function addProduct()
    {
        // $productCategories = $this->paginate($this->ProductCategories);
        // $this->set(compact('productCategories'));

        $user = $this->Authentication->getIdentity();
        // $this->set(compact('user'));
        if ($user->user_type == 0) {
            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Users', 'action' => 'products']);
        } else {
            $productCategories = $this->paginate($this->ProductCategories);

            $product = $this->Products->newEmptyEntity();
            if ($this->request->is('post')) {
                // dd($this->request->getData());
                $product = $this->Products->patchEntity($product, $this->request->getData());

                $image = $this->request->getData('product_image');
                $fileName = $image->getClientFilename();

                $targetPath = WWW_ROOT . 'img/' . DS . $fileName;
                if ($fileName) {
                    $image->moveTo($targetPath);
                    $product->product_image = $fileName;
                }
                if ($this->Products->save($product)) {
                    $this->Flash->success(__('The product has been saved.'));

                    return $this->redirect(['action' => 'allProducts']);
                }
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
            $this->set(compact('user', 'productCategories', 'product'));
        }
    }

    // function to edit product
    public function editProduct($id = null)
    {
        // $productCategories = $this->paginate($this->ProductCategories);
        // $this->set(compact('productCategories'));
        $user = $this->Authentication->getIdentity();
        $this->set(compact('user'));
        if($user->user_type == 1){
            $product = $this->Products->get($id, [
                'contain' => ['ProductCategories'],
            ]);

            $category = $product->product_category->category_name;
            // dd($category);
            $productCategories = $this->paginate($this->ProductCategories);

            // dd($productCategories);
            // $brands = $this->Products->ProductCategories->find('list',['limit'=>200])->all();
        
            $newFile = $product['product_image'];
            // $category = $product['product_category'];
            if ($this->request->is(['patch', 'post', 'put'])) {
                $data = $this->request->getData();
                $userImage = $this->request->getData("product_image");
                $fileName = $userImage->getClientFilename();
                if ($fileName == '') {
                    $fileName = $newFile;
                }

                $data["product_image"] = $fileName;
                $data["category_name"] = $category;
                $product = $this->Products->patchEntity($product, $data);
                if ($this->Products->save($product)) {
                    $hasFileError = $userImage->getError();
                    if ($hasFileError > 0) {
                        $data["product_image"] = "";
                    } else {
                        $fileType = $userImage->getClientMediaType();

                        if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg" || $fileType == "image/webp") {
                            $imagePath = WWW_ROOT . "img/" . $fileName;
                            $userImage->moveTo($imagePath);
                            $data["product_image"] = $fileName;
                        }
                    }
                    $this->Flash->success(__('The product has been updated.'));

                    return $this->redirect(['action' => 'allProducts']);
                }
                $this->Flash->error(__('The product could not be updated. Please, try again.'));
            }
            $this->set(compact('product','productCategories'));
        }else{
            return $this->redirect(['controller'=>'Users','action' => 'login']); 
        }
    }   

    // function for list all products at the admin panel
    public function allProducts()
    {
        $productCategories = $this->paginate($this->ProductCategories);
        $this->set(compact('productCategories'));
        // $user = $this->Authentication->getIdentity();
        // $this->set(compact('user'));
        // if ($user->user_type == 1) {
        //     $products = $this->paginate($this->Products,['contain' => ['ProductCategories']]);
        //     // dd($products);

        //     $this->set(compact('products'));
        // }else {
        //     return $this->redirect(['controller'=>'Users','action' => 'login']);
        // }

        $user = $this->Authentication->getIdentity();
        $this->set(compact('user'));
        if ($user->user_type == 0) {
            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Users', 'action' => 'products']);
        } else {
            $products = $this->paginate($this->Products, ['contain' => ['ProductCategories']]);
            $this->set(compact('products'));
        }
    }

    // function for view product and add comment on product
    public function viewProduct($id=null,$email=null)
    {
        
        $user = $this->Authentication->getIdentity();
        if($user->user_type == 0){

            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Users', 'action' => 'products']);
        }else{

            $uid=$user->id;
            $username = $this->Users->get($uid, [
                'contain' => ['UserProfile'],
            ]);
            $product = $this->Products->get($id, [
                'contain' => ['ProductComment','ProductCategories'],
            ]);

            $comment = $this->ProductComment->newEmptyEntity();
            if ($this->request->is(['patch', 'post', 'put'])) {
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
        }
    }

    // function for delete product
    public function deleteProduct($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Products->get($id);
        if ($this->Products->delete($user)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'allProducts']);
    }
    
    // function for delete comments 
    public function deleteComment($id = null,$pid=null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->ProductComment->get($id);
        if ($this->ProductComment->delete($user)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'viewProduct',$pid]);
    }
    

    // function to change product status
    public function productStatus($id=null,$status){

        $this->request->allowMethod('post');
        $user = $this->Products->get($id);

        if($status == 1){
            $user->status = 0;

        }else{

            $user->status = 1;
        }

        if($this->Products->save($user)){
            $this->Flash->success(__('The product status has been changed.'));

        }
        return $this->redirect(['action' => 'allProducts']);

    }


    //=====================Product Category Area That will be managed by admin=============================//

    // function for add category
    public function addCategory()
    {
        $productCategories = $this->paginate($this->ProductCategories);
        $this->set(compact('productCategories'));
        $user = $this->Authentication->getIdentity();
        if($user->user_type == 0){
            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Users', 'action' => 'products']);

        }else{
            $productCategory = $this->ProductCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
            if ($this->ProductCategories->save($productCategory)) {
                $this->Flash->success(__('The product category has been saved.'));

                return $this->redirect(['action' => 'allCategories']);
            }
            $this->Flash->error(__('The product category could not be saved. Please, try again.'));
        }
        $this->set(compact('user','productCategory'));
        }
        
    }

    // function to change product status
    public function categoryStatus($id=null,$status){

        $this->request->allowMethod('post');
        $user = $this->ProductCategories->get($id);

        if($status == 1){
            $user->status = 0;

        }else{

            $user->status = 1;
        }

        if($this->ProductCategories->save($user)){
            $this->Flash->success(__('The category status has been changed.'));

        }
        return $this->redirect(['action' => 'allCategories']);

    }
   
    // function to show all category
    public function allCategories()
    {
        $productCategories = $this->paginate($this->ProductCategories);
        $this->set(compact('productCategories'));
        $user = $this->Authentication->getIdentity();
        if($user->user_type==0){

            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Users', 'action' => 'products']);

        }else{
            $productCategories = $this->paginate($this->ProductCategories);

            $this->set(compact('user','productCategories'));
        }
        
    }

    // function to edit category
    public function editCategory($id = null)
    {
       
        $user = $this->Authentication->getIdentity();
        if($user->user_type == 0){

            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Users', 'action' => 'products']);
        }else{
            $productCategory = $this->ProductCategories->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
                if ($this->ProductCategories->save($productCategory)) {
                    $this->Flash->success(__('The product category has been updated.'));
    
                    return $this->redirect(['action' => 'allCategories']);
                }
                $this->Flash->error(__('The product category could not be saved. Please, try again.'));
            }
            $this->set(compact('user','productCategory'));
        }
        
    }

    // view category
    public function viewCategory($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if($user->user_type == 0){

            $this->Flash->error(__('You are not authorized to access that page'));
            return $this->redirect(['controller' => 'Users', 'action' => 'products']);
        }else{
        $productCategories = $this->paginate($this->ProductCategories);
        $this->set(compact('productCategories'));
        $this->request->allowMethod(['get', 'post']);
        $productCategory = $this->ProductCategories->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user','productCategory'));
     }
    }

    // function for delete category 
    public function deleteCategory($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->ProductCategories->get($id);
        if ($this->ProductCategories->delete($user)) {
            $this->Flash->success(__('The product category has been deleted.'));
        } else {
            $this->Flash->error(__('The product category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'allCategories']);
    }
}
