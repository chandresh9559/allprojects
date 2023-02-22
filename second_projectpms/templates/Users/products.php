<!--======inner page section========-->
<section class="inner_page_head" style="margin-top:70px;">
   <div class="container_fuild">
      <div class="row">
         <div class="col-md-12">
            <div class="full">
               <h3>Product Grid</h3>
            </div>
         </div>
      </div>
   </div>
</section>
<!--==========end inner page section===========-->
<!--===========product section==========-->
<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
      </div>
      <div class="row">
         <div class="col d-flex">
            <select name="" id="" class="form-control filter">
               <option value="" disabled selected>Search with category</option>
               <?php 
                     foreach ($productCategories as $productCategory): ?>
                        <option value="<?= h($productCategory->category_id) ?>">
                        <?= h($productCategory->category_name) ?></option>
                     <?php endforeach;
                  ?>
            </select>
         </div>
      </div>
      <div class="row">
         <?php echo $this->element('flash/product_list')?>
      </div>
      <!-- <ul class="pagination">
         <?php // $this->Paginator->numbers() ?>
         <?php // $this->Paginator->prev("Preview") ?>
         <?php // $this->Paginator->next("Next") ?>
      </ul> -->
</section>


<!--===========end product section==========-->