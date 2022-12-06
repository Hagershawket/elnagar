@extends('admin.master')
@section('title',' مشتريات المستودع')
@section('css')

@endsection
@section('header_title',' مشتريات المستودع')
@section('content')


  <div class="row">
    <div class="col-sm-6">
     
      <div class="dainfo">
        <h3>مشتريات المستودع</h3>
      </div>
    </div>
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="butonmodr text-left">
          <a href="{{route('purchase-warehouse.create')}}" class="action quickview btn btn-info"><i class="fa fa-plus"></i>اضافة فاتورة شراء </a>
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
                <th style="text-align: center">رقم الفاتورة</th>
                <th style="text-align: center">اسم المورد</th>
                <th style="text-align: center"> التاريخ</th>
                <th style="text-align: center">قيمة الفاتورة</th>
                <th style="text-align: center"> اجمالى النقدى</th>
                <th style="text-align: center"> اجمالى الآجــل</th>
                <th style="text-align: center">اسم الموظف</th>
                <th style="text-align: center">العمليات</th>
              </tr>
          </thead>
          <tbody>
            <?php $i=1;?>
            @foreach ($purchases as $purchase)
            <tr>
                <td style="text-align: center">{{$i++}}</td>
                <td style="text-align: center">{{$purchase->id}}</td>
                <td style="text-align: center">{{$purchase->supplier->name}}</td>
                <td style="text-align: center">{{$purchase->date}}</td>
                <td style="text-align: center">{{$purchase->grand_total}}</td>
                <td style="text-align: center">{{$purchase->total_cash}}</td>
                <td style="text-align: center">{{$purchase->total_delay}}</td>
                <td style="text-align: center">{{$purchase->user->name}}</td>
                <td style="text-align: center"><a data-id={{$purchase->id}} style="color: white;" class="view btn btn-sm btn-success" style="text-align: center;"><i class="far fa-eye"></i> مشاهدة </a></td>
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
                  <button id="print-btn" onclick="window.print()"
                  type="button" class="btn btn-default btn-sm d-print-none" style="font-size: 15px; float:right;"><i class="fa fa-print" style="color:#7c5cc4; font-size: 24px"></i> طباعة</button>
              </div>
              <div class="col-md-6">
                  <h3 id="exampleModalLabel" class="modal-title text-center container-fluid"><img src="{{asset('images/logo.png')}}" width="50" height="50" alt=""></h3>
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
              <th>  العدد </th>
              <th>عدد مجانى</th>
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
                url:"purchaseWarehouse/purchase-data",
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
    var htmltext = '<div class="row"><div class="col-md-6"><div class="float-right"><strong>التاريخ: </strong>'+purchase['date']+'<br><strong>رقم الفاتورة: </strong>'+purchase['id']+'<br><strong>رقم فاتورة المورد: </strong>'+purchase['supplier_invoice_no']+'<br><strong> اجمالى النقدى: </strong>'+purchase['total_cash']+'<br><strong> اجمالى الآجــل: </strong>'+purchase['total_delay']+'<br><br></div></div><div class="col-md-6 float-left"><strong>اسم المورد:</strong><br>'+purchase['supplier']+'<br><strong> رقم التسجيل الضريبى:</strong><br>'+purchase['reference_no']+'<br>'+purchase['address']+'<br><strong> رقم تليفون المورد:</strong><br>'+purchase['phone']+'<br>'+'</div></div>';
    $.get('purchaseWarehouse/product_purchase/'+purchase['id'], function(data){
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
            cols += '<td colspan=7 class="text-center"><strong>مصـــــــاريف نــــقل</strong></td>';
            cols += '<td>' + purchase['shipping_cost'] + '</td>';
            newRow.append(cols);
            newBody.append(newRow);

            var newRow = $("<tr>");
            cols = '';
            cols += '<td colspan=7 class="text-center"><strong>قـــــيمة شهـــــــــادة تــــــصديـــــر</strong></td>';
            cols += '<td>' + purchase['export_value'] + '</td>';
            newRow.append(cols);
            newBody.append(newRow);

            
            var newRow = $("<tr>");
            cols = '';
            cols += '<td colspan=7 class="text-center"><strong>الاجمـــــــــــــــــالى</strong></td>';
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
@endsection