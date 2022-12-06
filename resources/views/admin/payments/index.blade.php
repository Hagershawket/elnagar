@extends('admin.master')
@section('title','سداد الموردين')
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
@section('header_title','سداد الموردين')
@section('content')

    {{-- write code here--}}

        <div class="row">
          <div class="col-sm-6">
           
            <div class="dainfo">
              <h3>سداد الموردين</h3>
            </div>
          </div>
            <div class="col-md-12 col-sm-6 col-lg-6">
              <div class="butonmodr text-left">
                <a href="{{url(route('payment_suppliers.create'))}}" class="action quickview btn btn-info" ><i class="fa fa-plus"></i>اضافة جديدة </a>
              </div>
            </div>
            
         
          </div>
          {{-- <div id="myDIV">
            <button class="btn">1</button>
            <button class="btn active">2</button>
            <button class="btn">3</button>
            <button class="btn">4</button>
            <button class="btn">5</button>
          </div> --}}
      
          <div class="counteriesoff">
            <div class="row">
              <div class="col-md-12 col-sm-9 pl-0">
                <table id="example" class="display nowrap" style="width:100%">
                  <thead>
                      <tr>
                        <th style="text-align: center">اسم المورد</th>
                        <th style="text-align: center">التاريخ</th>
                        <th style="text-align: center">المبلغ المسدد</th>
                        <th style="text-align: center">طريقة السداد</th>
                        <th style="text-align: center">ملاحظات</th>
                        <th style="text-align: center">العمولة</th>
                        <th style="text-align: center">ايصال السداد</th>
                        <th style="text-align: center">اسم الموظف</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($paymentsSuppliers as $payment)
                        <tr>
                          <td style="text-align: center">{{App\Models\Supplier::where('id',$payment->supplier_id)->first()->name}}</td>
                          <td style="text-align: center">{{$payment->date}}</td>
                          <td style="text-align: center">{{$payment->amount}}</td>
                          <td style="text-align: center">{{App\Models\PaymentMethod::where('id',$payment->payment_method_id)->first()->name}}</td>
                          @if($payment->notes)
                            <td style="text-align: center">{{$payment->notes}}</td>
                            @else
                            <td style="text-align: center;color:#ED6B27; ">لا يوجد ملاحظات</td>
                          @endif
                          <td style="text-align: center">{{$payment->commission}}</td>
                          <td style="text-align: center"><img width="50" src="{{asset($payment->image ?? 'images/zummXD2dvAtI.png') }}"></td>
                          <td style="text-align: center">{{App\Models\User::where('id',$payment->user_id)->first()->name}}</td>

                        </tr>
                      @endforeach
                  </tbody>
              </table>
      
              </div>
            </div>
          </div>
      
        </div>
      

@endsection
@section('scripts')
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
@include('sweetalert::alert')
@endsection