<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Elngaar Branches</title>
    @include('resturant.layouts.head')
</head>
<body>
  <div class="site-wrapper">
    <section class="fxt-template-animation fxt-template-layout28 loaded"  style="background-image: url({{asset('public/admin/assets/mona/assets/img/bg27-l.jpg')}});">  
      <div class="fxt-content">
        <div class="row align-items-center">

          <div class="col-lg-4 leftonhg px-0">
 
            <div class="row mb-5">
              <div class="col-lg-2 col-md-2"></div>
              <div class="col-lg-10 col-md-10">
                <div class="single-facilities">
                  <a href="{{route('receipt.create')}}">
                    <div class="number">
                      <span><i class="fas fa-file-invoice"></i></span>
                    </div>
                    <div class="facilities-content">
                      <h3>استلام</h3>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-lg-10 col-md-10">
                <div class="single-facilities">
                  <a href="{{route('branches.selling')}}">
                    <div class="number bg-2">
                      <span><i class="fas fa-store-alt"></i></span>
                    </div>
                    <div class="facilities-content">
                      <h3>بيع</h3>
                    </div>
                  </a>
                </div>
              </div>
              <div class=" col-lg-2 col-md-2"> </div>
            </div>
          </div>
          <div class="col-lg-4 px-0">
            <div class="facilities-image">
              <img src="{{asset('public/admin/assets/mona/assets/img/logoolamp.png')}}" alt="image">
            </div>
          </div>
          <div class="col-lg-4 rightover px-0">

            <div class="row mb-5">
              <div class="col-lg-10 col-md-10">
                <div class="single-facilities">
                  <a href="#">
                  <div class="number bg-4">
                    <span><i class="fas fa-sign"></i></span>
                  </div>
                  <div class="facilities-content">
                    <h3>نقدية</h3>
                  </div>
                </a>
                </div>
              </div>
              <div class="col-lg-2 col-md-2"></div>
            </div>
            <div class="row mb-5">
              
              <div class="col-lg-2 col-md-2"></div>
              <div class="col-lg-10 col-md-10">
                <div class="single-facilities">
                  <a href="#">
                  <div class="number bg-5">
                    <span><i class="fab fa-usps"></i></span>
                  </div>
                  <div class="facilities-content">
                    <h3>تحويل</h3>
                  </div>
                </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @include('resturant.layouts.footer-script')
</body>

</html>