<?php

// dd($products->product_categories->category_name);
?>
<div class="wrapper">
<!-- ========Navbar======== -->
<?php echo $this->element('admin/navbar') ?>
<!-- ======navbar====== -->

<!-- =========sidebar========== -->
 <?php echo $this->element('admin/admin_sidebar') ?>
<!-- ==========sidebar========= -->

<div class="content-wrapper" style="margin-left:250px;padding:100px">
    <section >
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card text-black">
                        <div class="row">
                            <div class="col-md-6">
                            <?= $this->Html->image($product->product_image,['class'=>'product-img']) ?>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h5 class="card-title font-weight-bold">Product Title</h5>
                                        <p class="text-muted mb-4"><?= h($product->product_title) ?></p>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <span class="font-weight-bold">Product Category</span><span><?= h($product->product_category->category_name) ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="font-weight-bold">Product Tags</span><span><?= h($product->product_tags) ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                        <span class="font-weight-bold">Status</span>
                                         <?php if($product->status == 1):?>
                                                     <?= ('Active') ?>
                                                     
                                         <?php endif;?>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="font-weight-bold">Created Date</span><span><?= h($product->created_date) ?></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row p-4">
                            <div class="related">
                                <h4><?= __('Related Comment') ?></h4>
                                <?php if (!empty($product->product_comment)) : ?>
                                    <div class="table-responsive">
                                        <table>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <tr>
                                                <th><?= __('User') ?></th>
                                                <th><?= __('Comments') ?></th>
                                                <th><?= __('Date') ?></th>
                                                <th><?= __('Action') ?></th>
                                                
                                            </tr>
                                            
                                                </div>
                                                <div class="col-md-6">
                                                    <?php foreach ($product->product_comment as $comment) : ?>
                                                <tr>
                                                    <td><i class="fa fa-user" style="font-size:24px;color:#5a5858;"></i><?= h($comment->name) ?></td>
                                                    <td><?= h($comment->comment) ?></td>
                                                    <td><?= h($comment->created_date) ?></td>
                                                    <td><?= $this->Form->postLink(__(''), ['action' => 'deleteComment', $comment->id,$product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id),'class'=>'fas fa-trash']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </table>
                                    </div>
                                <?php endif; ?>
                                
                            </div>
                            <div class="p-2">
                            <?php 
                            echo $this->Html->link(_('Back To Products'),
                            
                            ['controller'=>'Admin','action'=>'allProducts',$product->id],['class'=>'btn btn-primary col-md-4 p-2']);
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>