<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">All existing users</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <label for="">Select Status</label>
          <select name="category_id" id="" class="form-control status">
             <option value="" disabled selected>choose status</option>
             <option value="1">Online</option>
             <option value="0">Offline</option>
          </select>
           <?php echo $this->element('flash/user_index')?>
        
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-body">
      <?php echo $this->Form->create(null,['id'=>'form','enctype'=>'multipart/form-data'])?>
      <img src="" alt="" id="user_img">
      <?php echo $this->Form->control('email',['class'=>'form-control mb-3','label'=>['class'=>'form-label'],'required'=>false])?>
      <?php echo $this->Form->control('user_profile.first_name',['class'=>'form-control mb-3','label'=>['class'=>'form-label'],'required'=>false])?>
      <?php echo $this->Form->control('user_profile.last_name',['class'=>'form-control mb-3','label'=>['class'=>'form-label'],'required'=>false])?>
      <?php echo $this->Form->control('user_profile.contact',['class'=>'form-control mb-3','label'=>['class'=>'form-label'],'required'=>false])?>
      <?php echo $this->Form->control('user_profile.address',['class'=>'form-control mb-3','label'=>['class'=>'form-label'],'required'=>false])?>
     
     
      <?= $this->Form->end()?>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
