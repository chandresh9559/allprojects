<div class="table-responsive p-0">
  <table class="table align-items-center mb-0">
    <thead>
    
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">User</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Operations</th>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
          <?php if($user->user_type == 0 && $user->delete_status == 2){ ?>
      <tr id="user<?php echo $user->id; ?>">
        <td>
          <div class="d-flex px-2 py-1">
            <div>
              <?= $this->Html->image($user->image,['class'=>'avatar avatar-sm me-3 border-radius-lg']) ?>
            </div>
            <div class="d-flex flex-column justify-content-center">
              <h6 class="mb-0 text-sm"><?= h($user->user_profile->first_name) ?></h6>
              <p class="text-xs text-secondary mb-0"><?= h($user->email) ?></p>
            </div>
          </div>
        </td>
        <td>
          <p class="text-xs font-weight-bold mb-0"><?= h($user->user_profile->contact) ?></p>
          <p class="text-xs text-secondary mb-0">Organization</p>
        </td>
        <td class="align-middle  text-sm">
        <?php if($user->status == 1):?>
          <?= $this->Form->postLink(__('Online'), ['action' => 'userStatus', $user->id,$user->status], ['confirm' => __('Are you sure you want to Inactive to {0}?', $user->user_profile->first_name),'class'=>'btn btn-success']) ?>
          <?php else:?>
            <?= $this->Form->postLink(__('Ofline'), ['action' => 'userStatus', $user->id,$user->status], ['confirm' => __('Are you sure you want to Active to {0}?',$user->user_profile->first_name),'class'=>'btn btn-secondary']) ?>
        <?php endif;?>
        </td>
        <td class="align-middle">
          <span class="text-secondary text-xs font-weight-bold"><?= h($user->created_date) ?></span>
        </td>
        <td class="align-middle">
        <?php 
        // echo $this->Html->link(__(''), ['action' => 'userProfile', $user->id], ['class'=>'fas fa-eye']) ?>
  
        <a href="javascript:void(0)" class="btn-view" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" data-id="<?= $user->id?>"><i class="fa fa-eye"></i>
        <a href="javascript:void(0)" class="btn-delete" status-id="<?= $user->delete_status?>" data-id="<?= $user->id?>"><i class="fa fa-trash"></i></td>
      </tr>
      <?php } ?>
          <?php endforeach; ?>
    </tbody>
  </table>
</div>





