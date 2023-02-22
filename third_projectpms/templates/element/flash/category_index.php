<div class="table-responsive p-0" id="category-list">
  <table class="table align-items-center mb-0">
    <thead>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category Name</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Operations</th>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): 
      if($category->delete_status ==1){
      ?>
      
      <tr id="category<?php echo $category->category_id; ?>">
        <td>
          <?= h($category->category_name) ?>
        </td>
        <td>
        <?php if($category->status == 1):?>
         <?php
         $i = 0;
           foreach($category->products as $product){
           $i++;

         }?>

          <?= $this->Form->postLink(__('Active'), ['action' => 'categoryStatus', $category->category_id,$category->status], ['confirm' => __('Are you sure you want to Inactive to this category'),'class'=>'btn btn-success']) ?>
          <a href="javascript:void(0)" class="category-status" data-bs-toggle="modal" data-bs-target="#categoryDisable" data-bs-whatever="@getbootstrap" data-id="<?= $category->category_id?>">Active</a>
          <?php else:?>
            <?= $this->Form->postLink(__('Inctive'), ['action' => 'categoryStatus', $category->category_id,$category->status], ['confirm' => __('Are you sure you want to Active to this category'),'class'=>'btn btn-secondary']) ?>
        <?php endif;?>
        </td>
        <td>
          <?= h($category->created_date) ?>
        </td>
        <td>
           
            
            <a href="javascript:void(0)" class="btn-category" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" data-id="<?= $category->category_id?>"><i class="fa fa-edit"></i>
            <a href="javascript:void(0)" class="delete-category" status-id="<?= $category->delete_status?>" data-id="<?= $category->category_id ?>"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
          <?php } 
        endforeach; ?>
    </tbody>
  </table>
</div>