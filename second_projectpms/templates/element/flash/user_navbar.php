<!--======end header section======-->
<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
       <?php echo $this->Html->image('user/logo.png',['width'=>'250px'])?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav">
                  <li class="nav-item active"><?= $this->Html->link(__('Home'), ['controller'=>'Users','action' => 'index'],['class'=>'nav-link']) ?></li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><?= $this->Html->link(__('About'), ['controller'=>'Users','action' => 'about'],['class'=>'nav-link']) ?></li>
                        <li><?= $this->Html->link(__('Testimonials'), ['controller'=>'Users','action' => 'testimonial'],['class'=>'nav-link']) ?></li>
                     </ul>
                  </li>
                  <li class="nav-item"><?= $this->Html->link(__('Products'), ['controller'=>'Users','action' => 'product'],['class'=>'nav-link']) ?></li>
                  <li class="nav-item"><?= $this->Html->link(__('Blog'), ['controller'=>'Users','action' => 'blogList'],['class'=>'nav-link']) ?></li>
                  <li class="nav-item"><?= $this->Html->link(__('Contact'), ['controller'=>'Users','action' => 'contact'],['class'=>'nav-link']) ?></li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">SignUp/Login <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><?= $this->Html->link(__('Registeration'), ['controller'=>'Users','action' => 'registration'],['class'=>'nav-link']) ?></li>
                           <li><?= $this->Html->link(__('Login'), ['controller'=>'Users','action' => 'login'],['class'=>'nav-link']) ?></li>
                        </ul>
                  </li>
                  <form class="form-inline">
                     <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                     <i class="fa fa-search" aria-hidden="true"></i>
                     </button>
                  </form>
               </ul>
            </div>
       </nav>
    </div>
 </header>
 <!--======end header section======-->