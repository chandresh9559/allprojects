<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
      <?= $this->Html->image($auth->image, ['class' => 'user_img']) ?>
      <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
    </a>
  </div>


  <hr class="horizontal light mt-0 mb-2">

  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <li class="nav-item">
        <?php echo $this->Html->link('<i class="fa fa-dashboard opacity-10"></i>' . __('Dashboard'), ['controller' => 'users', 'action' => 'dashboard'], ['escape' => false, 'class' => 'nav-link text-light']) ?>
      </li>

      <li class="nav-item">
        <?php echo $this->Html->link('<i class="fa fa-user opacity-10"></i>' . __('Users'), ['controller' => 'users', 'action' => 'user-list'], ['escape' => false, 'class' => 'nav-link text-light users']) ?>
      </li>

      <li class="nav-item">
        <?php echo $this->Html->link('<i class="fa fa-list-alt opacity-10"></i>' . __('All Categories'), ['controller' => 'product-categories','action' => 'category-list'], ['escape' => false, 'class' => 'nav-link text-light']) ?>
      </li>

      <li class="nav-item">
        <?php echo $this->Html->link('<i class="fa fa-product-hunt opacity-10"></i>' . __('All Products'), ['controller' => 'products', 'action' => 'product-list'], ['escape' => false, 'class' => 'nav-link text-light']) ?>
      </li>

      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
      </li>

      <li class="nav-item">
        <?php echo $this->Html->link('<i class="fa fa-user opacity-10"></i>' . __('Profile'), ['controller' => 'users', 'action' => 'profile', $auth->id], ['escape' => false, 'class' => 'nav-link text-light']) ?>
      </li>


    </ul>
  </div>

  <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
      <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to
        pro</a>
    </div>

  </div>

</aside>