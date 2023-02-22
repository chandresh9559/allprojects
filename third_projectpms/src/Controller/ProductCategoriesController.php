<?php
declare(strict_types=1);

namespace App\Controller;


class ProductCategoriesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        
        
        $this->loadModel('ProductCategories');
        $this->loadModel('Products');
        $this->loadComponent('flash');
        $auth = $this->Authentication->getIdentity();
        $this->set(compact('auth'));
    }
   //========== function to show all exsiting categories
    public function categoryList()
    {
        $categories=$this->paginate($this->ProductCategories);
        $this->set(compact('categories'));
    }

    //========== function to add new category==========//
    public function addCategory()
    {
        $category = $this->ProductCategories->newEmptyEntity();
        if($this->request->is('post')){
            $category=$this->ProductCategories->patchEntity($category,$this->request->getData());
            if($this->ProductCategories->save($category)){
                $this->flash->success(__('Product category has been saved'));
                return $this->redirect(['action'=>'categoryList']);
            }else{
                $this->flash->error(__('Product category could not be saved, please try again'));
            }
        }
        $this->set(compact('category'));
    }

    //======== function to edit category ==========//
    public function editCategory($id = null)
    {
        $category = $this->ProductCategories->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->ProductCategories->patchEntity($category, $this->request->getData());
            if ($this->ProductCategories->save($category)) {
                $this->Flash->success(__('The product category has been updated.'));

                return $this->redirect(['action' => 'category-list']);
            }
            $this->Flash->error(__('The product category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
    }

    //========== function to delete  category==========//
    public function deleteCategory()
    {
        // $this->request->allowMethod('post','delete');
        // $category = $this->ProductCategory->get($id);
        // if($this->ProductCategories->delete($category)){
        //     $this->flash->success(__('The category has been deleted'));
        //     return $this->redirect(['action'=>'category-list']);
        // }
        // $this->flash->error(__('Product category could not be deleted,please try again'));

        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $id = $this->request->getQuery('category_id');
            dd($id);
            $category = $this->ProductCategories->get($id);

            if ($this->ProductCategories->delete($category)) {

                echo json_encode(array(
                    "status" => 1,
                    "message" => "The category has been deleted."
                )); 
    
                exit;

            } else {

                echo json_encode(array(
                    "status" => 0,
                    "message" => "The product category could not be deleted. Please, try again."
                )); 
    
                exit;
            }   
        }
    }

    // function to change product status
    public function categoryStatus($id=null,$status){

        $this->request->allowMethod('post');
        $category = $this->ProductCategories->get($id);

        if($status == 1){
            $category->status = 0;

        }else{

            $category->status = 1;
        }

        if($this->ProductCategories->save($category)){
            $this->Flash->success(__('The category status has been changed.'));

        }
        return $this->redirect(['action' => 'category-list']);

    }
}
