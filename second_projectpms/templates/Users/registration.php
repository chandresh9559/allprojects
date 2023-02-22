<section class="why_section layout_padding">
   <div class="container-fluid register">
      <div class="row">
         <div class="col-lg-8 offset-lg-2">
            
            <div class="full">
            <?= $this->Form->create(null,['enctype'=>'multipart/form-data','id'=>'form']) ?>
            <fieldset>
                <legend style="font-weight:bold;"><?= __('User Registration Form') ?></legend>
      
                    <div class="col-md-6"><?php echo $this->Form->control('email',['required'=>false,'class'=>'input'] );?><span id="email_error" style="color:red;font-weight:bold"></span></div>

                    <div class="col-md-6"><?php echo $this->Form->control('password',['required'=>false,'class'=>'input']);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('Confirm_password',['type'=>'password','required'=>false,'class'=>'input']);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('user_profile.first_name',['required'=>false,'class'=>'input']);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('user_profile.last_name',['required'=>false,'class'=>'input']);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('user_profile.contact',['required'=>false,'class'=>'input']);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('user_profile.address',['required'=>false,'class'=>'input']);?></div>
                    <div class="col-md-6"><?php echo $this->Form->control('image',['type'=>'file','required'=>false,'class'=>'input']);?></div>
                
            </fieldset>
            <?= $this->Form->button(__('Register'),['class'=>'btn btn-danger add-btn']) ?>
            <p style="display: flex" class="mt-4">If you are already registered<?= $this->Html->link(__('Login here'), ['controller'=>'Users','action' => 'login']) ?></p>
            <?= $this->Form->end() ?>
            </div>
         </div>
      </div>
   </div>
</section>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    
