<!--======end header section======-->
<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container fixed-top mt-3" style="margin-left: 400px;">
       <?php echo $this->Html->image('user/logo.png',['width'=>'250px'])?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-right:500px;">
               <ul class="navbar-nav">
                  <li class="nav-item active"><?= $this->Html->link(__('Home'), ['controller'=>'Users','action' => 'logout1'],['class'=>'nav-link','confirm' => __('If you want to see home ,logout first')]) ?></li>
                  
                  <li class="nav-item"><?= $this->Html->link(__('Products'), ['controller'=>'Users','action' => 'products'],['class'=>'nav-link']) ?></li>
                  
                  <li class="nav-item"><?= $this->Html->link(__('Logout'), ['controller'=>'Users','action' => 'logout'],['confirm' => __('Are you sure you want to logout'),'class'=>'nav-link']) ?></li>
                  <li class="nav-item">
                     <?php echo $this->Html->image($user->image,['class'=>'profile'])?>
                     <?php echo $this->Html->link(_($user->email),['controller'=>'Users','action'=>'view',$user->id]);?>
                  </li>
                  
               </ul>
            </div>
       </nav>
    </div>
 </header>
 <!--======end header section======-->