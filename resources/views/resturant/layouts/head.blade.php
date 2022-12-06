<?php $setting = App\Models\Setting::first();?>
<link rel="apple-touch-icon" href="{{asset($setting->system_logo)}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset($setting->system_logo)}}">
<link href="{{asset('public/admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/slick.css')}}" />
<link href="{{asset('public/admin/assets/fontawesome/css/all.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/slick-theme.css')}}" />
<link href="{{asset('public/admin/assets/css/jquery-ui.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/intlTelInput.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/isValidNumber.css')}}">


<link rel="stylesheet" href="{{asset('public/admin/assets/mona/jave2/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/assets/mona/jave2/owl.carousel.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/mona/assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/mona/assets/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/mona/assets/plugins/light-gallery/css/lightgallery.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/mona/assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/mona/assets/css/main.css')}}">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(document).ready( function () {
$('#table_id').DataTable();
  } );
</script>
@yield('css')