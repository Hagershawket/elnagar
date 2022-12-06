@extends('resturant.master')
@section('title','الاستلام')
@section('css')
  <style>
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
  </style>
@endsection
@section('header_title','الاستلام')
@section('content')

<div class="grouponr">
    <div class="row">
      <div class="col-sm-6">
        <div class="dainfo">
          <h3>الاستلام</h3>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="butonmodr text-left">
          <a href="{{ route('receipt.create') }}" class="btn btn-info"> اضافة الجديدة  <i class="fa fa-plus"></i></a>
        </div>
      </div>
    </div>
  <form action="{{route('receipt.store')}}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-12 col-12 form-group">
          <label>رقم اذن الصرف<span style="color:#040202">*</span></label>
          <div class="inputcode">
            <div class="iconantimat"> <i class="fas fa-apple-alt"></i></div>
            <input type="text" class="form-control" name="export_id" id="export_id">
          </div><!-- inputcode -->
        </div>
        <div class="col-md-4 col-12 form-group">
          <label> المندوب <span style="color:#040202">*</span></label>
          <div class="inputcode">
            <div class="iconantimat"><i class="fas fa-hot-tub"></i></div>
            <input type="text" class="form-control" name="delivery_employee" id="delivery_employee" readonly>
          </div><!-- inputcode -->
        </div>
        <div class="col-md-4 col-12 form-group">
          <label>تاريخ الاستلام<span style="color:#040202">*</span></label>
          <div class="inputcode">
            <div class="iconantimat"> <i class="fas fa-apple-alt"></i></div>
            <input type="date" class="form-control" name="received_date">
          </div><!-- inputcode -->
        </div>
        <div class="col-md-4 col-12 form-group">
          <label>الموظف المستلم<span style="color:#040202">*</span></label>
          <div class="inputcode">
            <div class="iconantimat"><i class="fas fa-beer"></i></div>
            <select type="text" name="received_employee" class="form-control">
              <option value="">اختر الموظف</option>
              @foreach ( $employees as $employee)
                <option value="{{$employee->id}}">{{$employee->name}}</option>
              @endforeach
            </select>
          </div><!-- inputcode -->
        </div>
        <div class="col-md-12 col-12 form-group">
          <label> الباركود<span style="color:#040202">*</span></label>
          <div class="inputcode">
            <div class="iconantimat"><i class="fa fa-barcode"></i></div>
            <input type="text" name="barcode" class="form-control barcode" id="barcode" placeholder="قم بادخال الباركود ثم اختر...">
            <div id="barcodeList"></div>
          </div><!-- inputcode -->
        </div>
      </div><!-- row -->
</div><!-- grouponr -->
  <div class="supliersoff">
    <div class="row">
      <div class="col-sm-12 px-0">
        <table id="table_field" class="display table table-hover table-sm box-list">
          <thead>
            <tr>
              {{-- <th class="th-sm">التاريخ</th>
              <th class="th-sm">المندوب</th>
              <th class="th-sm">الموظف</th> --}}
              <td class="th-sm">#</td>
              <th style="text-align: right;">الصنف</th>
              <th style="text-align: right;">الباركود</th>
              <th style="text-align: right;">البوكس</th>
              <th style="text-align: right;">الوزن</th>
              <th style="text-align: right;">العدد</th>
              <th style="text-align: right;">تاكيد</th>
              <th style="text-align: right;"><i class="fas fa-trash-alt"></i> </th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div><!-- col-sm-12 -->
    </div><!-- row -->
  </div><!-- supliers counteriesoff -->

<br>
<div class="col-md-12">
  <label>  ملاحظات <span style="color:#040202"></span></label>
    <div class="inputcode">
      <textarea name="receipt_notes" class="form-control col-md-12" style="height: 200px"></textarea>
    </div><!-- inputcode -->
</div>
<br>
<div class="col-md-12">
    <div class="form-group buttonofff mt-4">
        <button type="submit" class="btn btn-info">حفظ</button>
        {{-- <a href="#" style="color: white;" class="action quickview btn btn-info" data-link-action="quickview" data-bs-toggle="modal" data-bs-target="#print"> حفظ </a> --}}
        <button type="button" class="btn btn-secondary" onclick="history.back();">الغاء</button>
    </div>
</div>
</form>
 
@endsection

@section('scripts')
@include('sweetalert::alert')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

$(document).ready(function () {

  $('#table_field').on('click','#remove',function(){
      $(this).closest('tr').remove();
  });
});


  $(document).ready(function(e){
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
    $('#barcode').keyup(function(e){
        var barcode = $(this).val();
              /**Ajax code**/
              if(barcode != '')
              {
                $.ajax({
                  type: "POST",
                  url:"barcode/search",
                  data:{
                    barcode:barcode,
                  },
                  success: function (data) 
                  {
                      $('#barcodeList').fadeIn();
                      $('#barcodeList').html(data);
                  }
                  });
              }
              else
              {
                $('#barcodeList').fadeOut();
                $('#barcodeList').html('');
              }
      
    });
          $(document).on('click','li',function(){
            $('#barcode').val($(this).text());
            $('#barcodeList').fadeOut();
            var barcode = $('#barcode').val();
            purchaseDetails(barcode);
          });
      });


function purchaseDetails(barcode)
  {

    $.get('box/product-data/'+barcode, function(data){
            var flag = 1;
            $(".product_barcode").each(function(i) 
              {
                if ($(this).text() == data[3]) 
                {
                  $('#barcodeList').fadeIn();
                  $('#barcodeList').html('<ul class="list-unstyled" style="margin-top: 10px; margin-right: 50px;"><li style="color:green; cursor:pointer;">هذا الباركود تمت اضافته من قبل</li></ul>');
                  flag = 0;
                }
              });            
            if(flag)
            {
              var i = $('#table_field tbody').children().length;
              var barcode = data[3];
              var box = data[1];
              var product = data[2];
              var weight = data[4];
              var qty = data[5];
              var confirm = data[6];
              var newBody = $("<tbody>");
              $.each(barcode, function(index){
                  var newRow = $("<tr>");
                  var cols = '';
                  cols += '<td><strong>' + (i+1) + '</strong></td>';
                  cols += '<td>' + product[index] + '</td>';
                  cols += '<td class="product_barcode" style>' + barcode[index] + '</td>';
                  cols += '<td>' + box[index] + '</td>';
                  cols += '<td>' + weight[index] + '</td>';
                  cols += '<td>' + qty[index] + '</td>';
                  cols += '<td>'+confirm[index]+'</td>';
                  cols += '<td><input type="button" class="btn btn-danger" name="remove" id="remove" value="حذف" style="color:white;"></td>';
                  newRow.append(cols);
                  newBody.append(newRow);
              });

              
              $("table.box-list").append(newBody);
              $("input[name='barcode']").val('');
            }
        });
      }


      $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $(document).on('change','.confirm',function(e){
                
              var barcode=$(this).attr("data-attr");
                /**Ajax code**/
                $.ajax({
                type: "POST",
                url:"{{route('receipt.confirm')}}",
                data:{
                  barcode : barcode
                },
                success: function (data) {
                        if (data.status == 1) 
                        {
                          $( "#unconfirm_msg"+data.id ).hide();
                          $( "#confirm_msg"+data.id ).show();
                        }
                        else
                        {
                          $( "#confirm_msg"+data.id ).hide();
                          $( "#unconfirm_msg"+data.id ).show();
                        }
                    }
                });
            });
        });

</script>
<script>
  $(document).ready(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })
      $(document).on('click','#showBank',function(e){
          var id = $('#supplier').val();
          var paymentMethod = $('#showBank').val();
          
          /**Ajax code**/
          $.ajax({
          type: "POST",
          url:"{{route('supplierAccount')}}",
          data:{
              id:id,
              paymentMethod:paymentMethod
          },
          success: function (data) {
                  if (data.status == true) 
                  {
                      $('select[name="supplierAccount"]').empty();
                      // $('select[name="paymentMethod"]').empty();
                      $('select[name="supplierAccount"]').append('<option selected value="">اختر الحساب</option>');
                      $('select[name="supplierAccount"]').append(data.data);
                  }
              }
          });
      });
  });
</script>
<script>
  $(document).ready(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })
     $(document).on('keyup','#export_id',function(e){
      var export_id = $('#export_id').val();
      /**Ajax code**/
      $.ajax({
          type: "POST",
          url:"{{route('receipt.delivery')}}",
          data:{
            export_id:export_id,
          },
          success: function (data) {
                      $('input[name="delivery_employee"]').val(data.data);
              }
          });
   });

});
</script>
@endsection