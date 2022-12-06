@extends('admin.master')
@section('title','المنصرف من المستودع')
@section('css')

@endsection
@section('header_title','المنصرف من المستودع')
@section('content')


  <div class="row">
    <div class="col-sm-6">
     
      <div class="dainfo">
        <h3>المنصرف من المستودع</h3>
      </div>
    </div>
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="butonmodr text-left">
          <a href="{{route('exports.create')}}" class="action quickview btn btn-info"><i class="fa fa-plus"></i>اضافة اذن صرف </a>
        </div>
      </div>
      
   
    </div>
 {{-- {{DNS1D::getBarcodeHTML('w-100 H-200', 'C128', 2.5, 50);}} --}}
    <div class="counteriesoff">
      <div class="row">
        <div class="col-md-12 col-sm-12 pl-0">
        <table id="example" class="display nowrap" style="width:100%">
          <thead>
              <tr>
                <th style="text-align: center">رقم الاذن</th>
                <th style="text-align: center"> الجهة/الفرع</th>
                <th style="text-align: center"> عدد البوكسات</th>
                <th style="text-align: center"> مندوب التوصيل</th>
                <th style="text-align: center"> تاريخ الانصراف</th>
                <th style="text-align: center">الموظف المستلم</th>
                <th style="text-align: center"> تاريخ الاستلام</th>
                <th style="text-align: center">موظف العملية</th>
                <th style="text-align: center"> ملاحظات</th>
                <th style="text-align: center">العمليات</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($exports as $export)
            <tr>
                <td style="text-align: center">{{$export->id}}</td>
                <td style="text-align: center">{{$export->branch->name}}</td>
                <td style="text-align: center">{{$export->total_boxes}}</td>
                <td style="text-align: center">{{$export->d_employee->name ?? ''}}</td>
                <td style="text-align: center">{{$export->export_date}}</td>
                <td style="text-align: center">{{$export->r_employee->name ?? 'لم يتم التسليم بعد'}}</td>
                <td style="text-align: center">{{$export->received_date ?? 'لم يتم التسليم بعد'}}</td>
                <td style="text-align: center">{{$export->user->name}}</td>
                <td style="text-align: center">{{$export->notes ?? 'لا يوجد'}}</td>
                <td style="text-align: center">
                  {{-- <a data-id={{$export->id}} style="color: white;" class="view btn btn-sm btn-success" style="text-align: center;"><i class="far fa-eye"></i> مشاهدة </a> --}}
                  {{-- <a href="#" style="color: white;" class="action quickview btn btn-primary" data-link-action="quickview" data-bs-toggle="modal" data-bs-target="#print{{ $export->id }}"><i class="fas fa-print"></i> طباعة </a> --}}
                       <a href="{{route('exports.show',$export->id)}}" style="color: white;" class="btn btn-primary"><i class="fas fa-print"></i> طباعة </a>
                </td>
                {{-- <div class="modal fade" id="print{{$export->id}}" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <div class="col-md-6">
                                  <h5 class="modal-title" id="exampleModalLabel">طباعة باركود </h5>
                              </div>
                              <div class="col-md-6">
                                  <button type="button" class="close" style="padding-right:220px;"
                                      data-bs-dismiss="modal" aria-label="Close"><span
                                          aria-hidden="true">x</span></button>
                              </div>
                          </div>
                          <form action="{{route('exports.show',$export->id)}}" method="GET">
                              @csrf
                              <div class="modal-body">
                                  <h4>
                                      هل تريد طباعة الباركود ؟
                                  </h4>
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-info" onClick="PrintReceiptContent('print')">نعم</button>
                                  <button type="button" class=" btn btn-secondary"
                                      data-bs-dismiss="modal" aria-label="Close">لا</button>
        
                              </div>
                          </form>
                      </div>
                  </div>
              </div> --}}
            </tr>
            @endforeach
              
          </tbody>
      </table>
      </div>
        </div>


    
      </div>
    

    <!-- Modal -->
    <div id="purchase-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
      <div role="document" class="modal-dialog">
        <div class="modal-content" style="width: 750px;">
          <div class="container mt-3 pb-2 border-bottom">
              <div class="row">
                <div class="col-md-3">
                  {{-- <button id="print-btn" onclick="window.print()"
                  type="button" class="btn btn-default btn-sm d-print-none" style="font-size: 15px; float:right;"><i class="fa fa-print" style="color:#7c5cc4; font-size: 24px"></i> طباعة</button> --}}
              </div>
              <div class="col-md-6">
                  <h3 id="exampleModalLabel" class="modal-title text-center container-fluid"><img src="{{asset('images/logo.jpeg')}}" width="50" height="50" alt=""></h3>
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
              <div id="purchase-content" class="modal-body"></div>
              <br>
    <div class="container" style="width: 95%">
      <table id="modaldata" class="table table-hover table-bordered product-purchase-list">
        <thead>
            <tr>
              <th> #  </th>
              <th> اسم الصنف</th>
              <th> الوحدة  </th>
              <th>  الكمية </th>
              <th>الكمية المجانية</th>
              <th>  الوزن  </th>
              <th> سعر الوحدة </th>
              <th> الاجمالى </th>   
            </tr>
        </thead>
        <tbody>
      </tbody>
      </table>
              </div>
      <div id="purchase-footer" class="modal-body"></div>
      </div>
    </div>
</div>

@endsection
@section('scripts')
  @include('sweetalert::alert')

<script type="text/javascript">

$(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
           $(document).on('click','.view',function(e){
            var purchase_id = $(this).data('id');
            /**Ajax code**/
            $.ajax({
                type: "POST",
                url:"purchases/purchase-data",
                data:{
                  purchase_id:purchase_id,
                },
                success: function (data) {
                        
                          var purchase = data;
                          purchaseDetails(purchase);
                    }
                });
         });

     }); 

     $("#print-btn").on("click", function(){
          var divToPrint=document.getElementById('purchase-details');
          var newWin=window.open('','Print-Window');
          newWin.document.open();
          newWin.document.write('<link rel="stylesheet" href="<?php echo asset('public/vendor/bootstrap/css/bootstrap.min.css') ?>" type="text/css"><style type="text/css">@media print {.modal-dialog { max-width: 1000px;} }</style><body onload="window.print()">'+divToPrint.innerHTML+'</body>');
          newWin.document.close();
          setTimeout(function(){newWin.close();},10);
    });
    
  function purchaseDetails(purchase)
  {
    var htmlheader = '<strong> فاتورة </strong>    '+purchase['id']+'#';
    var htmltext = '<div class="row"><div class="col-md-6"><div class="float-right"><strong>التاريخ: </strong>'+purchase['date']+'<br><strong>رقم الفاتورة: </strong>'+purchase['id']+'<br><strong>رقم فاتورة المورد: </strong>'+purchase['supplier_invoice_no']+'<br><br></div></div><div class="col-md-6 float-left"><strong>من:</strong><br>'+purchase['supplier']+'<br>'+purchase['reference_no']+'<br>'+purchase['address']+'<br>'+purchase['phone']+'<br>'+'</div></div>';
    $.get('purchases/product_purchase/'+purchase['id'], function(data){
            $(".product-purchase-list tbody").remove();
            var product_name = data[0];
            var unit_name = data[1];
            var qty = data[2];
            var free_qty = data[3];
            var weight = data[4];
            var unit_cost = data[5];
            var subtotal = data[6];
            var newBody = $("<tbody>");
            $.each(product_name, function(index){
                var newRow = $("<tr>");
                var cols = '';
                cols += '<td><strong>' + (index+1) + '</strong></td>';
                cols += '<td>' + product_name[index] + '</td>';
                cols += '<td>' + unit_name[index] + '</td>';
                cols += '<td>' + qty[index] + '</td>';
                cols += '<td>' + free_qty[index] + '</td>';
                cols += '<td>' + weight[index] + '</td>';
                cols += '<td>' + unit_cost[index] + '</td>';
                cols += '<td>' + subtotal[index] + '</td>';
                newRow.append(cols);
                newBody.append(newRow);
            });
            var newRow = $("<tr>");
            cols = '';
            cols += '<td colspan=7 class="text-center"><strong>الاجمـــــــــــــــــالى:</strong></td>';
            cols += '<td>' + purchase['grand_total'] + '</td>';
            newRow.append(cols);
            newBody.append(newRow);

             $("table.product-purchase-list").append(newBody);
        });
        var htmlfooter = '<div class="col-md-6"><div class="float-right"><strong>ملاحظات:</strong> '+purchase['notes']+'</div><br><div class="float-right"><strong>تم انشائها بواسطة:</strong><br>'+purchase['user']+'</div><br></div>';

        $('#purchase-invoice').html(htmlheader);
        $('#purchase-content').html(htmltext);
        $('#purchase-footer').html(htmlfooter);
        $('#purchase-details').modal('show');
  }

  </script>

  {{-- print section --}}
  <script>
    function PrintReceiptContent(el)
    {
        var data = '<input type="button" id="printPageButton" class="printPageButton" style="display:block; width:100%; border:none; background-color: #008B8B; color: #fff; padding: 14px 28px; font-size: 16px; cursor: pointer; text-align: center" value="طباعة الباركود" onClick="window.print()">';
            data += document.getElementById("el").innerHTML;
        myReceipt = window.open("", "myWin", "left=150, top=130, width=400, height=400");
        myReceipt.screnX = 0;
        myReceipt.screnY = 0;
        myReceipt.document.write(data);
        myReceipt.document.title = "طباعة باركود";
        myReceipt.focus();
        setTimeout(() => {
            myReceipt.close();
        }, 9000);

    }
</script>
@endsection