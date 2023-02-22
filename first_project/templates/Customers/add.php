<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customers form content">
            <?= $this->Form->create(null,['enctype'=>'multipart/form-data','id'=>'form']) ?>
            <fieldset>
                <legend><?= __('Add Customer') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    // echo $this->Form->control('profile.gender');
                    // echo $this->Form->control('profile.address');
                    // echo $this->Form->control('profile.phone');
                    // echo $this->Form->control('image_file',['type'=>'file']);
                    // echo $this->Form->control('skills.0.skill_name');
                    // echo $this->Form->control('skills.1.skill_name');
                    // echo $this->Form->control('subskills.0.subskill_name');
                    // echo $this->Form->control('subskills.1.subskill_name');
                ?>
            </fieldset>
            <!-- <?= $this->Form->button(__('Submit')) ?> -->
            <button type="button" onclick=ajaxAddStudent()>Submit</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
     function ajaxAddStudent(){
         $.ajax({
                 method: 'POST',
                    url: "http://localhost:8765/customers/ajaxAddStudent",
                    data:  $("#form").serialize(),
                    success:function(response){
                        // alert(response);
                    }
                });
        }

</script>
