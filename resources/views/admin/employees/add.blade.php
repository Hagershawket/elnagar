@extends('admin.master')
@section('title','اضافة موظف')
@section('css')

@endsection
@section('header_title','اضافة موظف')
@section('content')

    {{-- write code here--}}
  
        <div class="row">
          <div class="col-sm-6">
           
            <div class="dainfo">
              <h3> اضافة موظف </h3>
            </div>
          </div>
        </div>

      
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                            <form method="post" action="{{route('employees.store')}}" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail4"><strong>الاسم *</strong></label>
                                    <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="اكتب اسم الموظف" value="{{ Request::old('name') }}">
                                    @error('name')
                                    <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                    </div> 
                                  @enderror
                                </div>
                                <div class="col-md-4">
                                    <label><strong>الرقم الوظيفى *</strong></label>
                                    <input type="text" class="form-control" name="job_num" value="{{ Request::old('job_num') }}">
                                    <div class="form-group" style="margin-top: -39px; margin-right: 248px;"> 
                                      <button id="genbutton" type="button" class="btn btn-secondary"> اقترح </button>   
                                    </div>
                                    @error('job_num')
                                      <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                      </div> 
                                   @enderror
                                </div>
                                  <div class="form-group col-md-4">
                                    <label><strong>رقم الهاتف</strong></label>
                                    <input type="text" class="form-control" name="phone">
                                  </div>
                                  <div class="col-md-8">
                                    <label ><strong>العنوان </strong></label>
                                    <input type="text" class="form-control" name="address">
                                  </div>
                                  <div class="col-md-4">
                                    <label ><strong> الرقم القومى</strong></label>
                                    <input type="number" class="form-control" name="national_num">
                                  </div>
                                 
                                </div>
                            </div>
                            
                            <div class="row card-body">
                                <div class="form-group col-md-4">
                                    <label for="inputState"><strong>البلد </strong></label>
                                    <select  name="country_id" class="form-control">
                                      <option value="" selected>اختر البلد التابع لها الفرع</option>
                                      @foreach ($countries as $country)
                                      <option value="{{$country->id}}">{{$country->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                              <div class="form-group col-md-4">
                                <label for="inputState"><strong>اسم الفرع </strong></label>
                                <select  name="branch_id" class="form-control">
                                  <option value="" selected>اختر الفرع التابع له الموظف</option>
                                  @foreach ($branches as $branch)
                                  <option value="{{$branch->id}}">{{$branch->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputState"><strong> النوع *</strong></label>
                                <select  name="type" class="form-control">
                                  <option value="" selected>اختر النوع</option>
                                  <option value="1">كاشير</option>
                                  <option value="2">ادارى</option>
                                  <option value="3">دليفرى</option>
                                  <option value="4">سوشيال </option>
                                </select>
                                  @error('type')
                                    <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                    </div> 
                                  @enderror 
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputState"><strong> المسمى الوظيفى </strong></label>
                                <input type="text" name="job_title" class="form-control">
                              </div>
                              <div class="col-md-4" style="float: right; !important;">
                                <label><strong>رفع صورة المستخدم </strong></label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div> 
                                @enderror
                              </div>
                              <div class="col-md-4">
                                <label ><strong> الرقم التأمينى</strong></label>
                                <input type="number" class="form-control" name="insurance_num">
                              </div>
                              <div class="col-md-4">
                                <label ><strong> حالة الموظف</strong></label>
                                <select  name="status" class="form-control">
                                    <option value="" selected>اختر الحالة</option>
                                    <option value="دائم">دائم</option>
                                    <option value="مؤقت">مؤقت</option>
                                </select>                              
                            </div>
                                <div class="col-md-4" style="float: right; margin-top: 10px; !important;">
                                    <label><strong>رفع شهادة التأمين الصحى </strong></label>
                                    <input type="file" name="file" class="form-control">
                                    @error('file')
                                    <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                    </div> 
                                  @enderror
                                </div>
                                <div class="form-group col-md-4" style="margin-top: 10px; !important;">
                                  <label for="inputState"><strong>تاريخ بداية الشهادة </strong></label>
                                  <input type="date" name="start_date" class="form-control">
                                  @error('start_date')
                                    <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                    </div> 
                                  @enderror
                                </div>
                                <div class="form-group col-md-4" style="margin-top: 10px; !important;">
                                    <label for="inputState"><strong>تاريخ نهاية الشهادة </strong></label>
                                    <input type="date" name="end_date" class="form-control">
                                    @error('end_date')
                                    <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                    </div> 
                                   @enderror
                                  </div>

                                  <div class="col-md-4" style="float: right; margin-top: 10px; !important;">
                                    <label><strong> تاريخ التعيين </strong></label>
                                    <input type="date" name="hiring_date" class="form-control">
                                </div>
                                <div class="form-group col-md-4" style="margin-top: 10px; !important;">
                                  <label for="inputState"><strong>تاريخ بداية العمل </strong></label>
                                  <input type="date" name="start_work_date" class="form-control">
                                </div>
                                <div class="form-group col-md-4" style="margin-top: 10px; !important;">
                                    <label for="inputState"><strong> الراتب </strong></label>
                                    <input type="text" name="payroll" class="form-control">
                                  </div>

                                  <div class="col-md-4" style="float: right; margin-top: 10px; !important;">
                                    <label><strong>  عدد الاجازات المسموح بها </strong></label>
                                    <input type="text" name="off_day" class="form-control">
                                </div>
                                <div class="col-md-4" style="float: right; margin-top: 10px; !important;">
                                  <label><strong>  عدد ايام العمل في الشهر *</strong></label>
                                  <input type="number" name="working_days" class="form-control">
                                  @error('working_days')
                                    <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                    </div> 
                                  @enderror
                              </div>
                              <div class="col-md-4" style="float: right; margin-top: 10px; !important;">
                                <label><strong>  عدد ساعات العمل في اليوم *</strong></label>
                                <input type="number" name="work_hours" class="form-control">
                                @error('work_hours')
                                    <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                    </div> 
                                @enderror
                            </div>
                                <div class="form-group col-md-4" style="margin-top: 10px; !important;">
                                  <label for="inputState"><strong>  كلمة المرور  *</strong></label>
                                  <input type="text" class="form-control" name="password">  
                                  <div class="form-group" style="margin-top: -39px; margin-right: 248px;"> 
                                    <button id="genpass" type="button" class="btn btn-secondary"> اقترح </button>   
                                  </div>  
                                  @error('password')
                                    <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                    </div> 
                                  @enderror               
                              </div>  
                                <div class="form-group col-md-4" style="margin-top: 40px; !important;">
                                    <label for="inputState"><strong>  خاضع للحضور والانصراف </strong></label>
                                    <input class="mt-2" type="checkbox" name="attendance_status" value="1" checked>
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
<script>
  $('#genpass').on("click", function(){
      $.get('genpass', function(data){
        $("input[name='password']").val(data);
      });
    });

    $('#genbutton').on("click", function(){
      $.get('genpass', function(data){
        $("input[name='job_num']").val(data);
      });
    });
</script>
@endsection