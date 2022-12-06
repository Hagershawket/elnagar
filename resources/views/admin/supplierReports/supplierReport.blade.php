@extends('admin.master')
@section('title','تقارير المورد')
@section('css')
<style>
  
  /* Style the tab */
  .tab {
    overflow: hidden;
    border: 1px solid #292f3d;
    background-color: #aaadb6;
  }
  
  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: right;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 100px;
    transition: 0.3s;
    font-size: 17px;
  }
  
  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
  }
  
  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #ccc;
  }
  
  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
  }
  </style>
    
@endsection
@section('header_title','تقارير المورد')
@section('content')


        <div class="row">
          <div class="col-sm-6">
           
            <div class="dainfo">
              <h3>تقارير المورد</h3>
            </div>
          </div>
        </div>

        <form method="post" action="{{route('supplierReportByDate')}}">
          @csrf
          <input type="hidden" value="{{$idSupplier}}" name="supplierId">
          <div class="row g-3">
            <div class="col-md-4">
              <label>من الفترة</label>
              <input type="date" class="form-control" name="startDate">
            </div>
            <div class="col-md-4">
              <label> الي الفترة</label>
              <input type="date" class="form-control" name="endDate">
            </div> 
            <div class="col-md-2" style="margin: 31px 0px;">
              <button class="btn btn-info" type="submit">بحث</button>
            </div>
          </div>
        </form>

        <div class="container">
          <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen"><strong>توريدات  <i class="fa fa-money" aria-hidden="true"></i></strong></button>
            <button class="tablinks" onclick="openCity(event, 'Paris')"><strong>سداد <i class="fa fa-credit-card" aria-hidden="true"></i></strong></button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')"><strong> مرتجعات <i class="fa fa-reply-all" aria-hidden="true"></i></strong></button>
            <button class="tablinks" onclick="openCity(event, 'cairo')"><strong> المبلغ المستحق <i class="fa fa-smile-o" aria-hidden="true"></i></strong> </button>
          </div>
          
          <div id="London" class="tabcontent">
            <div class="counteriesoff">
              <div class="row">
                <div class="col-md-12 col-sm-12 pl-0">
                  <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                          <th style="text-align: center">رقم الفاتورة</th>
                          <th style="text-align: center">اسم المورد</th>
                          <th style="text-align: center"> طريقة الدفع</th>
                          <th style="text-align: center"> التاريخ</th>
                          <th style="text-align: center">قيمة الفاتورة</th>
                          <th style="text-align: center"> اسم الموظف</th>
                          <th style="text-align: center">العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchases as $purchase)
                          {{-- <tr data-href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#purchase-details{{$purchase->id}}" style="text-align: center"> --}}
                            <tr>
                            <td>{{$purchase->id}}</td>
                            <td>{{$purchase->supplier->name}}</td>
                            <td>{{$purchase->payment_method}}</td>
                            <td>{{$purchase->date}}</td>
                            <td>{{$purchase->grand_total}}</td>
                            <td>{{$purchase->user->name}}</td>
                            <td>
                              <div class="">
                               <a href="#" style="color: white;" class="action quickview btn btn-sm btn-success view" style="text-align: center" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#purchase-details{{$purchase->id}}"><i class="far fa-eye"></i>مشاهدة</a>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
          <div id="Paris" class="tabcontent">
            <div class="counteriesoff">
              <div class="row">
  
  
                <div class="col-md-12 col-sm-9 pl-0">
                  <table id="example2" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                          <th style="text-align: right">اسم المورد</th>
                          <th style="text-align: right">التاريخ</th>
                          <th style="text-align: right">المبلغ المسدد</th>
                          <th style="text-align: right">طريقة السداد</th>
                          <th style="text-align: right">ملاحظات</th>
                          <th style="text-align: right">العمولة</th>
                          <th style="text-align: right">ايصال السداد</th>
                          <th style="text-align: right">اسم الموظف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paymentsSuppliers as $payment)
                          <tr>
                            <td>
                              {{App\Models\Supplier::where('id',$payment->supplier_id)->first()->name}}
                            </td>
                            
                            <td>{{$payment->date}}</td>
                            <td>{{$payment->amount}}</td>
                            <td>{{App\Models\PaymentMethod::where('id',$payment->payment_method_id)->first()->name}}</td>
                            @if($payment->notes)
                            <td style="text-align: center">{{$payment->notes}}</td>
                            @else
                            <td style="text-align: center;color:#ED6B27; ">لا يوجد ملاحظات</td>
                            @endif
                            <td>{{$payment->commission}}</td>
                            <td><img width="50" src="{{asset($payment->image)}}"></td>
                            <td>{{App\Models\User::where('id',$payment->user_id)->first()->name}}</td>

                          </tr>
                        @endforeach
                    </tbody>
                </table>
        
                </div>
              </div>
            </div>
          </div>
          
          <div id="Tokyo" class="tabcontent">
            <div class="counteriesoff">
              <div class="row">
                <div class="col-md-12 col-sm-12 pl-0">
                  <table id="example3" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                          <th style="text-align: center">رقم المرتجع</th>
                          <th style="text-align: center">رقم فاتورة الشراء</th>
                          <th style="text-align: center">اسم المورد</th>
                          <th style="text-align: center"> تاريخ الاسترجاع</th>
                          <th style="text-align: center">قيمة الفاتورة</th>
                          <th style="text-align: center">ملاحظات </th>
                          <th style="text-align: center"> اسم الموظف</th>
                          <th style="text-align: center">العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($returns as $return)
                          <tr data-href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#purchase-details{{$return->id}}" style="text-align: center">
                            <td>{{$return->id}}</td>
                            <td>{{$return->purchase->id}}</td>
                            <td>{{App\Models\Supplier::where('id',$return->supplier_id)->first()->name}}</td>
                            <td>{{$return->date}}</td>
                            <td>{{$return->grand_total}}</td>
                            @if($return->notes)<td>{{$return->notes}}</td>@else<td style="text-align: center;color:#ED6B27; ">لا يوجد ملاحظات</td>@endif
                            <td>{{$return->user->name}}</td>
                            <td>
                              <div class="">
                               <a href="#" style="color: white;" class="btn btn-sm btn-success" style="text-align: center"><i class="far fa-eye"></i> مشاهدة</a>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>


          <div id="cairo" class="tabcontent">
            <div class="counteriesoff">
              <div class="row">
  
  
                <div class="col-md-12 col-sm-9 pl-0">
                  <table id="example4" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                          <th style="text-align: right">اسم المورد</th>
                          <th style="text-align: right">اجمالي التوريدات</th>
                          <th style="text-align: right">اجمالي السدادات</th>
                          <th style="text-align: right">اجمالي المرتجعات</th>
                          <th style="text-align: right">المبلغ الاساسى</th>
                          <th style="text-align: right">المبلغ المستحق</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                          <tr style="text-align: right">
                            <td>
                              {{App\Models\Supplier::where('id',$idSupplier)->first()->name}}
                            </td>
                            <td>{{$TotalPurchase}}</td>
                            <td>{{$TotalPayment}}</td>
                            <td>{{$TotalReturns}}</td>
                            <td>{{$supplier->due_amount}}</td>
                            <?php $deservedAmount = $TotalPurchase - ($TotalPayment + $TotalReturns) ?>
                            <td style="text-align: center">{{$supplier->due_amount}}</td>
                          </tr>
                       
                    </tbody>
                </table>
        
                </div>
              </div>
            </div>
          </div>
          
        </div>
                    
@endsection
@section('scripts')
<script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  // Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
  </script>
@include('sweetalert::alert')
@endsection