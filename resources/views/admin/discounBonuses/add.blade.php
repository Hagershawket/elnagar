@extends('admin.master')
@section('title','اضافة مكافأة او خصم')
@section('css')

@endsection
@section('header_title','اضافة مكافأة او خصم')
@section('content')

        <div class="row">
          <div class="col-sm-6">
            <div class="dainfo">
              <h3> اضافة مكافأة او خصم </h3>
            </div>
          </div>
        </div>
      
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                            <form method="post" action="{{route('discountBonus.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-">
                                    <input type="hidden" name="employee_id" class="form-control employee" id="employee">
                                </div>
                                <div class="col-md-4">
                                    <input type="hidden" name="branch_id" class="form-control">
                                </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail4"><strong>الرقم الوظيفي *</strong></label>
                                    <input type="text" name="job_num" class="form-control " id="job_num">
                                    @error('job_num')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail4"><strong>اسم الموظف *</strong></label>
                                    <input type="text" name="employee_name" class="form-control employee" id="employee" readonly>
                                    @error('employee_id')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail4"><strong>اختر نوع الاضافة *</strong></label>
                                    <select class="form-control" name="type">
                                        <option value="">اختر نوع الاضافة</option>
                                        <option value="0">خصم</option>
                                        <option value="1">مكافأة</option>
                                      </select>
                                      @error('type')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                                  <div class="col-md-4">
                                    <label><strong> تاريخ الاضافة *</strong></label>
                                    <input type="date" class="form-control" name="date">
                                    @error('date')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                  </div>
                                  <div class="col-md-4">
                                    <label ><strong>المبلغ *</strong></label>
                                    <input type="number" class="form-control" name="amount">
                                    @error('amount')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                  </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label class="mr-sm-2" for="validationCustom04"><strong>ملاحظات</strong></label>
                                    <div class="">
                                        <textarea name="notes" class="form-control col-md-12" style="height: 200px"></textarea>
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
                            $('input[name="branch_id"]').val(data.employee.branch_id);                      
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