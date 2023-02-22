<?php
$myTemplates = [
    'inputContainer'=>'<div class="input-group input-group-outline ">{{content}}</div>'
];
$this->Form->setTemplates($myTemplates);
?>
<!-- ========Add Category====== -->
<div class="container-fluid py-4">
    <div class="row">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Get in Touch</h4>
                  <p class="mb-0">Enter details to touch with us</p>
                </div>
                <div class="card-body">

                <?= $this->Form->create($contact,['enctype'=>'multipart/form-data','id'=>'form']) ?>
            <fieldset>

                   
                     <?php echo $this->Form->control('name',['required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
                     <?php echo $this->Form->control('email',['required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
                     <?php echo $this->Form->control('body',['required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
                    
            </fieldset>
            <?= $this->Form->button(__('Send mail'),['class'=>'btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0']) ?>
            <?= $this->Form->end() ?>
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

<!-- ========Add Category====== -->



