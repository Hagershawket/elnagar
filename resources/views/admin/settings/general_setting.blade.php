@extends('admin.master')
@section('title','الاعدادات الرئيسية')
@section('css')

@endsection
@section('header_title','الاعدادات الرئيسية')
@section('content')

        <div class="row">
          <div class="col-sm-6">
           
            <div class="dainfo">
              <h3> الاعددات الرئيسية </h3>
            </div>
          </div>
          </div>

          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                            <form method="post" action="{{route('setting.generalStore')}}" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-md-2"><strong>لوجو السيستم </strong></label>
                                    <img width="50" src="{{asset($setting->system_logo ? $setting->system_logo : 'images/zummXD2dvAtI.png') }}"> 
                                    <input type="file" name="system_logo" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"><strong>وقت الدخول </strong></label>
                                    <input type="time" name="checkin_time" class="form-control " id="inputEmail4" value="{{$setting->checkin_time}}">
                                    @error('checkin_time')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"><strong>وقت الخروج </strong></label>
                                    <input type="time" name="checkout_time" class="form-control " id="inputEmail4" value="{{$setting->checkout_time}}">
                                    @error('checkout_time')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"><strong> قيمة الخصم </strong></label>
                                    <input type="text" name="discount_value" class="form-control " id="inputEmail4" value="{{$setting->discount_value}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"><strong>  رقم واتساب للدعم </strong></label>
                                    <input type="text" name="whatsApp" class="form-control " id="inputEmail4" value="{{$setting->whatsApp}}">
                                    @error('whatsApp')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                            </div>
                                <br>
                                <div class="col-md-12">
                                    <label class="mr-sm-2" for="validationCustom04"><strong>مقالة استرشادية</strong></label>
                                    <div class="">
                                        <textarea name="articles" class="form-control col-md-12" style="height: 200px">{{$setting->articles}}</textarea>
                                    </div>
                                    @error('articles')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                                <br>
                                
                                <div class="col-md-12">
                                    <div class="form-group buttonofff mt-4">
                                        <input type="submit" value="حفظ" class="btn btn-info" style="color: white">
                                        <button type="button" class="btn btn-outline-secondary" onclick="history.back();">الغاء</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('scripts')
@include('sweetalert::alert')
@endsection