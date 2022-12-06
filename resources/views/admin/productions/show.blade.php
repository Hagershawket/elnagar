@extends('admin.master')
@section('title','عرض التصنيع')
@section('css')
    
@endsection
@section('header_title','عرض التصنيع')
@section('content')

<div class="page-wrapper" style="margin-left: -105px; !important">
    <div class="row">
      <div class="col-sm-6">
       
        <div class="dainfo">
          <h3>عرض  التصنيع</h3>
        </div>
      </div>
      </div>

      <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h3 class="mb-0"> بيانات التوريدة</h3>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <p class="mb-0">رقم التوريدة</p>
                                        </div>
                                        <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $purchase->id }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <p class="mb-0">تاريخ التوريدة</p>
                                        </div>
                                        <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $purchase->date }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <p class="mb-0">  المورد </p>
                                        </div>
                                        <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $purchase->supplier->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <br>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 style="text-align: center">اصناف التوريدة</h4>
                                </div>
                                <table class="table table-bordered table_field" id="table_field">
                                    <thead>
                                      <tr>
                                        <th style="text-align: center">اسم الصنف</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                          @foreach ( $products as $product)
                                          <tr>
                                              <td style="text-align: center">{{$product->product->name}}</td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
    
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 style="text-align: center"> بيانات اصناف التوريدة</h4>
                                    </div>
                                    <table class="table table-bordered table_field" id="table_field">
                                        <thead>
                                          <tr>
                                            <th style="text-align: center">الكمية</th>
                                            <th style="text-align: center">الوزن </th>
                                            <th style="text-align: center">الرصيد</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ( $products as $product)
                                              <tr>
                                                  <td style="text-align: center">{{$product->qty}}</td>
                                                  <td style="text-align: center">{{$product->weight}}</td>
                                                  <?php $production = App\Models\Production::where(['purchase_id'=> $purchase->id, 'purchase_product_id' => $product->id])->orderby('created_at', 'desc')->first()?>
                                                  <td style="text-align: center">{{$production->remain ?? 'لم يتم تصنيعه بعد'}}</td>
                                              </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
        
                                </div>
                            </div>
                        </div>

                </div>
            </div>

            <br> 

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 style="text-align: center">بيانات التصنيع</h4>
                                    </div>
                                    <table class="table table-bordered table_field" id="table_field">
                                        <thead>
                                          <tr>
                                            <th style="text-align: center">اسم الصنف</th>
                                            <th style="text-align: center"> الوزن</th>
                                            <th style="text-align: center"> التالف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ( $productions as $production)
                                              <tr>
                                                  <td style="text-align: center">{{$production->product->name}}</td>
                                                  <td style="text-align: center">{{$production->weight}}</td>
                                                  <td style="text-align: center">{{$production->damaged}}</td>
                                              </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
        
                                </div>
                            </div>
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
        $(document).on('change','#purchase_product_id',function(e){
            var purchase_id = $('#purchase_id').val();
            var item = $('#purchase_product_id').val();
            
            /**Ajax code**/
            $.ajax({
            type: "POST",
            url:"{{route('purchase_products')}}",
            data:{
              purchase_id:purchase_id,
              item:item,
            },
            success: function (data) {
                    if (data.status == true) 
                    {
                        $('#purchase_product_weight').empty();
                        $('#purchase_product_weight').val(data.weight);
                    }
                }
            });
        });
    });
</script>
<script>
        $('#weight').keyup(function(){
            var ml =   $('#purchase_product_weight').val();
            var text = $('#weight').val();
            var textLength = ml.length;
            if (parseFloat(text) > parseFloat(ml)) {
                $('#weight').val(text.substring(0, 0));
                alert("لقد تخطيت الحد الاقصى لكمية الشراء");
            }
            
        });

    $('#damaged').keyup(function(){
                var purchase_product_weight =  $('#purchase_product_weight').val();
                var weight  = $('#weight').val();
                var damaged = $('#damaged').val();
                var  sum =  parseFloat(damaged) + parseFloat(weight);
                if (parseFloat(sum) > parseFloat(purchase_product_weight)) {
                    $('#damaged').val(damaged.substring(0, 0));
                    alert("لقد تخطيت الحد الاقصى لكمية الشراء");
                }
                
    });
</script>
@endsection