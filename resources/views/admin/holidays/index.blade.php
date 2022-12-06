@extends('admin.master')
@section('title','طلبات الاجازة')
@section('css')
<style>
  /* Style the buttons */
  .btn {
    border: none;
    outline: none;
    padding: 10px 16px;
    background-color: #f1f1f1;
    cursor: pointer;
    font-size: 18px;
  }
  
  /* Style the active class, and buttons on mouse-over */
  .active, .btn:hover {
    background-color: #666;
    color: white;
  }
</style>
@endsection
@section('header_title','طلبات الاجازة')
@section('content')


  <div class="row">
    <div class="col-sm-6">
     
      <div class="dainfo">
        <h3>طلبات الاجازة</h3>
      </div>
    </div>
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="butonmodr text-left">
          <a href="{{route('holidays.create')}}" class="action quickview btn btn-info"><i class="fa fa-plus"></i>اضافة طلب اجازة </a>
        </div>
      </div>
      
   
    </div>

    <div class="counteriesoff">
      <div class="row">
        <div class="col-md-12 col-sm-12 pl-0">
        <table id="example" class="display nowrap" style="width:100%">
          <thead>
              <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">الرقم الوظيفي</th>
                <th style="text-align: center">اسم الموظف</th>
                <th style="text-align: center"> بداية تاريخ الاجازة</th>
                <th style="text-align: center">نهاية تاريخ الاجازة</th>
                <th style="text-align: center">ملاحظات</th>
                <th style="text-align: center">حالة الطلب</th>
                <th style="text-align: center">العمليات</th>
              </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($holidays as $holiday)
            <tr style="text-align: center">
                <td>{{$i++}}</td>
                <td>{{$holiday->employee->job_num}}</td>
                <td><a href="{{route('holidayReport',$holiday->employee->id)}}" target="_blank">{{$holiday->employee->name}}</a></td>
                <td>{{$holiday->from_date}}</td>
                <td>{{$holiday->to_date}}</td>
                @if($holiday->reason)
                  <td style="text-align: center">{{$holiday->reason}}</td>
                @else
                 <td style="text-align: center;color:#ED6B27; ">لا يوجد ملاحظات</td>
                @endif  
                <td>@if($holiday->is_approved == 0)<i class="fa fa-bluetooth-b" style="color:#ED6B27;"> تم الرفض </i>@elseif($holiday->is_approved == 1)<i class="fa fa-amazon" style="color:#13ce61;">تم القبول</i>@elseif($holiday->is_approved == 2) <i class="fa fa-bluetooth-b" style="color:orange"> قيد المراجعة </i>@endif</td>
                <td>
                  @if($holiday->is_approved == 2)
                    <a href="{{route('holidays.approve',['id'=>$holiday->id,'status'=> 1])}}" style="color: white;" type="submit" class="btn btn-sm btn-success"> قبول</a> 
                    <a href="{{route('holidays.approve',['id'=>$holiday->id,'status'=> 0])}}" style="color: white;" type="submit" class="btn btn-sm btn-danger"> رفض</a> 
                  @else
                  @endif
                </td>
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
  <script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("btn");.
    
    for (var i = 0; i < btns.length; i++) {
      
      btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace("active", "");
      this.className += "active";
      });
    }
    </script>
@endsection