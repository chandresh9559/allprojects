<div class="container-fluid py-4 category">
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
          <select name="category_id" id="" class="form-control status1">
             <option value="" disabled selected>choose status</option>
             <option value="1">Active</option>
             <option value="0">Inactive</option>
          </select>
        <?php echo $this->element('flash/category_index') ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- =======================modal for edit category==================== -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="success">

    </div>
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <?php echo $this->Form->create(null, ['id' => 'edit-category', 'enctype' => 'multipart/form-data']) ?>
        <?php echo $this->Form->control('category_name', ['required' => false, 'class' => 'form-control mb-3', 'label' => ['class' => 'form-label']]) ?>
        <input type="text" id='category-id' name="category_id">
        <?=$this->Form->button(__('Update Category'), ['class' => 'btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0'])?>

      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          
        </div>
     </div>
  </div>
</div>
<!-- =====================modal for deactivate category with related product=============== -->
<div class="modal fade " id="categoryDisable" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="success">

    </div>
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="box d-flex">
        <h6 id="">Number of product related to this category - </h6>
        <h6 id="count"></h6>
        </div>
          <div id="response"></div>
          <input type="hidden" name="category_id" id="category_id">
          <input type="hidden" name="status" id="category_status">
        </div>
        <div class="action d-flex">
        <p>Do you want to deactivate them</p>
        <button id="change-status">Click Here</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
     </div>
  </div>
</div>
<!-- =====================modal for Activate category with related product=============== -->
<div class="modal fade " id="categoryActivate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="success">

    </div>
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="box d-flex">
        <h6 id="">Number of product related to this category - </h6>
        <h6 id="count"></h6>
        </div>
          <div id="response"></div>
          <input type="hidden" name="category_id" id="category_id">
          <input type="hidden" name="status" id="category_status">
        </div>
        <div class="action d-flex">
        <p>Do you want to deactivate them</p>
        <button id="change-status">Click Here</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
     </div>
  </div>
</div>

