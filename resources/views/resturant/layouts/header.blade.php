<header class="header-classic">
    <div class="container">
      <div class="row">
        <div class="logoheeader col-4 col-md-2 col-lg-2 ">
          <a href="#">
            <img src="{{asset('images/logo.png')}}" width="70" height="60">
          </a>
        </div><!-- logoheeader -->
        <div class="contentyopbottom  col-8 col-md-10 col-lg-10 ">
          <nav class="main_nav">
            <ul>
              <li>
                <a href="#">استلام  <i class="fas fa-caret-right"></i></a>
              </li>
              <li>
                <a href="{{route('branches.selling')}}">بيع  <i class="fas fa-caret-right"></i></a>
              </li>

              <li>
                <a href="#">مرتجع  <i class="fas fa-caret-right"></i></a>
              </li>
              <li>
                <a href="#">تحويل  <i class="fas fa-caret-right"></i></a>
              </li>
              <li>
                <div class="dropdown show">
                  <a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    نقدية
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('cashExchange.index')}}">صرف نقدية</a>
                    <a class="dropdown-item" href="#">توريد نقدية</a>
                  </div>
                </div>
                
              </li>
            </ul>
          </nav>
        </div><!-- contentyopbottom -->
      </div>

      <div class="hamburger OpenMenu hamburger--arrow js-hamburger">
        <div class="hamburger-box"><i class="fas fa-bars"></i></div>
      </div>
      <div class="BadMenu">
      
        <div class="MooobMenu">
          <div class="menu-wrapper">
            <nav class="main-nav">

              <ul id="main-menu">
                  <li>
                    <a href="#">استلام  <i class="fas fa-caret-right"></i></a>
                  </li>
                  <li>
                    <a href="#">بيع  <i class="fas fa-caret-right"></i></a>
                  </li>

                  <li>
                    <a href="#">مرتجع  <i class="fas fa-caret-right"></i></a>
                  </li>
                  <li>
                    <a href="#">تحويل  <i class="fas fa-caret-right"></i></a>
                  </li>
                  <li>
                    <a href="#">نقدية  <i class="fas fa-caret-right"></i></a>
                  </li>
              </ul><!-- main-menu -->
            </nav><!-- main-nav -->
          </div><!-- menu-wrapper -->
        </div>
      </div>


    </div><!-- container -->
  </header>