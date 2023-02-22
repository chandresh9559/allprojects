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
                           <?php echo $this->element('flash/comments')?>
                           <div>
                           <input type="hidden" class="productid" value="<?= $product->id ?>">
                            <input type="hidden" class="userid" value="<?= $user->id ?>">
                            <input type="hidden" class="uname" value="<?= $user->user_profile->first_name ?>">
                           </div>
                            <div class="reviews-counter mt-4">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" class="star"/>
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" class="star"/>
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" class="star"/>
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" class="star" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" class="star" />
                                    <label for="star1" title="text">1 star</label>
                                    
                                </div>
                                <span>3 Reviews</span>
                            <div>
                            <div class="form content">
                                    <?= $this->Form->create(null,['id'=>'comment']) ?>
                                    <fieldset>
                                        <label for="" class="mt-3">Add Comment</label>
                                        <?php echo $this->Form->control('comment',['class'=>'form-control cinput','label'=>false,'required'=>true]);?>
                                    </fieldset>
                                    <?= $this->Form->button(__('Post'), ['class' => 'hidethis btn btn-primary','type'=>'button', 'id' => "submitpost"]) ?>
                                    <?= $this->Form->end() ?>
					        </div>
                            <div class="p-2">
                            <?php 
                            echo $this->Html->link(_('Back To Products'),
                            
                            ['controller'=>'products','action'=>'product-list',$product->id],['class'=>'btn btn-primary col-md-4 p-2']);
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>