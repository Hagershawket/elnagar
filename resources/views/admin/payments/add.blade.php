@extends('admin.master')
@section('title','اضافة سداد مورد')
@section('css')

@endsection
@section('header_title','اضافة سداد مورد')
@section('content')

        <div class="row">
          <div class="col-sm-6">
           
            <div class="dainfo">
              <h3> اضافة سداد مورد </h3>
            </div>
          </div>
          </div>



       {{-- <hr>
       <div class="container">
        <div class="row">
           <div class='col-sm-6'>
              <div class="form-group">
                 <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                 </div>
              </div>
           </div>
           
        </div>
     </div> --}}

      
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                            <form method="post" action="{{route('payment_suppliers.store')}}" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail4"><strong>التاريخ *</strong></label>
                                    <input type="date" name="date" class="form-control " id="inputEmail4" placeholder="التاريخ">
                                    @error('date')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState"><strong>اسم المورد *</strong></label>
                                    <select  name="supplier_id" class="form-control supplier" id="supplier">
                                      <option value="">اختر اسم المورد</option>
                                      @foreach ($suppliers as $supplier)
                                      <option value="{{$supplier->id}}" >{{$supplier->name}}</option>
                                      @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                  </div>
                                  <div class="col-md-2">
                                    <label>المبلغ المستحق</label>
                                    <input type="text" class="form-control" name="dueAmount" id="dueAmount" disabled>
                                  </div>
                                  <div class="col-md-2">
                                    <label ><strong>المبلغ المسدد *</strong></label>
                                    <input type="number" class="form-control" name="amount" id="" placeholder="المبلغ المسدد">
                                    @error('amount')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                  </div>
                                  <div class="col-md-4"  id="">
                                    <label for="inputState"><strong>طرق السداد *</strong></label>
                                    <select id="showBank" name="paymentMethod" class="form-control">
                                      <option value="">اختر طريقة السداد</option>
                                      @foreach ($paymentMethods as $payment)
                                        <option value="{{$payment->id}}">{{$payment->name}}</option>
                                      @endforeach
                                    </select>
                                    @error('paymentMethod')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                   </div>
                                  <div class="col-md-4" id="hideSupplierAccount">
                                    <label for="inputState"><strong>حسابات المورد </strong></label>
                                    <select id="inputState" name="supplierAccount" class="form-control">
                                      <option value="">اختر الحساب</option>
                                    </select>
                                   </div>
                                   <div class="col-md-4" id="hideCheckBank">
                                    <label><strong>كود الشيك</strong></label>
                                    <input type="number" name="" class="form-control" id="" placeholder="">
                                    <label><strong>تاريخ صرف الشيك</strong></label>
                                    <input type="number" name="" class="form-control" id="" placeholder="تاريخ صرف الشيك">
                                   </div>
                                   <div class="col-md-4">
                                     <label><strong>العمولة</strong></label>
                                     <input type="number" name="commission" class="form-control" id="" placeholder="العمولة">
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label class="mr-sm-2" for="validationCustom04"><strong>ملاحظات</strong></label>
                                    <div class="">
                                        <textarea name="notes" class="form-control col-md-12" style="height: 200px"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label class="col-md-2"><strong>صورة الايصال </strong></label>
                                    <input type="file" name="image" class="form-control" id="inputEmail4">
                                    @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div> 
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group buttonofff mt-4">
                                        <input type="submit" value="حفظ" class="btn btn-info" style="color: white;">
                                        <button type="button" class="btn btn-outline-secondary" onclick="history.back();">الغاء</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('scripts')

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
           $(document).on('change','#supplier',function(e){
            var id = $('#supplier').val();
            /**Ajax code**/
            $.ajax({
                type: "POST",
                url:"{{route('dueAmount')}}",
                data:{
                    id:id,
                },
                success: function (data) {
                        if (data.status == true) 
                        {
                            $('input[name="dueAmount"]').val(data.amount);
                        }
                    }
                });
         });

     });
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function(){
        $("#hideSupplierAccount").hide();
        $("#hideCheckBank").hide();
        $("#showBank").click(function(){
            var id = $('#showBank').val();
            if(id == 6){
                $("#hideCheckBank").show();
                $("#hideSupplierAccount").hide();
            }else if(id == 1){
                $("#hideSupplierAccount").hide();
                $("#hideCheckBank").hide();
            }
            else{
                $("#hideSupplierAccount").show();
                $("#hideCheckBank").hide();
            }
        });
    });
</script>

{{-- <script type="text/javascript">
    $(function() {
       $('#date-picker-exchange').datepicker();
       monthsFull: ['يناير', 'فبراير', '	مارس', '	أبريل/إبريل', 'أيار', 'حزيران', 'تموز', '	آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'],
  monthsShort: ['يناير', 'فبراير', '	مارس', '	أبريل/إبريل', 'أيار', 'حزيران', 'تموز', '	آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'],
  weekdaysFull: ['الأحد' ,'السبت' ,'الجمعه', 'الخميس', 'الأربعاء', 'الثلاثاء', 'الأثنين'],
  weekdaysShort: ['الأحد' ,'السبت' ,'الجمعه', 'الخميس', 'الأربعاء', 'الثلاثاء', 'الأثنين'],
  today: 'اليوم',
  clear: 'اختيار واضح',
  close: 'إلغاء',
  formatSubmit: 'yyyy/mm/dd'
    });
</script>  --}}
<script src="bootstrap-datepicker.XX.js" charset="UTF-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
    $(function () {
             $('#datetimepicker').datetimepicker({
                 locale: 'en'
             });
         });
    </script> 

<script type="text/javascript">
    $(function () {
        $('#datetimepicker2').datetimepicker({
            locale: 'en',
        });
    });
 </script>


@endsection