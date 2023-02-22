<div class="container" style="margin-top:50px">
	<!-- ======= Bredcrumb ======= -->
	<div class="pt-4 mt-4">
		<?php
		echo $this->Html->link(
			_('Back To Products'),

			['controller' => 'Users', 'action' => 'products', $product->id],
			['class' => 'col-md-4 p-2']
		);
		?>
	</div>
	<!-- ======= Bredcrumb ======= -->

	<div class="heading-section">
		<h2>Product Details</h2>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div id="slider" class="owl-carousel ">
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
			</div>
			<div id="thumb" class="owl-carousel product-thumb">
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
				<div class="item">
					<?= $this->Html->image($product->product_image, ['class' => 'view-product']) ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="product-dtl">
				<div class="product-info">
					<div class="product-name"><?= h($product->product_title) ?></div>
					<div class="reviews-counter">
						<div class="rate">
							<input type="radio" id="star5" name="rate" value="5" checked />
							<label for="star5" title="text">5 stars</label>
							<input type="radio" id="star4" name="rate" value="4" checked />
							<label for="star4" title="text">4 stars</label>
							<input type="radio" id="star3" name="rate" value="3" checked />
							<label for="star3" title="text">3 stars</label>
							<input type="radio" id="star2" name="rate" value="2" />
							<label for="star2" title="text">2 stars</label>
							<input type="radio" id="star1" name="rate" value="1" />
							<label for="star1" title="text">1 star</label>
						</div>
						<span>3 Reviews</span>
					</div>
					<div class="product-price-discount"><span>$39.00</span><span class="line-through">$29.00</span></div>
				</div>
				<p><?= h($product->product_description) ?></p>
				<div class="row">
					<div class="col-md-6">
						<label for="size">Size</label>
						<select id="size" name="size" class="form-control">
							<option>S</option>
							<option>M</option>
							<option>L</option>
							<option>XL</option>
						</select>
					</div>
					<div class="col-md-6">
						<label for="color">Color</label>
						<select id="color" name="color" class="form-control">
							<option>Blue</option>
							<option>Green</option>
							<option>Red</option>
						</select>
					</div>
				</div>
				<div class="product-count">
					<label for="size">Quantity</label>
					<form action="#" class="display-flex">
						<div class="qtyminus">-</div>
						<input type="text" name="quantity" value="1" class="qty">
						<div class="qtyplus">+</div>
					</form>
					<a href="#" class="btn btn-warning mt-4">Add to Cart</a>
					<a href="#" class="btn btn-danger mt-4">Buy Now</a>
				</div>
			</div>
		</div>
	</div>
	<div class="product-info-tabs">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification" role="tab" aria-controls="specification" aria-selected="false">Specification</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Comments</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
			</div>
			<!-- ===========All Comments============ -->
			<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
				<div class="review-heading">Related Comments</div>
				<?php if (!empty($product->product_comment)) : ?>
					<div class="comment">


						<div class="row d-flex">

							<div class="col-md-4 font-weight-bold"><?= __('User') ?></div>
							<div class="col-md-4 font-weight-bold"><?= __('Comments') ?></div>
							<div class="col-md-4 font-weight-bold"><?= __('Date') ?></div>

						</div>
						<div class="row d-flex">
							<?php foreach ($product->product_comment as $comment) : ?>


								<div class="col-md-4"><i class="fa fa-user"></i><?= h($comment->name) ?></div>
								<div class="col-md-4"><?= h($comment->comment) ?></div>
								<div class="col-md-4"><?= h($comment->created_date) ?></div>


							<?php endforeach; ?>
						</div>


					</div>
				<?php endif; ?>
				<!-- ===========Comment Add Section============ -->
				<div class="comment form content">
					<?= $this->Form->create(null, ['id' => 'comment']) ?>
					<fieldset>
						<label for="" class="mt-3">Add Comment</label>
						<?php echo $this->Form->control('comment', ['class' => 'form-control', 'label' => false, 'type' => 'textarea', 'required' => false]); ?>
						<span id="error"></span>
					</fieldset>
					<?= $this->Form->button(__('Post Comment'), ['class' => 'hidethis btn btn-danger']) ?>
					<?= $this->Form->end() ?>
				</div>
			</div>
			<div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification">
				<div class="row">
					<div class="col-md-6">
						<div class="d-flex justify-content-between">
							<span class="font-weight-bold">Product Category</span><span><?= h($product->product_category->category_name) ?></span>
						</div>
						<div class="d-flex justify-content-between">
							<span class="font-weight-bold">Product Tags</span><span><?= h($product->product_tags) ?></span>
						</div>
						<div class="d-flex justify-content-between">
							<span class="font-weight-bold">Status</span>
							<?php if ($product->status == 1) : ?>
								<?= ('In Stock') ?>

							<?php endif; ?>
						</div>
						<div class="d-flex justify-content-between">
							<span class="font-weight-bold">Created Date</span><span><?= h($product->created_date) ?></span>
						</div>
					</div>
					<div class="col-md-6"></div>
				</div>
			</div>
		</div>
	</div>

</div>
</div>