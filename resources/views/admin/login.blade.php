<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>تسجيل الدخول</title>
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.png')}}">
    <link href="public/admin/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/admin/assets/css/slick.css" />
    <link href="public/admin/assets/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/admin/assets/css/slick-theme.css" />
    <link href="public/admin/assets/css/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/admin/assets/css/intlTelInput.css">
    <link rel="stylesheet" type="text/css" href="public/admin/assets/css/isValidNumber.css">


    <link rel="stylesheet" href="public/admin/assets/mona/jave2/owl.theme.default.min.css">
    <link rel="stylesheet" href="public/admin/assets/mona/jave2/owl.carousel.min.css">

    <link rel="stylesheet" type="text/css" href="public/admin/assets/mona/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/admin/assets/mona/assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/admin/assets/mona/assets/plugins/light-gallery/css/lightgallery.min.css">
    <link rel="stylesheet" type="text/css" href="public/admin/assets/mona/assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
</head>

<body>


    <!-- Login 16 section start -->
  <div class="login-16">
    <div class="container">
      <div class="row login-box">
        <div class="col-lg-6 form-section">
          <div class="form-inner">
            <a href="#" class="logo">
              <img src="public/admin/assets/mona/assets/img/logo.png" width="40" height="40" alt="">
            </a>
            <h3>تسجيل الدخول إلى حسابك</h3>
            <form action="{{route('adminLogin')}}" method="POST" id="commonForm">
                @csrf
              <div class="form-group position-relative clearfix">
                <input name="job_num" class="form-control" placeholder="الرقم الوظيفي">
              </div>
              <div class="form-group clearfix position-relative password-wrapper">
                <input name="password" type="password" class="form-control" autocomplete="off" placeholder="كلمة المرور">
              </div>
              {{-- <div class="checkbox form-group clearfix">
                <div class="form-check pull-right">
                  <input class="form-check-input" type="checkbox" id="rememberme">
                  <label class="form-check-label" for="rememberme">تذكرنى</label>
                </div>
                <a href="#" class="link-light pull-left forgot-password">نسيت رقمك السري؟</a>
              </div> --}}
              <div class="form-group clearfix mb-0">
                <button type="submit" class="btn btn-primary btn-lg btn-theme">تسجيل الدخول</button>
              </div>
              {{-- <div class="extra-login clearfix">
                <span>أو تسجيل الدخول باستخدام</span>
              </div> --}}
            </form>
            {{-- <div class="social-list clearfix">
              <div class="icon facebook">
                <div class="tooltip">Facebook</div>
                <span><i class="fab fa-facebook"></i></span>
              </div>
              <div class="icon twitter">
                <div class="tooltip">Twitter</div>
                <span><i class="fab fa-twitter"></i></span>
              </div>
              <div class="icon instagram">
                <div class="tooltip">Google</div>
                <span><i class="fab fa-google"></i></span>
              </div>
              <div class="icon github mr-0">
                <div class="tooltip">Linkedin</div>
                <span><i class="fab fa-linkedin"></i></span>
              </div>
            </div> --}}
            {{-- <p>ليس لديك حساب؟<a href="#" class="thembo">سجل هنا</a></p> --}}
          </div>
        </div>
        <div class="col-lg-6 bg-img">
          <div class="photo">
            <img src="public/admin/assets/mona/assets/img/nagerrrr.jpeg" alt="logo" class="w-100 img-fluid">
          </div>
        </div>
      </div>
    </div>
    <div class="ocean">
      <div class="wave"></div>
      <div class="wave"></div>
    </div>
  </div>
<!-- Login 16 section end -->




 
  <script src="public/mona/assets/js/vendor/vendor.min.js"></script>
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script> 
    <script src="public/js/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="public/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="public/js/slick.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>

    <script src="public/js/intlTelInput.js"></script>
    <script src="public/js/intlTelInput-jquery.js"></script>
    <script src="public/js/phone.js"></script>



    <script type="text/javascript" src="public/admin/assets/mona/assets/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="public/admin/assets/mona/assets/plugins/light-gallery/js/lightgallery-all.min.js"></script>
    <script type="text/javascript" src="public/admin/assets/mona/assets/js/app.js"></script>
    <script src="public/mona/jave/owl.carousel.min.js"></script>

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

     <!-- Resources -->
  <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
  @include('sweetalert::alert')
   

</body>