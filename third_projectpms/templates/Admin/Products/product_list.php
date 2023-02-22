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
        <label for="">Select Status</label>
          <select name="category_id" id="" class="form-control status2">
             <option value="" disabled selected>choose status</option>
             <option value="1">Instock</option>
             <option value="0">Out of Stock</option>
          </select>
        <?php echo $this->element('flash/product_index')?>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?= $this->Form->create(null,['enctype'=>'multipart/form-data','id'=>'edit-product']) ?>
        <select name="category_id" id="" class="form-control mb-3 border p-2">
          <option value="" selected disabled>choose category</option>
           <?php 
                 foreach ($category as $category): ?>
                    <option value="<?= h($category->category_id) ?>">
                    <?= h($category->category_name) ?></option>
                 <?php endforeach;
              ?>
        </select>
        <input type="hidden" name="id" id="product-id">
         <?php echo $this->Form->control('product_title',['required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
         <?php echo $this->Form->control('product_description',['required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
         <?php echo $this->Form->control('product_tags',['required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
         <?php echo $this->Form->control('product_image',['type'=>'file','required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
        <?= $this->Form->button(__('Add Product'),['class'=>'btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0']) ?>
        <?= $this->Form->end() ?>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>