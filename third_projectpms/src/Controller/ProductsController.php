<?php

declare(strict_types=1);

namespace App\Controller;

class ProductsController extends AppController
{
    // this function used to load all models and those things that will be used before hit the actions
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);


        $this->loadModel('ProductCategories');
        $this->loadModel('Products');
        $this->loadComponent('flash');
        $auth = $this->Authentication->getIdentity();
        $this->set(compact('auth'));
    }

    // function to list all existing products
    public function productList()
    {
        $products = $this->paginate($this->Products);
        $this->set(compact('products'));
    }

    // function to view product details
    public function viewProduct($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['ProductCategories', 'ProductComment', 'Users'],
        ]);

        $this->set(compact('product'));
    }

    // function to add new product
    public function addProduct()
    {

        $category = $this->paginate($this->ProductCategories);

            $product = $this->Products->newEmptyEntity();
            if ($this->request->is('post')) {
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
        $category = $this->paginate($this->ProductCategories);
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);

        $product['product_image']=$product->product_image;
        // dd($product)
    
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product','category'));
    }

    // function to delete products
    public function deleteProduct($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Products->get($id);
        if ($this->Products->delete($user)) {
            $this->Flash->success(__('The product category has been deleted.'));
        } else {
            $this->Flash->error(__('The product category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'product-list']);
    }

    // function to change the product status
    public function productStatus($id = null,$status){

        $this->request->allowMethod('post');
        $product = $this->Products->get($id);

        if($status == 1){
            $product->status = 0;

        }else{

            $product->status = 1;
        }

        if($this->Products->save($product)){
            $this->Flash->success(__('The category status has been changed.'));

        }
        return $this->redirect(['action' => 'product-list']);

        
    }
}
