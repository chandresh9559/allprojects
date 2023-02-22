<div class="table-responsive">
   <div class="row">
        <?php foreach ($products as $product) {
        // if($product->status ==1 && $product->product_category->status ==1){
        ?>
        <div class="col-md-3 m-4 border border-secondary p-4" style="max-width: 29%;">
            <div class=" ">
                <?= $this->Html->image($product->product_image, ['class' => 'product_image']) ?>
                <span class="me-4 mt-3"><?php echo h($product->product_title); ?></span>
                <?php
                echo $this->Html->link(
                    _('View Product'),
                    ['controller' => 'Users', 'action' => 'viewProduct', $product->id],
                    ['class' => 'btn btn-primary product-btn mt-3']
                );
                ?>
            </div>
        </div>
        <?php
        }
        // }
        ?>
   </div>
</div>