<?php
// dd($productCategories->id);
?>
<!-- ========Navbar======== -->
<?php echo $this->element('admin/navbar') ?>
<!-- ======navbar====== -->

<!-- =========sidebar========== -->
 <?php echo $this->element('admin/admin_sidebar') ?>
<!-- ==========sidebar========= -->

<div class="content-wrapper" style="margin-left:250px;margin-top:100px;padding:100px">
<section class="why_section layout_padding">
   <div class="container-fluid register">
      <div class="row">
         <div class="col-lg-8 offset-lg-2">
            <div class="full">
            <?= $this->Form->create($product,['enctype'=>'multipart/form-data','id'=>'form']) ?>
            <fieldset>
                <legend style="font-weight:bold;"><?= __('Add Product') ?></legend>
      
                     <div class="col-md-6">
                        <label for="">Select Categories</label>
                        <select name="category_id" id="" class="form-control">
                           <option value="" disabled selected>choose category</option>
                           <?php 
                                 foreach ($productCategories as $productCategory): ?>
                                    <option value="<?= h($productCategory->category_id) ?>">
                                    <?= h($productCategory->category_name) ?></option>
                                 <?php endforeach;
                              ?>
                        </select>
                      
                       
                     </div>
                    <div class="col-md-6"><?php echo $this->Form->control('product_title',['required'=>false,'class'=>'form-control']);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('product_description',['required'=>false,'class'=>'form-control']);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('product_image',['type'=>'file','required'=>false,'class'=>'form-control']);?></div>

                    <div class="col-md-6"><?php echo $this->Form->control('product_tags',['required'=>false,'class'=>'form-control']);?></div>
                    
            </fieldset>
            <?= $this->Form->button(__('Add Product'),['class'=>'btn btn-danger add-btn mt-4 ms-2']) ?>
            <?= $this->Form->end() ?>
            </div>
         </div>
      </div>
   </div>
</section>

</div>
<?= $this->Html->script([
    'admin/js/jquery_plugin',
    'admin/js/validate_plugin',
    'user/script',
   //   'admin/js/query',
 
   ],['block'=>'script']);
 ?>
