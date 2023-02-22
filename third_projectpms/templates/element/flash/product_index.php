<div class="table-responsive product-table p-0">
  <table class="table align-items-center mb-0">
    <thead>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Title</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Description</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Tags</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Operations</th>
    </thead>
    <tbody>
      <?php foreach ($products as $product) : ?>
        <tr id="product<?php echo $product->id; ?>">
          <td>
          <div class="d-flex px-2 py-1">
            <div>
              <?php echo $this->Html->image($product->product_image,['class'=>'avatar avatar-sm me-3 border-radius-lg']) ?>
            </div>
            <div class="d-flex flex-column justify-content-center">
              <h6 class="mb-0 text-sm"> <?php echo h($product->product_title) ?></h6>
            </div>
          </div>
          </td>
          <td>
            <?= h($product->product_description) ?>
          </td>
          <td>
            <?= h($product->product_tags) ?>
          </td>
          <td>
            <?php if ($product->status == 1) : ?>
              <?= $this->Form->postLink(__('Active'), ['action' => 'product-status', $product->id, $product->status], ['confirm' => __('Are you sure you want to Inactive to this category'), 'class' => 'btn btn-success']) ?>
            <?php else : ?>
              <?= $this->Form->postLink(__('Inctive'), ['action' => 'product-status', $product->id, $product->status], ['confirm' => __('Are you sure you want to Active to this category'), 'class' => 'btn btn-secondary']) ?>
            <?php endif; ?>
          </td>
          <td>
            <?= h($product->created_date) ?>
          </td>
          <td>
            <?= $this->Html->link(__(''), ['action' => 'view-product', $product->id], ['class' => 'fas fa-eye']) ?>

            <a href="javascript:void(0)" class="btn-product" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" data-id="<?= $product->id ?>"><i class="fa fa-edit"></i>
            <a href="javascript:void(0)" class="delete-product" status-id="<?= $product->delete_status?>" data-id="<?= $product->id ?>"><i class="fa fa-trash"></i></a>

          </td>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>