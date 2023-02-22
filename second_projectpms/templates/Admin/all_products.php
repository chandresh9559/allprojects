
<?php 
// dd($products->product_categories->category_id);
?>
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
              <h1>List Of All Existing Products</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
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
                        <th>Product Title</th>
                        <th>Product Description</th>
                        <th>Product Category</th>
                        <th>Product Image</th>
                        <th>Product Tags</th>
                        <th>Product Status</th>
                        <th>Created Date</th>
                        <th>Modified Date</th>
                        <th>Operations</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                         
                            <tr>
                                <td><?php
                                // $this->Number->format($product->id) 
                                ?></td>
                                <td><?= h($product->product_title) ?></td>
                                <td><?= h($product->product_description) ?></td>
                                <td><?= h($product->product_category->category_name) ?></td>
                                
                                <td><?= $this->Html->image($product->product_image,['class'=>'product_image']) ?></td>
                                <td><?= h($product->product_tags) ?></td>
                                <td>
                                  <?php if($product->status == 1):?>
                                    <?= $this->Form->postLink(__('Active'), ['action' => 'productStatus', $product->id,$product->status], ['confirm' => __('Are you sure you want to Inactive this product')]) ?>
                                    <?php else:?>
                                      <?= $this->Form->postLink(__('Inactive'), ['action' => 'productStatus', $product->id,$product->status], ['confirm' => __('Are you sure you want to inactive this product')]) ?>
                                  <?php endif;?>
                                </td>
                                <td><?= h($product->created_date) ?></td>
                                <td><?= h($product->modified_date) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__(''), ['action' => 'viewProduct', $product->id],['class'=>'fas fa-eye']) ?>
                                    <?= $this->Html->link(__(''), ['action' => 'editProduct', $product->id],['class'=>'fas fa-edit']) ?>
                                    <?= $this->Form->postLink(__(''), ['action' => 'deleteProduct', $product->id], ['confirm' => __('Are you sure you want to delete this product'),'class'=>'fa fa-trash ']) ?>
                                </td>
                            </tr>
                         
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Sr. No.</th>
                        <th>Product Title</th>
                        <th>Product Description</th>
                        <th>Product Category</th>
                        <th>Product Image</th>
                        <th>Product Tags</th>
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





