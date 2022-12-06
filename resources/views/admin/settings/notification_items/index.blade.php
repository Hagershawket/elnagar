@extends('admin.master')
@section('title', 'الاشعارات')
@section('css')

@endsection
@section('header_title', 'الاشعارات')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3>الاشعارات</h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="butonmodr text-left">
                    <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>اضافة الجديدة
                    </a>
                </div>
            </div>
        </div><!-- row -->

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><strong>{{ $error }}</strong></li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="counteriesoff">
            <div class="row">
                <div class="col-md-12 col-sm-12 pl-0">
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>

                                <th style="text-align:center">فئة الاشعار</th>
                                <th style="text-align:center"> الموظف</th>
                                <th style="text-align:center"> المورد</th>
                                <th style="text-align:center"> الفرع</th>
                                <th style="text-align:center"> التاريخ</th>
                                <th style="text-align:center"> الوقت</th>
                                <th style="text-align:center">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="text-center">{{ $item->NotificationCategory->name }}</td>
                                    <td class="text-center">{{ $item->employee ? $item->employee->name : 'لايوجد' }}</td>
                                    <td class="text-center">{{ $item->supplier ? $item->supplier->name : 'لايوجد' }}</td>
                                    <td class="text-center">{{ $item->branch ? $item->branch->name : 'لايوجد' }}</td>
                                    <td class="text-center">{{ $item->time}}</td>
                                    <td class="text-center">{{ $item->date}}</td>
                                    <td>
                                        <div class="conhhh text-center">
                                            <a href="#" style="color: white;" class="action quickview btn btn-success"
                                                data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $item->id }}"><i
                                                    class="far fa-edit"></i> تعديل </a>
                                            <form action="{{route('notification_items.destroy',$item->id)}}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" style="color: white;" class="btn btn-danger"><i class="fas fa-trash-alt"></i> حذف</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <div class="countermodel contentmoder">

                                    <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="heading-title">تحديث اشعار</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                          </div>
                                          <div class="modal-body">
                                          
                                            <div class="cobtervvvbb">
                              
                              
                                              <div class="bd-examplepl glooo">
                                                <form action="{{route('notification_items.update',$item->id)}}" method="POST">
                                                    @csrf
                                                  <div class="row">
                                                    <p class="italic"><small>الحقول التى تحتوى على
                                                      هذه العلامة (*) حقول مطلوبة.</small></p>
                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                      <label> فئة الاشعار *</label>
                                                      <div class="controlsopop">
                                                      <select name="category_id" class="form-control">
                                                        <option value="">اختر</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id}}" @if($item->NotificationCategory && $item->NotificationCategory->id == $category->id) selected @endif>{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                      </div>
                                                    </div>
                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                      <label>اسم الموظف</label>
                                                      <div class="controlsopop">
                                                      <select name="employee_id" class="form-control">
                                                        <option value="">اختر</option>
                                                        @foreach ($employees as $employee)
                                                            <option value="{{$employee->id}}" @if($item->employee && $item->employee->id == $employee->id) selected @endif>{{$employee->name}}</option>
                                                        @endforeach
                                                    </select>
                                                      </div>
                                                    </div>
                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                      <label>اسم المورد</label>
                                                      <div class="controlsopop">
                                                        <select name="supplier_id" class="form-control">
                                                            <option value="">اختر</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{$supplier->id}}" @if($item->supplier && $item->supplier->id == $supplier->id) selected @endif>{{$supplier->name}}</option>
                                                            @endforeach
                                                        </select>                          
                                                    </div>
                                                    </div>
                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                      <label>اسم الفرع</label>
                                                      <div class="controlsopop">
                                                        <select name="branch_id" class="form-control">
                                                            <option value="">اختر</option>
                                                            @foreach ($branches as $branch)
                                                                <option value="{{$branch->id}}" @if($item->branch && $item->branch->id == $branch->id) selected @endif>{{$branch->name}}</option>
                                                            @endforeach
                                                        </select>                          
                                                    </div>
                                                    </div>
                                                    <div class="form-group col-6 col-md-6 col-lg-6 pr-0 pl-0 labelform">
                                                        <label>التاريخ *</label>
                                                        <div class="controlsopop">
                                                          <input class="form-control" type="date" name="date" value="{{$item->date}}" placeholder="اضافة">
                                                        </div>
                                                      </div>
                                                      <div class="form-group col-6 col-md-6 col-lg-6 pr-0 pl-0 labelform">
                                                        <label>الوقت *</label>
                                                        <div class="controlsopop">
                                                          <input class="form-control" type="time" name="time" value="{{$item->time}}" placeholder="اضافة">
                                                        </div>
                                                      </div>
                              
                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                      <div class="buttonofff">
                                                        <button type="submit" class="btn btn-info">حفظ</button>
                                                        <button type="button" class="btn btn-outline-secondary">الغاء</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </form>
                                              </div><!-- bd-examplepl -->
                                            </div><!-- cobtervvvbb -->
                                          </div>
                                        </div>
                                      </div>
                                    </div><!-- Modal end -->
                                  </div>
                              
                                </div>
                @endforeach
                </tbody>
                </table>

            </div>



        </div>
    <div class="countermodel contentmoder">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="heading-title">اضافة اشعار</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
              </div>
              <div class="modal-body">
              
                <div class="cobtervvvbb">
  
  
                  <div class="bd-examplepl glooo">
                    <form action="{{route('notification_items.store')}}" method="POST">
                        @csrf
                      <div class="row">
                        <p class="italic"><small>الحقول التى تحتوى على
                          هذه العلامة (*) حقول مطلوبة.</small></p>
                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                          <label> فئة الاشعار *</label>
                          <div class="controlsopop">
                          <select name="category_id" class="form-control">
                            <option value="">اختر</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                          </div>
                        </div>
                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                          <label>اسم الموظف</label>
                          <div class="controlsopop">
                          <select name="employee_id" class="form-control">
                            <option value="">اختر</option>
                            @foreach ($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                            @endforeach
                        </select>
                          </div>
                        </div>
                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                          <label>اسم المورد</label>
                          <div class="controlsopop">
                            <select name="supplier_id" class="form-control">
                                <option value="">اختر</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>                          
                        </div>
                        </div>
                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                          <label>اسم الفرع</label>
                          <div class="controlsopop">
                            <select name="branch_id" class="form-control">
                                <option value="">اختر</option>
                                @foreach ($branches as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>                          
                        </div>
                        </div>
                        <div class="form-group col-6 col-md-6 col-lg-6 pr-0 pl-0 labelform">
                            <label>التاريخ *</label>
                            <div class="controlsopop">
                              <input class="form-control" type="date" name="date" placeholder="اضافة">
                            </div>
                          </div>
                          <div class="form-group col-6 col-md-6 col-lg-6 pr-0 pl-0 labelform">
                            <label>الوقت *</label>
                            <div class="controlsopop">
                              <input class="form-control" type="time" name="time" placeholder="اضافة">
                            </div>
                          </div>
  
                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                          <div class="buttonofff">
                            <button type="submit" class="btn btn-info">حفظ</button>
                            <button type="button" class="btn btn-outline-secondary">الغاء</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div><!-- bd-examplepl -->
                </div><!-- cobtervvvbb -->
              </div>
            </div>
          </div>
        </div><!-- Modal end -->
      </div>
  

@endsection
@section('scripts')
    @include('sweetalert::alert')
@endsection
