@extends('admin.master')
@section('title','اشعارات')
@section('css')
@endsection
@section('header_title','اشعارات')
@section('content')


  <div class="row">
    <div class="col-sm-6">
      <div class="dainfo">
        <h3> لديك {{count(Auth::user()->unreadnotifications)}} اشعارات </h3>
      </div>
    </div>
    <div class="col-md-12 col-sm-6 col-lg-6">
      <div class="butonmodr text-left">
        <a href="{{route('notifications.readAll' )}}" class="pull-right btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> تحديد الكل كا مقروء </a>
      </div>
    </div>  
  </div>

    <div class="page-header">
      <div class="row">
       
        <div class="col-sm-12 col-xl-12">
        <div class="card">
          <div class="card-body">
            <div class="list-group">
            @foreach($notifications as $notification)
                <a class="list-group-item list-group-item-action flex-column align-items-start " href="#">
                <div class="d-flex w-100 justify-content-between">
                  <?php  $user= App\Models\User::find($notification->data['user_id'])?>
                  <h5 class="mb-1">{{$notification->data['title']}}</h5><small>{{date('d-m-y g:i:a',strtotime($notification->data['created_at']))}} </small>
                </div>
                <p class="mb-1">{{$notification->data['body']}} {{$user->name}}</p>
                <small><a href="{{route('notifications.read' ,$notification->id)}}"><i class="fa fa-check" aria-hidden="true"></i> تحديد كا مقروءة</a></small>
                </a>
               
                @endforeach
          </div>
        </div>
      </div>
     
        </div>
  </div>
  <!-- Container-fluid Ends-->


@endsection
@section('scripts')
  @include('sweetalert::alert')
@endsection