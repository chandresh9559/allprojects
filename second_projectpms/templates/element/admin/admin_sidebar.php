
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Brand Logo -->
        <div class="info">

          <h6 class="text-light p-2 m-2"><?php echo h($user->email)?></h6>

        </div>
          
    <!-- Sidebar -->
    <div class="sidebar">
     
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link bg-primary">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <?= $this->Html->link(__('All Users'), ['controller'=>'Admin','action' => 'userList'],['class'=>'nav-link']) ?>
          </li>

          <li class="nav-item">
            <?= $this->Html->link(__('All Products'), ['controller'=>'Admin','action' => 'allProducts'],['class'=>'nav-link']) ?>
          </li>

          <li class="nav-item">
          <?= $this->Html->link(__('All Categories'), ['controller'=>'Admin','action' => 'allCategories'],['class'=>'nav-link']) ?>
       
          </li>

          <li class="nav-item">
            <?= $this->Html->link(__('View Profile'), ['controller'=>'Admin','action' => 'viewProfile',$user->id],['class'=>'nav-link']) ?>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  