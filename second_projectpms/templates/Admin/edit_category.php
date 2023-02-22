<div class="wrapper">
<!-- ========Navbar======== -->
<?php echo $this->element('admin/navbar') ?>
<!-- ======navbar====== -->

<!-- =========sidebar========== -->
 <?php echo $this->element('admin/admin_sidebar') ?>
<!-- ==========sidebar========= -->

<div class="content-wrapper" style="margin-left:250px;padding:100px">
<section class="why_section layout_padding">
   <div class="container-fluid register">
      <div class="row">
         <div class="col-lg-8 offset-lg-2">
            <div class="full">
            <?= $this->Form->create($productCategory,['enctype'=>'multipart/form-data','id'=>'edit-form']) ?>
            <fieldset>
                <legend style="font-weight:bold;"><?= __('Edit Category') ?></legend>
      
                    <div class="col-md-6"><?php echo $this->Form->control('category_name',['required'=>true,'class'=>'form-control']);?></div>
                 
                    
            </fieldset>
            <?= $this->Form->button(__('Edit Category'),['class'=>'btn btn-danger add-btn mt-4 ms-2']) ?>
            <?= $this->Form->end() ?>
            </div>
         </div>
      </div>
   </div>
</section>

</div>
</div>
<?= $this->Html->script([
    'admin/js/jquery_plugin',
    'admin/js/validate_plugin',
   //  'user/script',
     'admin/js/query',
 
   ],['block'=>'script']);
 ?>