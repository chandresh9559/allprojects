<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <!-- Uncomment below if you prefer to use an text logo -->
        <!-- <h1><a href="index.html">NewBiz</a></h1> -->
        <a href="index.html"><?= $this->html->image('cklogo.png',['class'=>'logo'])?></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index#about">About</a></li>
          <li><a class="nav-link scrollto" href="index#services">Services</a></li>
          <li><a class="nav-link scrollto " href="index#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="index#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="fas fa-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="fas fa-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="index#contact">Contact</a></li>
        </ul>
        <i class=" mobile-nav-toggle"></i>
      </nav>
      
      <!--==========navbar=========-->

    </div>
  </header>