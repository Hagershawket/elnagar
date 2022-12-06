@extends('admin.master')
@section('title','تقرير اجازات')
@section('css')
@endsection
@section('header_title','تقرير اجازات')
@section('content')


  <div class="row">
    <div class="col-sm-6">
      <div class="dainfo">
        <h3>تقرير اجازات {{$employee->name}}</h3>
      </div>
    </div>
  </div>


    <form action="{{route('holidayReportByDate',$employee->id)}}" method="post">
      @csrf
      <div class="row g-3">
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
                <th style="text-align: center">تاريخ بداية الاجازة</th>
                <th style="text-align: center">تاريخ نهاية الاجازة </th>
                <th style="text-align: center">السبب</th>
                <th style="text-align: center">حالة الاجازة</th>
              </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($holidays as $holiday)
            <tr style="text-align: center">
                <td>{{$i++}}</td>
                <td>{{$holiday->employee->job_num}}</td>
                <td>{{$holiday->employee->name}}</td>
                <td>{{$holiday->branch ? $holiday->branch->name : ''}}</td>
                <td>{{$holiday->from_date}}</td>
                <td>{{$holiday->to_date}}</td>
                <td>{{$holiday->reason}}</td>
                <td>@if($holiday->is_approved == 0)<i class="fa fa-bluetooth-b" style="color:#ED6B27;"> تم الرفض </i>@elseif($holiday->is_approved == 1)<i class="fa fa-amazon" style="color:#13ce61;">تم القبول</i>@endif</td>
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
@endsection