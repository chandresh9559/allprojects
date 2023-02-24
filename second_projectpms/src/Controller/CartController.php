<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cart Controller
 *
 * @property \App\Model\Table\CartTable $Cart
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Users'],
        ];
        $cart = $this->paginate($this->Cart);

        $this->set(compact('cart'));
    }

    /**
     * View method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cart = $this->Cart->get($id, [
            'contain' => ['Products', 'Users'],
        ]);

        $this->set(compact('cart'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null,$product_title)
    {
    
        //   if($user = $this->Authentication->getIdentity()){

        //    $cart = $this->Cart->newEmptyEntity();
           
        //    $cart->user_id = $user->id;
        //    $cart->product_id = $id;
        //    $cart->product_name = $product_title;
         
        //    if($this->Cart->save($cart)){
        //       $this->Flash->success(__('Product has been saved in your cart'));
        //       return $this->redirect(['controller'=>'users','action'=>'cart']);
        //    }
           
        //    $this->Flash->error(__('not saved'));
        //       return $this->redirect(['controller'=>'users','action'=>'cart']);
        // }

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

    /**
     * Edit method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cart = $this->Cart->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cart = $this->Cart->patchEntity($cart, $this->request->getData());
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $products = $this->Cart->Products->find('list', ['limit' => 200])->all();
        $users = $this->Cart->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('cart', 'products', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Cart->get($id);
        if ($this->Cart->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
