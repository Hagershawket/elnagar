@extends('admin.master')
@section('title','اضافة الحضور والانصراف')
@section('css')

@endsection
@section('header_title','اضافة الحضور والانصراف')
@section('content')

        <div class="row">
          <div class="col-sm-6">
            <div class="dainfo">
              <h3> اضافة الحضور والانصراف </h3>
            </div>
          </div>
        </div>
      
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                            <form method="post" action="{{route('attendances.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-">
                                    <input type="hidden" name="employee_id" class="form-control employee" id="employee">
                                </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="inputEmail4"><strong>الرقم الوظيفي *</strong></label>
                                    <input type="text" name="job_num" class="form-control " id="job_num">
                                    @error('job_num')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="inputEmail4"><strong>اسم الموظف *</strong></label>
                                    <input type="text" name="employee_name" class="form-control employee" id="employee" readonly>
                                    @error('employee_id')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label><strong> التاريخ *</strong></label>
                                    <input type="date" class="form-control" name="date">
                                    @error('date')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label><strong> وقت الحضور *</strong></label>
                                    <input type="time" class="form-control" name="checkin">
                                    @error('checkin')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label ><strong>وقت الانصراف *</strong></label>
                                    <input type="time" class="form-control" name="checkout">
                                    @error('checkout')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                            </div>
                                <br>
                                <div class="col-md-12">
                                    <label ><strong>اختر الفرع التابع له </strong></label>
                                    <select class="form-control form-select-sm" aria-label=".form-select-sm example" name="branch_id">
                                        <option value="">اختر الفرع التابع له</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label class="mr-sm-2" for="validationCustom04"><strong>ملاحظات</strong></label>
                                    <div class="">
                                        <textarea name="note" class="form-control col-md-12" style="height: 200px"></textarea>
                                    </div>
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
<!-- script for get Employee Name by Job Number -->
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $(document).on('keyup','#job_num',function(e){
                var job_num = $('#job_num').val();
                            
                /**Ajax code**/
                $.ajax({
                type: "POST",
                url:"{{route('employeeName')}}",
                data:{
                    job_num:job_num,
                },
                success: function (data) {
                    
                        if (data.status == true) 
                        {     
                            $('input[name="employee_name"]').val(data.employee.name); 
                            $('input[name="employee_id"]').val(data.employee.id);
                        }
                        else
                        {
                            $('input[name="employee_name"]').val(data.msg); 
                            $('input[name="employee_id"]').val('');
                        }
                    }
                });
            });
        });
    </script>

@endsection