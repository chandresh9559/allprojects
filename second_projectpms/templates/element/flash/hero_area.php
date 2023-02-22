<div class="hero_area">
   <!-- header section strats -->
   <header class="header_section">
      <div class="container">
         <nav class="navbar navbar-expand-lg custom_nav-container fixed-top" style="margin-left:400px;">
            <a class="navbar-brand" href="index.html"><?php echo $this->Html->image('user/logo.png',['width'=>'250px'])?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-right:500px;">
               <ul class="navbar-nav">
                   <li class="nav-item"><?= $this->Html->link(__('Home'), ['controller'=>'Users','action' => 'index'],['class'=>'nav-link']) ?></li>

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
   <!-- end header section -->
   <!-- slider section -->
   <section class="slider_section" style="margin-top:40px;">
      <div class="slider_bg_box">
      <?php echo $this->Html->image('user/slider-bg.jpg')?>
      </div>
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container ">
                  <div class="row">
                     <div class="col-md-7 col-lg-6 ">
                        <div class="detail-box">
                           <h1>
                              <span>
                              Sale 20% Off
                              </span>
                              <br>
                              On Everything
                           </h1>
                           <p>
                              Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                           </p>
                           <div class="btn-box">
                              <a href="" class="btn1">
                              Shop Now
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item ">
               <div class="container ">
                  <div class="row">
                     <div class="col-md-7 col-lg-6 ">
                        <div class="detail-box">
                           <h1>
                              <span>
                              Sale 20% Off
                              </span>
                              <br>
                              On Everything
                           </h1>
                           <p>
                              Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                           </p>
                           <div class="btn-box">
                              <a href="" class="btn1">
                              Shop Now
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container ">
                  <div class="row">
                     <div class="col-md-7 col-lg-6 ">
                        <div class="detail-box">
                           <h1>
                              <span>
                              Sale 20% Off
                              </span>
                              <br>
                              On Everything
                           </h1>
                           <p>
                              Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                           </p>
                           <div class="btn-box">
                              <a href="" class="btn1">
                              Shop Now
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <ol class="carousel-indicators">
               <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
               <li data-target="#customCarousel1" data-slide-to="1"></li>
               <li data-target="#customCarousel1" data-slide-to="2"></li>
            </ol>
         </div>
      </div>
   </section>
   <!-- end slider section -->
</div>