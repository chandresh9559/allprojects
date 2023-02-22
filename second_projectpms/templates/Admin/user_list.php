<div class="wrapper">
    <!-- ========Navbar======== -->
    <?php echo $this->element('admin/navbar') ?>
    <!-- ======navbar====== -->

    <!-- =========sidebar========== -->
      <?php echo $this->element('admin/admin_sidebar') ?>
    <!-- ==========sidebar========= -->

    <div class="content-wrapper" style="margin-left:250px;">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>List Of All Existing Users</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- <div class="card-header">
                  <h3 class="card-title">DataTable with default features</h3>
                </div> -->
                <!--===== Listing of all users ======-->
                <div class="card-body">
                <h3><?= __('All Users') ?></h3>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sr. No.</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Operations</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <?php if($user->user_type == 0){ ?>
                         
                            <tr>
                                <td><?php
                                //  $this->Number->format($user->id) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= h($user->user_profile->first_name) ?></td>
                                <td><?= h($user->user_profile->contact) ?></td>
                                <td><?= $this->Html->image($user->image,['class'=>'user_img']) ?></td>
                                <td> 
                                  <?php if($user->status == 1):?>
                                    <?= $this->Form->postLink(__('Active'), ['action' => 'userStatus', $user->id,$user->status], ['confirm' => __('Are you sure you want to Inactive to {0}?', $user->user_profile->first_name)]) ?>
                                    <?php else:?>
                                      <?= $this->Form->postLink(__('Inactive'), ['action' => 'userStatus', $user->id,$user->status], ['confirm' => __('Are you sure you want to Active to {0}?',$user->user_profile->first_name)]) ?>
                                  <?php endif;?>
                                </td>
                                <td><?= h($user->created_date) ?></td>
                                <td class="actions">
                                    <?= $this->Form->postLink(__(''), ['action' => 'deleteUser', $user->id], ['confirm' => __('Are you sure you want to delete to {0}?', $user->user_profile->first_name),'class'=>'fas fa-trash']) ?>
                                </td>
                            </tr>
                            
                        <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Sr. No.</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Operations</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    </div>




