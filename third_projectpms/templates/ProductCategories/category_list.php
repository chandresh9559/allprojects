<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">All existin Categories</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
               
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Operations</th>
              </thead>
              <tbody>
              <?php foreach ($categories as $category): ?>
                <tr>
                  <td>
                    <?= h($category->category_name) ?>
                  </td>
                  
                  <td>
                  <?php if($category->status == 1):?>
                    <?= $this->Form->postLink(__('Active'), ['action' => 'categoryStatus', $category->category_id,$category->status], ['confirm' => __('Are you sure you want to Inactive to this category'),'class'=>'btn btn-success']) ?>
                    <?php else:?>
                      <?= $this->Form->postLink(__('Inctive'), ['action' => 'categoryStatus', $category->category_id,$category->status], ['confirm' => __('Are you sure you want to Active to this category'),'class'=>'btn btn-secondary']) ?>
                  <?php endif;?>
                  </td>
                 
                  <td>
                    <?= h($category->created_date) ?>
                  </td>
                  <td>
                      <?= $this->Html->link(__(''), ['action' => 'editCategory', $category->category_id], ['class'=>'fas fa-edit']) ?>
                    <?= $this->Html->link(__(''), ['action' => 'deleteCategory', $category->category_id], ['confirm' => __('Are you sure you want to delete to {0}?', $category->category_name),'class'=>'fas fa-trash']) ?>
                  </td>
                </tr>
                    <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 