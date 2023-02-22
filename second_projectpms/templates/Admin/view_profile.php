<div class="wrapper">
<!-- ========Navbar======== -->
<?php echo $this->element('admin/navbar') ?>
<!-- ======navbar====== -->

<!-- =========sidebar========== -->
 <?php echo $this->element('admin/admin_sidebar') ?>
<!-- ==========sidebar========= -->

<div class="content-wrapper" style="margin-left:250px;">

   <section class="why_section layout_padding">
      <div class="container-fluid register">
         <div class="row">
            <div class="col-lg-8">
               <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                  <div class="card p-4">
                     <div class=" image d-flex flex-column justify-content-center align-items-center">
                           <button class="btn btn-secondary">
                           <?= $this->Html->image($user->image,['class'=>'user_profile'])?>
                           </button> 
                           <span class="name mt-3"><?= h($user->user_profile->first_name)?></span>
                           <span class="idd"><?= h($user->email)?></span>
                           <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                              <span class="idd1"><?= h($user->user_profile->address)?></span>
                              <span><i class="fa fa-copy"></i></span>
                           </div>
                          
                           <div class=" d-flex mt-2">
                           <?= $this->Html->link(__('Edit Profile'), ['action' => 'updateProfile', $user->id],['class'=>'btn btn-dark']) ?>
                           </div>
                          
                           <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                              <span><i class="fa fa-twitter"></i></span>
                              <span><i class="fa fa-facebook-f"></i></span>
                              <span><i class="fa fa-instagram"></i></span>
                              <span><i class="fa fa-linkedin"></i></span>
                           </div>
                           <div class=" px-2 rounded mt-4 date ">
                              <p>Date of join</p>
                              <span><?= h($user->created_date)?></span>
                           </div>
                           <div class="p-2">
                            <?php 
                            echo $this->Html->link(_('Back To Products'),
                            
                            ['controller'=>'Admin','action'=>'allProducts'],['class'=>'btn btn-primary p-2']);
                            ?>
                            </div>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </section>

</div>
</div>





