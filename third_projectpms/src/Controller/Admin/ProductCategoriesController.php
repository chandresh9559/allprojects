<?php
declare(strict_types=1);

namespace App\Controller\Admin;


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
        $categories=$this->paginate($this->ProductCategories,['contain'=>['Products']]);
        $this->set(compact('categories'));

        $status=$this->request->getQuery('status1');
        if($status == null){
            $categories=$this->ProductCategories->find('all');
        }else{
            $categories=$this->ProductCategories->find('all')->contain('Products')->where(['status'=>$status]);
        }
        // $this->set(compact('categories'));
        if($this->request->is('ajax')){
         
        //    $this->autoRender = false;
           
        //    $this->layout = false;
           $this->render('/element/flash/category_index');
        }
    }

    public function getCategory(){
        $id = $_GET['category_id'];
        $category = $this->ProductCategories->get($id);
        echo json_encode($category);
        exit;
        
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
        // dd()
        
        if ($this->request->is(['post','put','patch'])) {
        $id=$this->request->getData('category_id');  
        $data=$this->request->getData();  
        $category = $this->ProductCategories->get($id);
        $category = $this->ProductCategories->patchEntity($category, $data);
            if ($this->ProductCategories->save($category)) {
                echo "edited";
               
            }else{

                echo "failed";

            }
        }

        $this->set(compact('category'));
       

    }

    //========== function to delete  category==========//
    public function deleteCategory()
    {

        if($this->request->is('ajax')){
            $this->autoRender = false;
            $id = $this->request->getQuery('category_id');
            $delete_status = $this->request->getQuery('delete_status');
            $category = $this->ProductCategories->get($id);
            if($delete_status == 1){
                $category->delete_status = 0;     
            }else{     
                $category->delete_status = 1;
            }     
            if($this->ProductCategories->save($category)){

              echo json_encode(array(
                    "status" => 1,
                    "message" => "The category has been deleted."
                )); 
            }
        }
    }

    // function to change product status
    public function categoryStatus($id=null,$status){
        $this->request->allowMethod('post');
        // $product = $this->Products->find('count')->where(['category_id'=>$id]);
        // $i=0;
        // $product = $this->Products->find('all', array('condition'=>array('category_id'=>$id)))->all();
        // foreach($product as $product){
        //     $i++;

        // }
        // echo $i;
        // dd($product);

        $category = $this->ProductCategories->get($id,['contain'=>['Products']]);
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

    public function getStatus(){
        $id = $_GET['id'];
        $products = $this->ProductCategories->get($id, [
            'contain' => ['Products']
        ]);
        echo json_encode($products);
        exit;
    }

    public function deactivate(){
        $this->request->allowMethod(['post']);
        $id = $_POST['id'];
        $status = $_POST['status'];
        $productcstatus = $this->ProductCategories->get($id);
        //  echo $status;die;
        if ($status == 1) {
            $productcstatus->status = 0;
            $product = $this->Products->find('all')->where(['category_id' => $id]);
            foreach ($product as $product) {
                $product->status = 0;
                $this->Products->save($product);
            }
        }
        if ($this->ProductCategories->save($productcstatus)) {
            // if ($this->Products->save($product)) {
            echo json_encode(array(
                "status" => $status,
                "id" => $id,
            ));
            exit;
        }
    }
}
