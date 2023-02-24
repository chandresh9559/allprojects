<style>
  @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}

.card-registration .select-arrow {
top: 13px;
}

.bg-grey {
background-color: #eae8e8;
}

@media (min-width: 992px) {
.card-registration-2 .bg-grey {
border-top-right-radius: 16px;
border-bottom-right-radius: 16px;
}
}

@media (max-width: 991px) {
.card-registration-2 .bg-grey {
border-bottom-left-radius: 16px;
border-bottom-right-radius: 16px;
}
}
</style>
<section class="h-100 h-custom" style="background-color: #d2c9ff;" id="cart-section">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                  </div>
                  <hr class="my-4">
                  <?php
                  $product = 0;
                  $price = 0;
                  if(empty($dearray)){ ?>

                    <5>Your cart is empty</5>

                  <?php }else{
                   foreach($details as $detail):
                   $product++;  
                   $price = $price+($detail->product->price*$detail->quantity);
                  
                   ?>
                  
                  <div class="row mb-4 justify-content-between align-items-center" id="rows<?php echo $detail->id?>">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                     <?php echo $this->Html->image($detail->product->product_image,['class'=>'cart-img'])?>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class=""><?php echo h($detail->product->product_title)?></h6>
                      <h6 class="text-muted"><?php echo h($detail->product->product_description)?></h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                     
                      <a href="javascript:void(0)" class="cart-decrease" data-id="<?= $detail->id ?>"><i class="fa fa-minus"></i>
                      <!-- <?php echo $this->Html->link(__('<i class="fa fa-minus" style="font-size:18px"></i>'),['controller'=>'users','action'=>'decrease',$detail->id],['escape'=>false ,'class'=>'btn btn-danger minus'])?>  -->
                      <?php echo $detail->quantity?>
                      <!-- <?php echo $this->Html->link(__('<i class="fa fa-plus" style="font-size:18px"></i>'),['controller'=>'users','action'=>'increase',$detail->id],['escape'=>false,'class'=>'btn btn-danger plus'])?> -->
                      <a href="javascript:void(0)" class="cart-increase" data-id="<?= $detail->id ?>"><i class="fa fa-plus"></i>
                    </div>
                    <div class="col-md-12">
                      <h6 class="mb-0"><span>&#8377;<?php echo h($detail->product->price)?></span></h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#" class="text-muted cart-delete" cart-data ="<?php echo $detail->id?>"><i class="fas fa-times"></i></a>
                    </div>
                  </div>
                  <?php endforeach;?>
                <?php }?>
                  <hr class="my-4">


                  <div class="pt-5">
                   <?php if(!empty($detail)){?>
                    <?php echo $this->Html->link(__('<i class="fas fa-long-arrow-alt-left me-2"></i>').('Continue Shoping'),['controller'=>'users','action'=>'products',$detail->product->id],['escape'=>false,'class'=>'font-weight-bold text-dark'])?>      
                    <?php }?>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">items - <?php echo $product;?></h5>
                    <h5>&#8377;<?php echo$price?></h5>
                  </div>

                  <h5 class="text-uppercase mb-3">Shipping</h5>

                  <div class="mb-4 pb-2">
                    <select class="select">
                      <option value="1">Standard-Delivery- €5.00</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                    </select>
                  </div>

                  <h5 class="text-uppercase mb-3">Give code</h5>

                  <div class="mb-5">
                    <div class="form-outline">
                      <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Examplea2">Enter your code</label>
                    </div>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>&#8377;<?php echo$price?></h5>
                  </div>

                  <button type="button" class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark">Checkout</button>

                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
