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

                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Title</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Description</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Tags</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Operations</th>
              </thead>
              <tbody>
                <?php foreach ($products as $product) : ?>
                  <tr>
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
                      <?php echo h($product->product_description) ?>
                    </td>
                    <td>
                      <?php echo h($product->product_tags) ?>
                    </td>

                    <td>
                      <?php if ($product->status == 1) : ?>
                        <?php echo $this->Form->postLink(__('Active'), ['action' => 'product-status', $product->id, $product->status], ['confirm' => __('Are you sure you want to Inactive to this category'), 'class' => 'btn btn-success']) ?>
                      <?php else : ?>
                        <?php echo $this->Form->postLink(__('Inctive'), ['action' => 'product-status', $product->id, $product->status], ['confirm' => __('Are you sure you want to Active to this category'), 'class' => 'btn btn-secondary']) ?>
                      <?php endif; ?>
                    </td>

                    <td>
                      <?php echo h($product->created_date) ?>
                    </td>
                    <td>
                      <?php echo $this->Html->link(__(''), ['action' => 'view-product', $product->id], ['class' => 'fas fa-edit']) ?>
                      <?php echo $this->Html->link(__(''), ['action' => 'edit-product', $product->id], ['class' => 'fas fa-edit']) ?>
                      <?php echo $this->Html->link(__(''), ['action' => 'delete-product', $product->id], ['confirm' => __('Are you sure you want to delete to', $product->product_title), 'class' => 'fas fa-trash']) ?>
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