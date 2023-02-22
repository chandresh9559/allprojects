<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <div class="col-md-6">
                        <label for="">Select Categories</label>
                        <select name="category_id" id="" class="form-control">
                           <option value="" disabled selected>choose category</option>
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                        </select>
                      
                       
                     </div>
    <h3><?= __('Users') ?></h3>
    <?php 
    //die('element part//');
    echo $this->element('flash/user_index')?>
   
</div>
