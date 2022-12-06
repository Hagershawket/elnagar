@extends('admin.master')
@section('title','تعديل فرع')
@section('css')

@endsection
@section('header_title','تعديل فرع')
@section('content')

        <div class="row">
          <div class="col-sm-6">
           
            <div class="dainfo">
              <h3> تعديل فرع </h3>
            </div>
          </div>
        </div>

       
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                            <form action="{{route('branches.update',$branch->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{$branch->id}}">
                                <div class="col-md-4">
                                    <label for="inputEmail4"><strong>اسم الفرع *</strong></label>
                                    <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="اكتب اسم الفرع" value="{{$branch->name}}">
                                    @error('name')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div> 
                                @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState"><strong>الدولة *</strong></label>
                                    <select  name="country" class="form-control">
                                      <option value="">اختر الدولة التابع لها الفرع</option>
                                      @foreach ($countries as $country)
                                      <option value="{{$country->id}}" @if($branch->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                      @endforeach
                                    </select>
                                    @error('country')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div> 
                                @enderror
                                  </div>
                                  <div class="col-md-4">
                                    <label><strong>رقم الهاتف *</strong></label>
                                    <input type="text" class="form-control" name="phone" value="{{$branch->phone}}">
                                    @error('phone')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div> 
                                @enderror
                                  </div>
                                  <div class="col-md-12">
                                    <label ><strong>العنوان *</strong></label>
                                    <input type="text" class="form-control" name="address" value="{{$branch->address}}">
                                    @error('address')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div> 
                                @enderror
                                  </div>
                                 
                                </div>
                            </div>
                            
                            <div class="row card-body">
                              <div class="col-md-4">
                                <label ><strong>تكلفة الانشاء *</strong></label>
                                <input type="number" class="form-control" name="cost" value="{{$branch->cost}}">
                                @error('cost')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div> 
                                @enderror
                              </div>
                                <div class="col-md-4">
                                    <label ><strong>بداية تاريخ رخصة التشغيل</strong></label>
                                    <input type="date" class="form-control" name="start_date" value="{{$document->start_date}}">
                                    @error('start_date')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div> 
                                @enderror
                                </div>
                                <div class="col-md-4">
                                    <label ><strong>نهاية تاريخ رخصة التشغيل</strong></label>
                                    <input type="date" class="form-control" name="end_date" value="{{$document->end_date}}">
                                    @error('end_date')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div> 
                                @enderror
                                </div>
                                <div class="col-md-8" style="float: right; margin-top: 10px; !important;">
                                    <label><strong>صورة الرخصة </strong></label>
                                    <img src="{{asset($document->file)}}" width="50px">
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div> 
                                @enderror
                                </div>
                                <div class="form-group col-md-4" style="margin-top: 10px; !important;">
                                  <label for="inputState"><strong>الاصول </strong></label>
                                  <select  name="country_id" class="form-control" id="">
                                    <option value="">اختر البلد التابع لها الفرع</option>
                                  </select>
                                </div>
                                <div class="col-md-4">
                                  <label ><strong>الايجار</strong></label>
                                  <input type="number" class="form-control" name="rent" value="{{$branch->rent}}">
                                  @error('rent')
                                <div class="alert alert-danger" role="alert">
                                  {{$message}}
                                </div> 
                              @enderror
                              </div>
                            </div>                            
                            
                                
                                    
                                
                                
                                <div class="col-md-12">
                                    <div class="form-group buttonofff mt-4">
                                        <input type="submit" value="حفظ" class="btn btn-info">
                                        <button type="button" class="btn btn-outline-secondary" onclick="history.back();">الغاء</button>
                                    </div>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
 
    

@endsection
@section('scripts')


@endsection