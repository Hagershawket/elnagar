@extends('resturant.master')
@section('title','الرئيسية')
@section('css')
    
@endsection
@section('header_title','الرئيسية')
@section('content')

    <div class="kolbutton">
        <ul class="nav nav-tabs nav-tabs-bottom">
            <li class="">
                <a href="{{route('branches.delivery')}}">
                <div class="dash-widget55 ">
                    <span class="dash-widget-icon bg-success">
                        <i class="fas fa-motorcycle"></i>
                    </span>
                    <h3>دليفري</h3>
                </div>
                </a>
            </li>
            <li>
                <a href="{{route('branches.hall')}}">
                <div class="dash-widget55">
                    <span class="dash-widget-icon bg-success">
                        <i class="fas fa-hot-tub"></i>
                    </span>
                    <h3> صالة</h3>
                </div>
                </a>
            </li>
            <li>
                <a href="{{route('branches.takeAway')}}">
                <div class="dash-widget55">
                    <span class="dash-widget-icon bg-success">
                        <i class="fas fa-glass-cheers"></i>
                    </span>
                    <h3> تيك  اواي</h3>
                </div>
                </a>
            </li>
        </ul>
  </div>
@endsection