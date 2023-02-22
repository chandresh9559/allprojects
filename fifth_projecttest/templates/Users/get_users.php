<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    
    <?php echo $this->Form->create(null);?><br>
    <?php echo $this->Form->select('occupation',[1=>'active',0=>'inactive'],['empty'=>'choose one','class'=>'form-control border border-secondary btn','required'=>false]);?><br>
    <h3><?= __('Users') ?></h3>
   
</div>


