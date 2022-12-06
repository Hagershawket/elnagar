@extends('admin.master')
@section('title','تقرير حضور وانصراف الموظف')
@section('css')

@endsection
@section('header_title','تقرير حضور وانصراف الموظف')
@section('content')


  <div class="row">
    <div class="col-sm-6">
      <div class="dainfo">
        <h3>تقرير حضور وانصراف الموظف</h3>
      </div>
    </div>
  </div>


    <form method="post" action="{{route('employeeReportByDate')}}">
      @csrf


      <div class="row g-3">
        <div class="col-md-4">
          <label>البحث ب اسم الموظف </label>
          <?php $employees = App\Models\Employee::get();?>
          <select name="employeeName" class="form-control">
            <option value="">اختر اسم الموظف</option>
            @foreach ($employees as $employee)
              <option value="{{$employee->id}}">{{$employee->name}}</option>
            @endforeach
          </select>
          @error('employeeName')
          <div class="alert alert-danger" role="alert">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="col-md-4">
          <label>من الفترة</label>
          <input type="date" class="form-control" name="startDate" required>
        </div>
        <div class="col-md-3">
          <label> الي الفترة</label>
          <input type="date" class="form-control" name="endDate" required>
        </div> 
        <div class="col-md-1" style="margin: 31px 0px;">
          <button class="btn btn-info" type="submit">بحث</button>
        </div>                  
      </div>
    </form>

    <div class="counteriesoff">
      <div class="row">
        <div class="col-md-12 col-sm-12 pl-0">
        <table id="example" class="display nowrap" style="width:100%">
          <thead>
              <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">الرقم الوظيفي</th>
                <th style="text-align: center">اسم الموظف</th>
                <th style="text-align: center">الفرع</th>
                <th style="text-align: center"> المرتب</th>
                <th style="text-align: center"> مدة التاخير</th>
                <th style="text-align: center"> قيمة التاخير</th>
                <th style="text-align: center">خصم</th>
                <th style="text-align: center">مكافأت</th>
                <th style="text-align: center">الصافي</th>
              </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($employees as $employee)
            <tr style="text-align: center">
                <td>{{$i++}}</td>
                <td>{{$employee->job_num}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->branch ? $employee->branch->name : ''}}</td>
                <td>{{$employee->payroll}}</td>
                <?php $timeLate = App\Models\Attendance::where('employee_id',$employee->id)->sum('late_time') ?>
                @if($timeLate % 60 == 0)
                  <td style="color: #22e922">لا يوجد تاخير</td>
                @else
                  <td> <span>{{floor($timeLate / 60) }} ساعة</span><span> / {{$timeLate % 60 }} دقيقة</span> </td>
                @endif
                <?php 
                    $totalHour = $employee->working_days  * $employee->work_hours;
                    if($totalHour == 0) $totalHour = 1;
                    $hourPrice = round($employee->payroll / $totalHour );
                    $discountValue = round(($hourPrice/60)*$timeLate);
                ?>
                <td>{{$discountValue}}</td>
                <?php $discount =App\Models\DiscountBonus::where(['employee_id'=> $employee->id,'type'=>0])->sum('amount'); ?>
                <td>{{$discount}}</td>
                <?php $bonus = App\Models\DiscountBonus::where(['employee_id'=> $employee->id,'type'=>1])->sum('amount'); ?>
                <td>{{$bonus}}</td>
                <?php $total = $employee->payroll - ($discount + $discountValue) ;
                     $net = $bonus + $total;
                ?>
                <td>{{$net}}</td>
            </tr>
            
            @endforeach
              
          </tbody>
      </table>
      </div>
        </div>


    
      </div>
 
@endsection
@section('scripts')
  @include('sweetalert::alert')

<script type="text/javascript">

  </script>
@endsection