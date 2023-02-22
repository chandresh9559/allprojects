<section class="why_section layout_padding">
   <div class="container-fluid register">
      <div class="row">
         <div class="col-lg-8 offset-lg-2">
            <div class="full">
            <?= $this->Form->create(null,['enctype'=>'multipart/form-data','id'=>'login']) ?>
            <fieldset>
                <legend style="font-weight:bold;"><?= __('User Login Form') ?></legend>
      
                    <div class="col-md-6"><?php echo $this->Form->control('email',['required'=>false]);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('password',['required'=>false]);?></div>
                    
                
            </fieldset>
            <?= $this->Form->button(__('Login'),['class'=>'btn btn-danger add-btn']) ?>
            <p style="display: flex" class="mt-4">If you are new please<?= $this->Html->link(__('register here'), ['controller'=>'Users','action' => 'registration']) ?></p>
            <?= $this->Form->end() ?>
            </div>
         </div>
      </div>
   </div>
</section>
