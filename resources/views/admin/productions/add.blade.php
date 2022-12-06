@extends('admin.master')
@section('title','تصنيع')
@section('css')
    
@endsection
@section('header_title','تصنيع')
@section('content')

    <div class="row">
      <div class="col-sm-6">
       
        <div class="dainfo">
          <h3>تصنيع</h3>
        </div>
      </div>
    </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                <form action="{{route('productions.store')}}" method="POST">
                  @csrf
                <div class="row">
                  <div class="form-group col-md-4">
                    <label><strong> الصنف</strong></label>
                    <select name="warehouse_product_id" class="form-control" id="warehouse_product_id">
                      <option value="">اختر</option>
                      @foreach ($warehouse_items as $item)
                        <option value="{{$item->product->id}}">{{$item->product->name}}</option>
                      @endforeach                          
                  </select>
                  @error('warehouse_product_id')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label><strong>الكمية</strong></label>
                  <input type="text" class="form-control" name="warehouse_product_qty" id="warehouse_product_qty" readonly>
                  @error('warehouse_product_qty')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label><strong>الوزن</strong></label>
                  <input type="text" class="form-control" name="warehouse_product_weight" id="warehouse_product_weight" readonly>
                  @error('warehouse_product_weight')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="col-md-2">
                  <label><strong>الصنف المستخرج</strong></label>
                  <select id="inputState" name="product_id" class="form-control">
                    <option value="">اختر</option>
                    @foreach ($products as $product)
                      <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                  </select>                                
                  @error('new_product')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="form-group col-md-2">
                  <label><strong>الكمية</strong></label>
                  <input type="text" class="form-control" name="qty" id="qty">
                  @error('qty')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="form-group col-md-2">
                  <label><strong>تالف كمية</strong></label>
                  <input type="text" class="form-control" name="qty_damaged" id="qty_damaged">
                  @error('qty_damaged')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="form-group col-md-2">
                  <label><strong>الوزن</strong></label>
                  <input type="text" class="form-control" name="weight" id="weight">
                  @error('weight')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="form-group col-md-2">
                  <label><strong>تالف وزن</strong></label>
                  <input type="text" class="form-control" name="weight_damaged" id="weight_damaged">
                  @error('weight_damaged')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label><strong>المستودع</strong></label><br>
                  <small style="color: red;">الاصناف التى سوف يتم تصنيعها مرة اخرى تضاف لمستودع الاسماك الخام</small>
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
                <div class="col-md-4" style="margin-top: 20px;">
                  <label><strong>التاريخ</strong></label>
                  <input type="date" name="date" class="form-control" id="inputEmail4" placeholder=" التاريخ">
                  @error('date')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <button type="submit" class="btn btn-success" style="margin-top: 50px; width:300px;"> اضافة </button>
                </div>
              </div>
            </form>
              <br>
              <br>

                            <div class="col-md-12">
                                <table class="table table-bordered table_field" id="table_field">
                                    <thead>
                                      <tr class="thead-dark">
                                        <th> # </th>
                                        <th> الصنف الاصلى</th>
                                        <th>الكمية</th>
                                        <th>الوزن</th>
                                        <th> الصنف المستخرج</th>
                                        <th>الكمية</th>
                                        <th>تالف كمية</th>
                                        <th>الوزن</th>
                                        <th>تالف وزن</th>
                                        {{-- <th></th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                      @if ($productions->count())
                                          @foreach ( $productions as $production)
                                          <tr>
                                            <?php $x=1;?>
                                              <td>{{$x++}}</td>
                                              <td>{{$production->warehouse_product->name}}</td>
                                              <td>{{$production->warehouse_product_qty}}</td>
                                              <td>{{$production->warehouse_product_weight}}</td>
                                              <td>{{$production->product->name}}</td>
                                              <td>{{$production->qty}}</td>
                                              <td>{{$production->qty_damaged}}</td>
                                              <td>{{$production->weight}}</td>
                                              <td>{{$production->weight_damaged}}</td>
                                              {{-- <form action="{{route('productions.destroy',$production->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                              <td><input type="submit" class="btn btn-danger" name="remove" id="remove" value="حذف"></td>
                                              </form> --}}
                                          </tr>
                                        @endforeach
                                      @endif
                                    </tbody>
                                </table>
                            </div>



                            {{-- <form action="{{route('productions.index')}}" method="GET">
                              @csrf
                            <div class="col-md-12">
                                <div class="form-group buttonofff mt-4">
                                    <button type="submit" class="btn btn-info">حفظ</button>
                                </div>
                            </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('scripts')
@include('sweetalert::alert')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $(document).on('change','#warehouse_product_id',function(e){
            var item = $('#warehouse_product_id').val();

            /**Ajax code**/
            $.ajax({
            type: "POST",
            url:"{{route('purchase_products')}}",
            data:{
              item:item,
            },
            success: function (data) {
                    if (data.status == true) 
                    {
                        $('#warehouse_product_qty').empty();
                        $('#warehouse_product_qty').val(data.qty);
                        $('#warehouse_product_weight').empty();
                        $('#warehouse_product_weight').val(data.weight);
                    }
                }
            });
        });
    });
</script>
<script>
        $('#weight').keyup(function(){
            var ml =   $('#warehouse_product_weight').val();
            var text = $('#weight').val();
            var textLength = ml.length;
            if (parseFloat(text) > parseFloat(ml)) {
                $('#weight').val(text.substring(0, 0));
                alert("لقد تخطيت الحد الاقصى لكمية الشراء");
            }
            
        });


    $('#damaged').keyup(function(){
                var warehouse_product_weight =  $('#warehouse_product_weight').val();
                var weight  = $('#weight').val();
                var damaged = $('#damaged').val();
                var  sum =  parseFloat(damaged) + parseFloat(weight);
                if (parseFloat(sum) > parseFloat(warehouse_product_weight)) {
                    $('#damaged').val(damaged.substring(0, 0));
                    alert("لقد تخطيت الحد الاقصى لكمية الشراء");
                }
                
    });
</script>
@endsection