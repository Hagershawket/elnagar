@extends('admin.master')
@section('title','اضافة مرتجع سمك')
@section('css')
    
@endsection
@section('header_title','اضافة مرتجع سمك')
@section('content')

    <div class="row">
      <div class="col-sm-6">
       
        <div class="dainfo">
          <h3>اضافة مرتجع سمك</h3>
        </div>
      </div>
      </div>

      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                        <form action="{{route('returns.store')}}" method="POST">
                          @csrf
                          <input type="hidden" name="purchase_id" class="form-control"value="{{$purchase_id}}">
                        <div class="row">
                          <div class="col-md-4">
                            <label><strong>رقم الفاتورة </strong></label>
                            <input type="text" name="invoice_no" id="invoice_no" class="form-control"value="{{$purchase->id}}" readonly>
                           </div>
                               <div class="form-group col-md-4">
                                <label><strong>اسم المورد</strong></label>
                                <select name="supplier_id" class="form-control" required>
                                  <option value="{{$purchase->supplier->id}}" selected>{{$purchase->supplier->name}}</option>
                              </select>
                              </div>
                              <div class="col-md-4">
                                <label><strong>تاريخ الاسترجاع</strong></label>
                                <input type="date" name="date" class="form-control" id="inputEmail4" placeholder=" التاريخ">
                              </div>
                              {{-- <div class="col-md-4">
                                <label><strong>اجمالى الفاتورة</strong></label>
                                <input type="text" name="total" class="form-control" id="inputEmail4" placeholder=" اجمالى الفاتورة">
                              </div> --}}
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
                                      <tr style="background-color: #e9ecef;">
                                        <td colspan="3"> </td>
                                        <td colspan="4" style="text-align: center;"> <strong>الشــــــــــــــراء </strong></td>
                                        <td colspan="4" style="text-align: center"><strong> المرتــــــــــــــجع</strong> </td>
                                      </tr>
                                      <tr class="thead-dark">
                                        <th>#</th>
                                        <th style="width: 100px; !important">اسم الصنف</th>
                                        <th style="width: 100px; !important">الوحدة</th>
                                        <th>العدد</th>
                                        <th>الوزن</th>
                                        <th>سعر الوحدة</th>
                                        <th>الاجمالى</th>
                                        <th>العدد</th>
                                        <th>الوزن</th>
                                        <th>سعر الوحدة</th>
                                        <th>الاجمالى</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i = 1;?>
                                      @foreach ($items as $item )
                                        <tr>
                                          <td>{{$i++}}</td>
                                            <td>
                                                <select name="product_id[]" class="form-control" required>
                                                  <option value="{{$item->product->id}}" selected>{{$item->product->name}}</option>
                                              </select>
                                            </td>
                                            <td>
                                                <select name="unit_id[]" class="form-control" required>
                                                  <option value="{{$item->unit->id}}" selected>{{$item->unit->unit_name}}</option>
                                              </select>
                                            </td>
                                            <td><input type="text" class="form-control maxqty" name="maxqty" value="{{$item->qty}}" readonly></td>                                            
                                            <td><input type="text" class="form-control maxweight" name="" value="{{$item->weight}}" readonly></td>
                                            <td><input type="text" class="form-control" name="" value="{{$item->unit_cost}}"readonly></td>
                                            <td><input type="text" class="form-control" name="" value="{{$item->total}}" readonly></td>

                                            <td><input type="text" class="form-control qty" name="qty[]" required></td>
                                            <td><input type="text" class="form-control weight" name="weight[]" required></td>
                                            <td><input type="text" class="form-control unit_cost" name="unit_cost[]" required></td>
                                            <td><input type="text" class="form-control total" name="total[]" required readonly></td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        
                                        <td colspan="6" style="text-align: center;background-color: #e9ecef;"><strong>اجمالـــــى فاتـــورة الشــراء</strong></td>
                                        <td><input type="text" class="form-control" name="" value={{$purchase->grand_total}} required readonly></td>
                                        
                                        <td colspan="3" style="text-align: center;background-color: #e9ecef;"><strong>اجمالـــــى فاتــورة الاسترجــاع</strong></td>
                                        <td><input type="text" class="form-control grand_total" name="grand_total" required readonly></td>
                                      </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group buttonofff mt-4">
                                    <button type="submit" class="btn btn-info">حفظ</button>
                                    <button type="button" class="btn btn-outline-secondary" onclick="history.back();">الغاء</button>                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('scripts')
@include('sweetalert::alert')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            var weight = tr.find('.weight').val();
            var amount = price * weight;
            tr.find('.total').val(amount);
            sum();
});
</script>
<script>
$('table').delegate('.qty','keyup',function(){
            var tr = $(this).parent().parent();
            var ml =   tr.find('.maxqty').val();
            var text = tr.find('.qty').val();
            if (parseFloat(text) > parseFloat(ml)) {
                tr.find('.qty').val(text.substring(0, 0));
                alert("لقد تخطيت الحد الاقصى لكمية الشراء");
            }
});
$('table').delegate('.weight','keyup',function(){
            var tr = $(this).parent().parent();
            var ml =   tr.find('.maxweight').val();
            var text = tr.find('.weight').val();
            if (parseFloat(text) > parseFloat(ml)) {
                tr.find('.weight').val(text.substring(0, 0));
                alert("لقد تخطيت الحد الاقصى لكمية الشراء");
            }
});
</script>
@endsection