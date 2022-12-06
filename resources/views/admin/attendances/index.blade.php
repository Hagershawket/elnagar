@extends('admin.master')
@section('title','الحضور والانصراف')
@section('css')

@endsection
@section('header_title','الحضور والانصراف')
@section('content')


  <div class="row">
    <div class="col-sm-6">
     
      <div class="dainfo">
        <h3>الحضور والانصراف</h3>
      </div>
    </div>
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="butonmodr text-left">
          <a href="{{route('attendances.create')}}" class="action quickview btn btn-info"><i class="fa fa-plus"></i>تسجيل حضور </a>
        </div>
      </div>
    </div>

    <div class="row g-3">
      <div class="form-group col-md-4">
        <label><strong>  وقت الدخول المسموح به </strong> <a href="{{route('setting.general')}}"><span style="color: red">  ( للتغيير انتقل للاعدادات ) </span></a></label>
        <input type="text" name="startDate" class="form-control" value="{{$setting->checkin_time}}" disabled>
      </div>
  </div>      
    <div class="counteriesoff">
      <div class="row">
        <div class="col-md-12 col-sm-12 pl-0">
        <table id="example" class="display nowrap" style="width:100%">
          <thead>
              <tr>
                <th style="text-align: center"> # </th>
                <th style="text-align: center">الرقم الوظيفي</th>
                <th style="text-align: center">اسم الموظف</th>
                <th style="text-align: center"> التاريخ</th>
                <th style="text-align: center"> فرع الحضور </th>
                <th style="text-align: center"> وقت الدخول</th>
                <th style="text-align: center"> مدة التاخير </th>
                <th style="text-align: center">وقت الخروج</th>
                <th style="text-align: center">مجموع الساعات</th>
                <th style="text-align: center">ملاحظات</th>
              </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($attendances as $attendance)
            <tr style="text-align: center">
                <td>{{$i++}}</td>
                <td>{{App\Models\Employee::where('id',$attendance->employee_id)->first()->job_num}}</td>
                <td>{{App\Models\Employee::where('id',$attendance->employee_id)->first()->name}}</td>
                <td>{{$attendance->date}}</td>
                <td>@isset($attendance->branch){{$attendance->branch->name}}@endisset</td>
                <td>{{$attendance->checkin}}</td>
                @if($attendance->late_time) <td>{{$attendance->late_time}} دقيقة</td> @else <td style="text-align: center; color:rgb(69, 231, 69);">لا يوجد تأخير</td>@endif
                <td>{{$attendance->checkout}}</td>
                <?php 
                      $checkin = strtotime($attendance->checkin);
                      $checkout = strtotime($attendance->checkout);
                      $diff = $checkin - $checkout;
                      $totalhours = round(abs($diff)/ 60/60);
                ?>
                <td>{{$attendance->checkout ? $totalhours : ''}}</td>
                @if($attendance->note)
                  <td style="text-align: center;">{{$attendance->note}}</td>
                  @else
                  <td style="text-align: center; color:#ED6B27;">لا يوجد ملاحظات</td>
                  @endif
            </tr>
            
            <!-- Modal -->
            
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