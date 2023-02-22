<?php
$myTemplates = [
    'inputContainer'=>'<div class="input-group input-group-outline ">{{content}}</div>'
];
$this->Form->setTemplates($myTemplates);
?>
<!-- ========Add Category====== -->
<div class="container-fluid py-4">
    <div class="row">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Add New Product</h4>
                  <p class="mb-0">Enter details to add a Product</p>
                </div>
                <div class="card-body">

                <?= $this->Form->create($product,['enctype'=>'multipart/form-data','id'=>'form']) ?>
            <fieldset>

                    <select name="category_id" id="" class="form-control mb-3 border p-2">
                       <option value="" disabled selected>choose category</option>
                       <?php 
                             foreach ($category as $category): ?>
                                <option value="<?= h($category->category_id) ?>">
                                <?= h($category->category_name) ?></option>
                             <?php endforeach;
                          ?>
                    </select>
                     <?php echo $this->Form->control('product_title',['required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
                     <?php echo $this->Form->control('product_description',['required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
                    
                     <?php echo $this->Form->control('product_tags',['required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
                     <?php echo $this->Form->control('product_image',['type'=>'file','required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
                    
            </fieldset>
            <?= $this->Form->button(__('Edit Product'),['class'=>'btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0']) ?>
            <?= $this->Form->end() ?>
            </div>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
</div>

<!-- ========Add Category====== -->



