@extends('admin.master')
@section('title','اضافة فاتورة شراء سمك')
@section('css')

@endsection
@section('header_title','اضافة فاتورة شراء سمك')
@section('content')

    <div class="row">
      <div class="col-sm-6">

        <div class="dainfo">
          <h3>اضافة فاتورة شراء سمك</h3>
        </div>
      </div>
      </div>

      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                        <form action="{{route('purchases.store')}}" method="POST" name="cart">
                          @csrf
                        <div class="row">
                          <div class="col-md-4">
                            <label><strong>رقم فاتورة المورد</strong></label>
                            <input type="text" name="supplier_invoice_no" class="form-control" id="inputEmail4" placeholder="رقم فاتورة المورد">
                           </div>
                              <div class="col-md-4">
                                <label><strong>التاريخ *</strong></label>
                                <input type="date" name="date" class="form-control" id="inputEmail4" placeholder=" التاريخ">
                                @error('date')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div>
                                @enderror
                              </div>
                               <div class="form-group col-md-4">
                                <label><strong>اسم المورد *</strong></label>
                                <select id="inputState"  name="supplier_id" class="form-control">
                                  <option value="">اختر</option>
                                  @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                  @endforeach
                                </select>
                                @error('supplier_id')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div>
                                @enderror
                              </div>
                              <div class="form-group col-md-4">
                                <label><strong> اجمالى النقدى *</strong></label>
                                <input name="total_cash" class="form-control">
                                @error('total_cash')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div>
                                @enderror
                              </div>
                              <div class="form-group col-md-4">
                                <label><strong> اجمالى الآجــل *</strong></label>
                                <input name="total_delay" class="form-control">
                                @error('total_delay')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div>
                                @enderror
                              </div>
                              <div class="form-group col-md-4">
                                <label><strong> اسم المستودع *</strong></label>
                                <select id="inputState"  name="warehouse_id" class="form-control">
                                  <option value="">اختر</option>
                                  @foreach ($warehouses as $warehouse)
                                    <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                                  @endforeach
                                </select>
                                @error('warehouse_id')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div>
                                @enderror
                              </div>
                              <div class="form-group col-md-12">
                                <label><strong> صورة الفاتورة </strong></label>
                                <input type="file" name="image" class="form-control">
                            </div>
                              <div class="col-md-12">
                                  <label class="mr-sm-2" for="validationCustom04">ملاحظات</label>
                                  <div class="">
                                      <textarea name="notes" class="form-control col-md-12" style="height: 200px"></textarea>
                                  </div>
                              </div>

                            </div>
                            <br>
                            <br>

                            <div class="col-md-12">
                                <table class="table table-bordered table_field" id="table_field">
                                    <thead>
                                      <tr class="thead-dark">
                                        <th> #</th>
                                        <th style="width: 150px; !important">اسم الصنف</th>
                                        <th style="width: 150px; !important">الوحدة</th>
                                        <th>عدد</th>
                                        <th> عدد مجانى</th>
                                        <th>الوزن</th>
                                        <th>سعر الوحدة</th>
                                        <th>الاجمالى</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <?php $x=1;?>
                                        <td>1</td>
                                        <td>
                                          <select name="product_id[]" class="form-control product_id" id="product_id">
                                          <option value="">اختر النوع</option>
                                          @foreach ($products as $product)
                                            <option value="{{$product->id}}">{{$product->name . ' ( ' . $product->code . ' ) '}}</option>
                                          @endforeach
                                        </select>
                                        @error('product_id.*')
                                          <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                          </div>
                                        @enderror
                                      </td>
                                      <td>
                                        <input type="text" class="form-control unit_id" name="unit_id[]" id="unit_id">
                                        @error('unit_id.*')
                                          <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                          </div>
                                        @enderror
                                      </td>
                                      <td>
                                          <input type="text" class="form-control" name="qty[]">
                                          @error('qty.*')
                                            <div class="alert alert-danger" role="alert">
                                              {{$message}}
                                            </div>
                                          @enderror
                                      </td>
                                      <td>
                                        <input type="text" class="form-control" name="free_qty[]">
                                      </td>
                                      <td>
                                        <input type="text" class="form-control weight" name="weight[]">
                                          @error('weight.*')
                                              <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                              </div>
                                          @enderror
                                      </td>
                                          <td>
                                            <input type="text" class="form-control unit_cost" name="unit_cost[]">
                                            @error('unit_cost.*')
                                              <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                              </div>
                                            @enderror
                                          </td>
                                          <td>
                                            <input type="text" class="form-control total" name="total[]" readonly>
                                            @error('total.*')
                                              <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                              </div>
                                            @enderror
                                          </td>
                                          <td><input type="button" class="btn btn-success" name="add" id="add" value="اضافة" style="color: white"></td>
                                      </tr>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td colspan="7" style="text-align: center"><strong>اجمالـــــــــــــــــــــــى الفاتـــــــــــــورة</strong></td>
                                        <td><input type="text" class="form-control grand_total" name="grand_total" readonly></td>
                                      </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group buttonofff mt-4">
                                    <button type="submit" class="btn btn-info">حفظ</button>
                                    <button type="button" class="btn btn-outline-secondary" onclick="history.back();">الغاء</button>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
      </div>

@endsection
@section('scripts')
@include('sweetalert::alert')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#add').click(function(){
          var  size = $('#table_field tbody').children().length +1;
          var html = '<tr>'+'<td>'+size+'</td>'+'<td><select name="product_id[]" class="form-control product_id" id="product_id"><option value="">اختر النوع</option>@foreach ($products as $product)<option value="{{$product->id}}">{{$product->name . " ( " . $product->code . " ) "}}</option>@endforeach</select></td><td><input type="text" class="form-control unit_id" name="unit_id[]" id="unit_id"></td><td><input type="text" class="form-control" name="qty[]"></td><td><input type="text" class="form-control" name="free_qty[]"></td><td><input type="text" class="form-control weight" name="weight[]"></td><td><input type="text" class="form-control unit_cost" name="unit_cost[]"></td><td><input type="text" class="form-control total" name="total[]" readonly></+td><td><input type="button" class="btn btn-danger" name="remove" id="remove" value="حذف" style="color: white"></td></tr>';

            $('#table_field').append(html);
        });

        $('#table_field').on('click','#remove',function(){
            $(this).closest('tr').remove();
        });
    });
</script>
<script>

function sum(){
  var sum = 0;
    //iterate through each textboxes and add the values
    $(".total").each(function () {

        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
          sum += parseFloat(this.value);
        }

    });
    $('input[name="grand_total"]').val(sum);
}
$('table').delegate('.unit_cost, .weight','keyup',function(){
            var tr = $(this).parent().parent();
            var price = tr.find('.unit_cost').val();
            var weight   = tr.find('.weight').val();
            var amount = price * weight;
            tr.find('.total').val(amount);
            sum();
        });

</script>

<script>
  $(document).ready(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })
     $(document).on('change','.product_id',function(e){
      var id = $('.product_id').val();
      /**Ajax code**/
      $.ajax({
          type: "POST",
          url:"{{route('getProductUnit')}}",
          data:{
              id:id,
          },
          success: function (data) {
                  if (data.status == true)
                  {
                    $('.unit_id').val(data.unit);
                  }
              }
          });
   });

});
</script>

@endsection
