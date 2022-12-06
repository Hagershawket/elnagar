{{-- <div class="preloader">
  <div class="clear-loading loading-effect-2">
    <span></span>
  </div>
</div> --}}

<div class="header">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-6 col-lg-5">
          <div class="header-left">
            <a href="{{url('/')}}" class="logo">
              <?php $setting = App\Models\Setting::first();?>
              <img src="{{asset($setting->system_logo)}}" width="50" height="50" alt="">
            </a>
          </div>
          <div class="page-title-box">
            <h3><a href="#">@yield('header_title')</a></h3>
          </div>
        </div>
        <div class="col-md-12 col-sm-6 col-lg-7">

          <ul class="nav navbar-nav user-menu">
            {{-- <li class="dropdown hidden-xs">
              <a href="{{route('notifications.view')}}" class="elloo">
                <i class="fa fa-bell"></i>
                <span class="badge bg-primary pull-right">{{App\Models\Holiday::where('is_approved',2)->count()}}</span>
              </a>
            </li> --}}

            <li class="dropdown">
              <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i>
                <span class="badge bg-primary pull-right">{{count(Auth::user()->unreadnotifications)}}</span>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a href="{{route('notifications.view')}}">  <p class="f-w-700 mb-0">You have {{count(Auth::user()->unreadnotifications)}} Notifications</p>
                  </a>
                @foreach(Auth::user()->unreadnotifications as $notification)
                <?php  $user= App\Models\User::find($notification->data['user_id'])?>
                  <a class="dropdown-item" href="{{route('holidays.index')}}">{{$notification->data['body']}} {{$user->name}}</a>
                @endforeach
              </div>
            </li>
            
            
            {{-- <li class="dropdown hidden-xs">
              <a href="#" id="open_msg_box" class="hasnotifications">
                <i class="fa fa-comment"></i> 
                <span class="badge bg-primary pull-right">4</span>
              </a>
            </li> --}}
            <li class="dropdown opweee">
              <a href="#" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
                <span class="user-img">
                  <img class="img-circle" src="{{asset('public/admin/assets/mona/assets/img/user.jpg')}}" width="30" alt="Admin">
                </span>
                <span>{{Auth::guard('')->user()->name}}</span>
                <i class="caret"></i>
              </a>
              <?php $user = Auth::user(); ?>
              <ul class="dropdown-menu">
                <li><a href="#">ملفي</a></li>
                @if(isset($user))<li><a href="{{route('Logout')}}">تسجيل الخروج</a></li>@else<li><a href="">###</a></li>@endif
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </a>
      <div class="dropdown mobile-user-menu pull-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-ellipsis-v"></i>
        </a>
        <ul class="dropdown-menu pull-right">
          <li><a href="#">ملفي</a></li>
          <li><a href="#">ملفي</a></li>
        </ul>
      </div>
    </div>
  </div>