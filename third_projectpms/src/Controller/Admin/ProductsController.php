<?php

declare (strict_types = 1);

namespace App\Controller\Admin;

class ProductsController extends AppController
{
    // this function used to load all models and those things that will be used before hit the actions
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->loadModel('ProductCategories');
        $this->loadModel('Users');
        $this->loadModel('ProductComment');
        $this->loadModel('Products');
        $this->loadComponent('flash');
        $auth = $this->Authentication->getIdentity();
        $this->set(compact('auth'));
    }

    // function to list all existing products
    public function productList()
    {
        $category=$this->paginate($this->ProductCategories);
        $this->set(compact('category'));
        // $products = $this->paginate($this->Products);
        // dd($products);

        // $this->set(compact('products'));

        $status = $this->request->getQuery('status2');
        if ($status == null) {
            $products = $this->Products->find('all');
        } else {
            $products = $this->Products->find('all')->where(['status' => $status]);
        }

        $this->set(compact('products'));
        if ($this->request->is('ajax')) {

            $this->render('/element/flash/product_index');
        }
    }

    // function to view product details
    public function viewProduct($id = null)
    {
        // $product = $this->Products->get($id, [
            //     'contain' => ['ProductCategories', 'ProductComment', 'Users'],
        // ]);
        // // dd($products);
        // $this->set(compact('product'));
        
        // $comment = $this->ProductComment->newEmptyEntity();
        // if ($this->request->is(['patch', 'post', 'put'])) {
            //     $data = $this->request->getData();
            //     $comment['product_id'] = $id;
            //     $comment['user_id'] = $user->id;
            //     $comment['name'] = $username->user_profile->first_name;
            //     $comment = $this->ProductComment->patchEntity($comment, $data);
            //     if ($this->ProductComment->save($comment)) {
                //         $this->Flash->success(__('The comment has been saved.'));
                //         return $this->redirect(['action' => 'viewProduct', $id]);
                //     }
                //     $this->Flash->error(__('The comment could not be saved. Please, try again.'));
                // }
                $auth = $this->Authentication->getIdentity();
                $uid=$auth->id;
            if ($this->request->is('ajax')) {
            // die('sdsssssssssss');
            $product_id = $this->request->getData('product_id');
            $user_id = $this->request->getData('user_id');
            $rate_value = $this->request->getData('rate_value');
            $user_name = $this->request->getData('user_name');
           
            $comments = $this->ProductComment->newEmptyEntity();
            $comment = $this->ProductComment->patchEntity($comments, $this->request->getData());
            $comment['product_id'] = $product_id;
            $comment['user_id'] = $user_id;
            $comment['rate_value'] = $rate_value;
            $comment['name'] = $user_name;

            if ($this->ProductComment->save($comment)) {
                
                $user = $this->Users->get($uid, ['contain' => ['UserProfile']]);
                $product = $this->Products->get($product_id, ['contain' => ['ProductCategories','ProductComment']]);
                $this->set(compact('product', 'user'));
                
                $this->render('/element/flash/comments');

            }
        }else{
            $user = $this->Users->get($uid, ['contain' => ['UserProfile']]);
            $product = $this->Products->get($id, ['contain' => ['ProductCategories','ProductComment']]);
            $comments = $this->ProductComment->find('all')->where(['product_id' => $id])->order(['id' => 'desc']);
            $this->set(compact('product', 'user'));
        }
        

    }

    public function addReview()
    {

        $comment = $this->ProductComment->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $comment = $this->ProductComment->patchEntity($comment, $data);
            if ($this->ProductComment->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }

    }

    // function to add new product
    public function addProduct()
    {
        $category = $this->paginate($this->ProductCategories);

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

                return $this->redirect(['action' => 'product-list']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('category', 'product'));

    }

    // function to edit the product details
    public function editProduct($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $id = $this->request->getData('id');
            // dd($id);
       
            $product = $this->Products->get($id, [
                'contain' => [],
            ]);
            $oldImage = $product['product_image'];

            $data = $this->request->getData();
            $image = $this->request->getData('product_image');
            $fileName = $image->getClientFilename();
            $targetPath = WWW_ROOT . 'img' . DS . $fileName;
            if ($fileName == '') {
                $fileName = $oldImage;
            } else {
                $image->moveTo($targetPath);
            }
            $data['product_image'] = $fileName;
            $product = $this->Products->patchEntity($product, $data);
            if ($this->Products->save($product)) {
                // $this->Flash->success(__('The product has been saved.'));
                // return $this->redirect(['action' => 'product-list']);
                // $this->render('/element/flash/product_index');
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The product has been updated.",
                ));
                exit;
            }
            echo json_encode(array(
                "status" => 0,
                "message" => "The product could not be updated. Please, try again.",
            ));
            $this->set(compact('product'));
            exit;
        }
    }

    // function to delete products
    public function deleteProduct()
    {

        if($this->request->is('ajax')){
            $this->autoRender = false;
            $id = $this->request->getQuery('product_id');
            $delete_status = $this->request->getQuery('delete_status');
            dd($delete_status);
            $product = $this->Products->get($id);
            if($delete_status == 1){
                $product->delete_status = 0;     
            }else{     
                $product->delete_status = 1;
            }     
            if($this->Products->save($product)){

              echo json_encode(array(
                    "status" => 1,
                    "message" => "The category has been deleted."
                )); 
            }
        }
    }

    // function to change the product status
    public function productStatus($id = null, $status)
    {

        $this->request->allowMethod('post');
        $product = $this->Products->get($id);

        if ($status == 1) {
            $product->status = 0;

        } else {

            $product->status = 1;
        }

        if ($this->Products->save($product)) {
            $this->Flash->success(__('The category status has been changed.'));

        }
        return $this->redirect(['action' => 'product-list']);

    }

    public function getProduct(){
      
        $id = $_GET['product_id'];
        $product = $this->Products->get($id,['contain'=>['ProductCategories']]);
        echo json_encode($product);
        exit;
        
    }
}
