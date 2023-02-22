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
        <div class="card row p-4">
            <div class="col-lg-8 offset-lg-2">
                <div class="full">
                <?= $this->Form->create($user,['enctype'=>'multipart/form-data','id'=>'edit-form']) ?>
                <fieldset>
                    <legend style="font-weight:bold;"><?= __('Edit Product') ?></legend>
                        <div class="row">
                            <div class="col-md-6">
                            <?= $this->Html->image($user->image,['class'=>'edit_img']) ?>
                            </div>
                            <div class="col-md-6">
                            <?php echo $this->Form->control('email',['required'=>false,'class'=>'form-control']);?>
                            <?php echo $this->Form->control('user_profile.first_name',['required'=>false,'class'=>'form-control']);?>
                            <?php echo $this->Form->control('user_profile.last_name',['required'=>false,'class'=>'form-control']);?>
                            <?php echo $this->Form->control('user_profile.contact',['required'=>false,'class'=>'form-control']);?>
                            <?php echo $this->Form->control('image',['type'=>'file','required'=>false,'class'=>'form-control','class'=>'form-control']);?>
                            </div>
                            <?php echo $this->Form->control('user_profile.address',['required'=>false,'class'=>'form-control']);?>
                            </div>
                        </div>

                 
                    <div class="col-md-6"></div>
                        
                </fieldset>
                <?= $this->Form->button(__('Edit Profile'),['class'=>'btn btn-danger add-btn mt-4 ms-2']) ?>
                <?= $this->Form->end() ?>
                <div class="p-2">
                            <?php 
                            echo $this->Html->link(_('Back To Profile'),
                            
                            ['controller'=>'Admin','action'=>'viewProfile',$user->id],['class'=>'btn btn-primary p-2']);
                            ?>
                            </div>
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