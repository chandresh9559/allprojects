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
              <h1>List Of All Existing Categories</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Categories</li>
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
                        <th>Category Name</th>
                        <th>Product Status</th>
                        <th>Created Date</th>
                        <th>Modified Date</th>
                        <th>Operations</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productCategories as $category): ?>
                            <tr>
                                <td><?php 
                                //  $this->Number->format($category->category_id) ?></td>
                                <td><?= h($category->category_name) ?></td>
                               
                                <td>
                                  <?php if($category->status == 1):?>
                                    <?= $this->Form->postLink(__('Active'), ['action' => 'categoryStatus', $category->category_id,$category->status], ['confirm' => __('Are you sure you want to Inactive to this category')]) ?>
                                    <?php else:?>
                                      <?= $this->Form->postLink(__('Inactive'), ['action' => 'categoryStatus', $category->category_id,$category->status], ['confirm' => __('Are you sure you want to Active to this category')]) ?>
                                  <?php endif;?>
                                </td>
                                <td><?= h($category->created_date) ?></td>
                                <td><?= h($category->modified_date) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__(''), ['action' => 'editCategory', $category->category_id],['class'=>'fa fa-edit']) ?>
                                    <?= $this->Form->postLink(__(''), ['action' => 'deleteCategory', $category->category_id], ['confirm' => __('Are you sure you want to delete to this category'),'class'=>'fa fa-trash']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Sr. No.</th>
                        <th>Category Name</th>
                        <th>Product Status</th>
                        <th>Created Date</th>
                        <th>Modified Date</th>
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





