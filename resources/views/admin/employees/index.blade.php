@extends('admin.master')
@section('title','الموظفين')
@section('css')
    
@endsection
@section('header_title','الموظفين')
@section('content')


    <div class="row">
      <div class="col-md-12 col-sm-6 col-lg-6">
       
        <div class="dainfo">
          <h3>الموظفين</h3>
        </div>
      </div>
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="butonmodr text-left">
          <a href="{{route('employees.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> اضافة موظف </a>
          <a href="#" class="action quickview btn" style="color: white; background:#7c5cc4" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#sendNotificationsAll"><i class="fa fa-bell" aria-hidden="true"></i> ارسال اشعارات للكل </a>
        </div>
      </div>          
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li><strong>{{ $error }}</strong></li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
      <div class="counteriesoff">
        <div class="row">
          <div class="col-md-12 col-sm-12 pl-0">
            <table id="example" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th style="text-align: center">#</th>
                      <th style="text-align: center">الاسم</th>
                      <th style="text-align: center">الرقم الوظيفى</th>
                      <th style="text-align: center"> رقم  الجوال</th>
                      <th style="text-align: center">المسمي الوظيفي</th>
                      <th style="text-align: center"> الدولة</th>
                      <th style="text-align: center"> الفرع</th>
                      <th style="text-align: center">تاريخ التعين</th>
                      <th style="text-align: center"> الراتب</th>
                      <th style="text-align: center">العمليات</th>
                  </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                  @foreach ($employees as $employee)
                    <tr>
                      <td>{{$i++}}</td>
                      <td style="text-align: center">{{$employee->name}}</td>
                      <td style="text-align: center">{{$employee->job_num}}</td>
                      <?php $phone = explode(',',$employee->phone);?>
                      <td style="text-align: center">{{$phone[0]}}</td>
                      <td style="text-align: center">{{$employee->type == 1 ? 'كاشير' : ($employee->type == 2 ? 'ادارى' : ($employee->type == 3 ? 'ديلفيرى' : 'سوشيال'))}} @if($employee->job_title){{'(' . $employee->job_title . ')'}}@endif</td>
                      <td style="text-align: center">{{$employee->country ? $employee->country->name : ''  }}</td>
                      <td style="text-align: center">{{$employee->branch->name?? ''}}</td>
                      <td style="text-align: center">{{$employee->hiring_date}}</td>
                      <td style="text-align: center">{{$employee->payroll}}</td>
                      <td style="text-align: center">
                        <div class="">
                         <a href="{{route('employees.edit',$employee->id)}}" style="color: white;" class="btn btn-sm btn-success"><i class="far fa-edit"></i> تعديل </a>
                         <a href="{{route('employees.stop',['id' => $employee->id, 'status' => $employee->is_active == 1 ? 0 : 1])}}" style="color: white;" type="submit" class="btn btn-sm btn-{{$employee->is_active == 1 ? 'danger' : 'info'}}"> @if($employee->is_active == 1 ) <i class="fas fa-toggle-off"></i>  إيقاف @else '<i class="fas fa-toggle-on"></i> تفعيل @endif</a>
                         <a href="#" style="color: white;" class="action quickview btn btn-info btn-sm" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#DetailsModal{{$employee->id}}"> <i class="fa fa-eye"></i> مشاهدة </a>
                         <a href="#" style="color: white;" class="action quickview btn btn-success btn-sm" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#sendNotification{{$employee->id}}"> <i class="fa fa-bell" aria-hidden="true"></i> ارسال اشعارات </a>
                        </div>
                      </td>
                    </tr>


                    <!--Start Details Modal -->
                    <div  class="modal fade" id="DetailsModal{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content" style="width: 130%">
                            <div class="container mt-3 pb-2 border-bottom">
                            <div class="row">
                              <div class="col-md-3">
                                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">بيانات الموظف</h5>
                            </div>
                            <div class="col-md-6">
                                <h3 id="exampleModalLabel" class="modal-title text-center container-fluid"><img src="{{asset('images/logo.png')}}" width="50" height="50" alt=""></h3>
                            </div>
                            <div class="col-md-3">
                              <button type="button" class="close" style="float:left;" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                            </div>
                            <div class="col-md-12 text-center">
                                <i style="font-size: 15px;"><strong>شركة النجار للاسماك المملحة</strong></i>
                            </div>
                            <div class="col-md-12 text-center" id="purchase-invoice">
                              <i style="font-size: 15px;"></i>
                          </div>
                            </div>
                            </div>
                              <div class="modal-body">
                                <div class="row g-2">
                                  <div class="col-md-6">
                                    <label><strong> اسم الموظف</strong></label>
                                    <span> : </span>
                                    <span style="margin-right: 5px">{{$employee->name}}</span>
                                  </div>
                                </div>
                                <div class="row g-2" style="margin-top: 10px">
                                  <div class="col-md-6">
                                    <strong> العنوان</strong> 
                                      <span> : </span>
                                      <span style="margin-right: 5px">{{$employee->address}}</span>
                                  </div>
                                </div>
                                <div class="row g-2" >
                                  <div class="col-md-6">
                                    <div class="" style="margin-top: 15px">
                                      <strong style="position:relative"> الرقم الوظيفى </strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$employee->job_num}}</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <strong style="position:relative">  رقم الهاتف </strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$employee->phone}}</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <strong style="position:relative">   الرقم التأمينى </strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$employee->insurance_num}}</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <strong style="position:relative">  الرقم القومى </strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$employee->national_num}}</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <strong style="position:relative"> البلد </strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$employee->country->name ?? ''}}</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <strong style="position:relative"> الفرع </strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$employee->branch->name ?? ''}}</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <strong style="position:relative"> النوع</strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$employee->type == 1 ? 'كاشير' : ($employee->type == 2 ? 'ادارى' : ($employee->type == 3 ? 'ديلفيرى' : 'سوشيال'))}} @if($employee->job_title){{'(' . $employee->job_title . ')'}}@endif</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <strong style="position:relative"> الحالة </strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$employee->status}}</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <strong style="position:relative"> الراتب </strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$employee->payroll}}</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <strong style="position:relative"> عدد الاجازات المسموح بها</strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$employee->off_day}}</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <strong style="position:relative"> تاريخ التعيين </strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$employee->hiring_date}}</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <strong style="position:relative"> تاريخ بداية العمل </strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$employee->start_work_date}}</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <?php $startDate = App\Models\Document::where('employee_id',$employee->id)->first()->start_date ??'';?>
                                      <strong style="position:relative"> بدايه تاريخ شهادة التأمين الصحى</strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$startDate}}</span>
                                    </div>
                                    <div class="" style="margin-top: 15px">
                                      <?php $EndDate = App\Models\Document::where('employee_id',$employee->id)->first()->end_date ?? '';?>
                                      <strong style="position:relative"> نهاية تاريخ شهادة التأمين الصحى</strong> 
                                        <span> : </span>
                                        <span style="margin-right: 5px">{{$EndDate}}</span>
                                    </div>
                                    
                                  </div>
                                  
                                  <div class="col-md-6"> 
                                    <span><img src="{{asset($employee->image ? $employee->image : 'images/zummXD2dvAtI.png')}}" style="width: 180px;padding-top: 12px;"></span>
                                    <?php $file = App\Models\Document::where('employee_id',$employee->id)->first()->file ?? ''; ?>
                                    <span><img src="{{asset($file ? $file : 'images/zummXD2dvAtI.png')}}" style="width: 180px;padding-top: 50px;"></span>
                                    {{-- <div><strong style="position:relative;" style="padding-top: 12px;"> شهادة التأمين الصحى</strong> </div> --}}
                                  </div>

                                </div>              
                              </div>
                              <div class="modal-footer">
                                <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                                  غلق</button>
                              </div>
                        </div>
                      </div>
                    </div>
                    <!--End Details Modal -->

                    <!--start Send Notifications per employee Modal -->
                    <div class="contentmoder">
                      <div class="modal fade" id="sendNotification{{$employee->id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="heading-title">ارسال اشعار </h4>
                                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                              aria-hidden="true">x</span></button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="row">
                                          <form action="{{ route('send_notifications',$employee->id) }}" method="POST">
                                              @csrf
                                              <div class="col-md-12 col-sm-12 col-lg-12 pl-0 mb-25 pr-0 pl-0">
                                                  <div class="cobtervvvbb">
                                                      <div class="datapriii">
                                                      </div>
                                                  </div>
                                                  <div class="bd-examplepl">
                                                      <div class="row">
                                                          <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                                                          <div class="form-group col-12 labelform">
                                                              <label> العنوان *</label>
                                                              <div class="controlsopop">
                                                                  <i class="far fa-envelope"></i>
                                                                  <input type="text" name="title" placeholder="اضافة" class="form-control">
                                                                  @error('title')
                                                                    <div class="alert alert-danger" role="alert">
                                                                      {{$message}}
                                                                    </div> 
                                                                  @enderror
                                                              </div>
                                                          </div>
                                                          <div class="form-group col-12 labelform">
                                                              <label>  المحتوى  *</label>
                                                              <div class="controlsopop">
                                                                  <i class="far fa-envelope"></i>
                                                                  <input type="text" name="body" placeholder="اضافة" class="form-control">
                                                                  @error('body')
                                                                    <div class="alert alert-danger" role="alert">
                                                                      {{$message}}
                                                                    </div> 
                                                                  @enderror
                                                              </div>
                                                          </div>
                                                          <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                              <div class="buttonofff">
                                                                  <button type="submit" class="btn btn-info">ارسال</button>
                                                                  <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">غلق</button>              
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div><!-- bd-examplepl -->
                                              </div><!-- cobtervvvbb -->
                                      </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div><!--End Send Notifications per Employee Modal -->
                  @endforeach
              </tbody>
          </table>
          </div>
        </div>
      </div>
  </div>


  <!--start Send Notifications for All Modal -->
  <div class="contentmoder">
    <div class="modal fade" id="sendNotificationsAll" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="heading-title"> ارسال اشعار للكل</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('send_notifications_all') }}" method="POST">
                            @csrf
                            <div class="col-md-12 col-sm-12 col-lg-12 pl-0 mb-25 pr-0 pl-0">
                                <div class="cobtervvvbb">
                                    <div class="datapriii">
                                    </div>
                                </div>
                                <div class="bd-examplepl">
                                    <div class="row">
                                        <p class="italic"><small>الحقول التى تحتوى على
                                            هذه العلامة (*) حقول مطلوبة.</small></p>
                                        <div class="form-group col-12 labelform">
                                            <label> العنوان *</label>
                                            <div class="controlsopop">
                                                <i class="far fa-envelope"></i>
                                                <input type="text" name="title" placeholder="اضافة" class="form-control">
                                                @error('title')
                                                  <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                  </div> 
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-12 labelform">
                                            <label>  المحتوى  *</label>
                                            <div class="controlsopop">
                                                <i class="far fa-envelope"></i>
                                                <input type="text" name="body" placeholder="اضافة" class="form-control">
                                                @error('body')
                                                  <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                  </div> 
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                            <div class="buttonofff">
                                                <button type="submit" class="btn btn-info">ارسال</button>
                                                <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">غلق</button>              
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- bd-examplepl -->
                            </div><!-- cobtervvvbb -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!--End Send Notifications for All Modal -->
@endsection
@section('scripts')
  @include('sweetalert::alert')
@endsection