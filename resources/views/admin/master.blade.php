<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title')</title>

        @include('admin.layouts.head')

</head>

<body>
  
  <div class="main-wrapper">
      
        @include('admin.layouts.header')

    <div class="contentoff">
      
        @include('admin.layouts.sidebar')
        <div class="page-wrapper">
          <div class="container-fluid">

              @yield('content')

          </div>
        </div>

      
    </div>
  </div>
    <div class="sidebar-overlay" data-reff=""></div>
    @include('admin.layouts.footer')

    @include('admin.layouts.footer-script')
   

</body>