<section class="why_section layout_padding">
   <div class="container-fluid register">
      <div class="row">
         <div class="col-lg-8 offset-lg-2">
            <div class="full">
            <?= $this->Form->create($user,['enctype'=>'multipart/form-data','id'=>'edit-form']) ?>
            <fieldset>
                <legend style="font-weight:bold;"><?= __('Update User') ?></legend>
      
                    <div class="col-md-6"><?php echo $this->Form->control('email',['required'=>false]);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('user_profile.first_name',['required'=>false]);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('user_profile.last_name',['required'=>false]);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('user_profile.contact',['required'=>false]);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('user_profile.address',['required'=>false]);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('image',['type'=>'file','required'=>false]);?></div>
                
            </fieldset>
            <?= $this->Form->button(__('Update'),['class'=>'btn btn-danger add-btn']) ?>
            <?= $this->Form->end() ?>
            </div>
         </div>
      </div>
   </div>
</section>
<?= $this->Html->script([
       'user/jquery_plugin',
       'user/validate_plugin',
       'user/query',
      //   'user/query',
    
      ],['block'=>'script']);
    ?>
