@extends('admin.master')
@section('title','تعديل موظف')
@section('css')

@endsection
@section('header_title','تعديل موظف')
@section('content')

        <div class="row">
          <div class="col-sm-6">
            <div class="dainfo">
              <h3> تعديل موظف </h3>
            </div>
          </div>
          <div class="col-md-12 col-sm-6 col-lg-6">
            <div class="butonmodr text-left">
              <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-edit"></i>تحديث رقم الجهاز</a>            
            </div>
          </div> 
        </div>

      
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                            <form method="post" action="{{route('employees.update',$employee->id)}}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail4"><strong>الاسم *</strong></label>
                                    <input type="text" name="name" class="form-control" value="{{$employee->name}}">
                                    @error('name')
                                      <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                      </div> 
                                    @enderror 
                                    <input type="hidden" name="id" value="{{$employee->id}}">
                                </div>
                                <div class="col-md-4">
                                    <label><strong>الرقم الوظيفى *</strong></label>
                                    <input type="text" class="form-control" name="job_num" value="{{$employee->job_num}}">
                                    @error('job_num')
                                      <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                      </div> 
                                    @enderror 
                                </div>
                                  <div class="form-group col-md-4">
                                    <label><strong>رقم الهاتف</strong></label>
                                    <input type="text" class="form-control" name="phone" value="{{$employee->phone}}">
                                  </div>
                                  <div class="col-md-8">
                                    <label ><strong>العنوان </strong></label>
                                    <input type="text" class="form-control" name="address" value="{{$employee->address}}">
                                  </div>
                                  <div class="col-md-4">
                                    <label ><strong> الرقم القومى</strong></label>
                                    <input type="number" class="form-control" name="national_num" value="{{$employee->national_num}}">
                                  </div>
                                 
                                </div>
                            </div>
                            <?php $employee_country = $employee->country ? $employee->country->id : '';?>
                            <div class="row card-body">
                                <div class="form-group col-md-4">
                                    <label for="inputState"><strong>البلد </strong></label>
                                    <select  name="country_id" class="form-control">
                                      <option value="">اختر البلد التابع لها الفرع</option>
                                      @foreach ($countries as $country)
                                      <option value="{{$country->id}}" @if($country->id == $employee_country) selected @endif>{{$country->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                              <?php $employee_branch = $employee->branch ? $employee->branch->id : '';?>
                              <div class="form-group col-md-4">
                                <label for="inputState"><strong>اسم الفرع </strong></label>
                                <select  name="branch_id" class="form-control">
                                  <option value="">اختر الفرع التابع له الموظف</option>
                                  @foreach ($branches as $branch)
                                  <option value="{{$branch->id}}" @if($branch->id == $employee_branch) selected @endif>{{$branch->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputState"><strong> النوع *</strong></label>
                                <select  name="type" class="form-control">
                                  <option value="">اختر النوع</option>
                                  <option value="1" @if($employee->type == '1') selected @endif>كاشير</option>
                                  <option value="2" @if($employee->type == '2') selected @endif>ادارى</option>
                                  <option value="3" @if($employee->type == '3') selected @endif>ديلفيرى</option>
                                  <option value="4" @if($employee->type == '4') selected @endif>سوشيال</option>
                                </select>
                                @error('type')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div>
                                @enderror
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputState"><strong> المسمى الوظيفى </strong></label>
                                <input type="text" name="job_title" class="form-control" value="{{$employee->job_title}}">
                              </div>
                              <div class="col-md-4" style="float: right; !important;">
                                <label><strong>رفع صورة المستخدم </strong></label>
                                <img width="50" src="{{asset($employee->image ? $employee->image : 'images/zummXD2dvAtI.png') }}"> 
                                <input type="file" name="image" class="form-control">
                              </div>
                              <div class="col-md-4">
                                <label ><strong> الرقم التأمينى</strong></label>
                                <input type="number" class="form-control" name="insurance_num" value="{{$employee->national_num}}">
                              </div>
                              <div class="col-md-4">
                                <label ><strong> حالة الموظف</strong></label>
                                <select  name="status" class="form-control">
                                    <option value="">اختر الحالة</option>
                                    <option value="دائم" @if($employee->status == 'دائم') selected @endif>دائم</option>
                                    <option value="مؤقت" @if($employee->status == 'مؤقت') selected @endif>مؤقت</option>
                                </select>                              
                            </div>
                                <div class="col-md-4" style="float: right; margin-top: 10px; !important;">
                                    <label><strong>رفع شهادة التأمين الصحى </strong></label>
                                    <img width="50" src="{{asset($document ? $document->file : 'images/zummXD2dvAtI.png') }}"> 
                                    <input type="file" name="file" class="form-control">
                                    @error('file')
                                      <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                      </div> 
                                    @enderror
                                </div>
                                <div class="form-group col-md-4" style="margin-top: 10px; !important;">
                                  <label for="inputState"><strong>تاريخ بداية الشهادة </strong></label>
                                  <input type="date" name="start_date" class="form-control" value="{{$document->start_date ?? ''}}">
                                  @error('start_date')
                                      <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                      </div> 
                                  @enderror
                                </div>
                                <div class="form-group col-md-4" style="margin-top: 10px; !important;">
                                    <label for="inputState"><strong>تاريخ نهاية الشهادة </strong></label>
                                    <input type="date" name="end_date" class="form-control" value="{{$document->end_date ?? ''}}">
                                    @error('end_date')
                                      <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                      </div> 
                                    @enderror
                                  </div>

                                  <div class="col-md-4" style="float: right; margin-top: 10px; !important;">
                                    <label><strong> تاريخ التعيين </strong></label>
                                    <input type="date" name="hiring_date" class="form-control" value="{{$employee->hiring_date ?? ''}}">
                                </div>
                                <div class="form-group col-md-4" style="margin-top: 10px; !important;">
                                  <label for="inputState"><strong>تاريخ بداية العمل </strong></label>
                                  <input type="date" name="start_work_date" class="form-control" value="{{$employee->start_work_date ?? ''}}">
                                </div>
                                <div class="form-group col-md-4" style="margin-top: 10px; !important;">
                                    <label for="inputState"><strong> الراتب </strong></label>
                                    <input type="text" name="payroll" class="form-control" value="{{$employee->payroll}}">
                                  </div>

                                  <div class="col-md-4" style="float: right; margin-top: 10px; !important;">
                                    <label><strong>  عدد الاجازات المسموح بها </strong></label>
                                    <input type="text" name="off_day" class="form-control" value="{{$employee->off_day}}">
                                </div>
                                <div class="col-md-4" style="float: right; margin-top: 10px; !important;">
                                  <label><strong>  عدد ايام العمل في الشهر *</strong></label>
                                  <input type="number" name="working_days" class="form-control" value="{{$employee->working_days}}">
                                  @error('working_days')
                                    <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                    </div> 
                                  @enderror
                              </div>
                              <div class="col-md-4" style="float: right; margin-top: 10px; !important;">
                                <label><strong>  عدد ساعات العمل في اليوم *</strong></label>
                                <input type="number" name="work_hours" class="form-control" value="{{$employee->work_hours}}">
                                @error('work_hours')
                                    <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                    </div> 
                                @enderror
                            </div>
                                <div class="form-group col-md-4" style="margin-top: 10px; !important;">
                                  <label for="inputState"><strong>  تغيير كلمة المرور </strong></label>
                                  <input type="text" name="password" class="form-control">
                                  @error('password')
                                    <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                    </div> 
                                  @enderror 
                                </div>
                                <div class="form-group col-md-4" style="margin-top: 40px; !important;">
                                    <label for="inputState"><strong>  خاضع للحضور والانصراف </strong></label>
                                    <input class="mt-2" type="checkbox" name="attendance_status" value="1" @if($employee->attendance_status) checked @endif>
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

<!-- Edit Modal Start -->
<div class="countermodel contentmoder">

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="heading-title">تحديث رقم الجهاز</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        </div>
        <div class="modal-body">
          <div class="cobtervvvbb">
            <div class="bd-examplepl">
              <form action="{{route('employees.edit.device',$user->id)}}" method="POST">
                    @csrf
                <div class="row">
                  <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                    <label> رقم الجهاز</label>
                    <div class="controlsopop">
                      <i class="fas fa-user"></i>
                      <input type="text" name="device_id" class="form-control" value="{{$user->device_id}}">
                    </div>
                  </div>
                  <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                    <div class="buttonofff">
                      <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">غلق</button>              
                      <button type="submit" class="btn btn-info">حفظ</button>
                    </div>
                  </div>
                </div>
              </form>
            </div><!-- bd-examplepl -->
          </div><!-- cobtervvvbb -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal end -->    

@endsection
@section('scripts')
@endsection