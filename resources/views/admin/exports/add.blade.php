@extends('admin.master')
@section('title','اذن صرف')
@section('css')
    
@endsection
@section('header_title','اذن صرف')
@section('content')

    <div class="row">
      <div class="col-sm-6">
       
        <div class="dainfo">
          <h3>اذن صرف</h3>
        </div>
      </div>
    </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                <form action="{{route('exports.store')}}" method="POST">
                  @csrf
                <div class="row">
                  <div class="form-group col-md-4">
                    <label><strong> الفرع</strong></label>
                    <select name="branch_id" class="form-control" id="branch_id">
                      <option value="">اختر</option>
                      @foreach ($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                      @endforeach                          
                  </select>
                  @error('branch_id')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="col-md-4">
                  <label><strong>تاريخ الصرف</strong></label>
                  <input type="date" name="export_date" class="form-control" id="inputEmail4" placeholder=" التاريخ">
                  @error('export_date')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label><strong> المندوب</strong></label>
                  <select name="delivery_employee" class="form-control" id="delivery_employee">
                    <option value="">اختر</option>
                    @foreach ($employees as $employee)
                      <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endforeach                          
                </select>
                @error('branch_id')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                  </div> 
                @enderror
              </div>
                  <div class="form-group col-md-4">
                    <label><strong> المستودع</strong></label>
                    <select name="warehouse_id" class="form-control" id="warehouse_id">
                      <option value="">اختر</option>
                      @foreach ($warehouses as $warehouse)
                        <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                      @endforeach                          
                  </select>
                  @error('warehouse_product_id')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label><strong>الصنف</strong></label>
                  <select id="product_id" name="product_id" class="form-control">
                  </select> 
                  @error('product_id')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label><strong>البوكس</strong></label>
                  <input type="text" class="form-control" name="box_id" id="box_id">
                  @error('box_id')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label><strong>الكمية</strong></label>
                  <input type="text" class="form-control" name="qty" id="qty">
                  @error('warehouse_product_weight')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="col-md-4">
                  <label><strong> الوزن</strong></label>
                  <input type="text" class="form-control" name="weight" id="weight">
                  </select>                                
                  @error('weight')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div> 
                  @enderror
                </div>
                <div class="col-md-4">
                  <input type="button" class="btn btn-success" name="add" id="add" value="اضافة" style="margin-top: 30px; width:300px; color:white;">
                </div>
                
              </div>
              <br>
              <br>

              <div class="col-md-12">
                <table class="table table-bordered table_field" id="table_field">
                    <thead>
                      <tr class="thead-dark">
                        <th> #</th>
                        <th style="width: 150px; !important"> المستودع</th>
                        <th style="width: 150px; !important"> الصنف</th>
                        <th>البوكس</th>
                        <th>الكمية</th>
                        <th>الوزن</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                      </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="col-md-12">
              <label class="mr-sm-2" for="validationCustom04">ملاحظات</label>
              <div class="">
                  <textarea name="export_notes" class="form-control col-md-12" style="height: 200px"></textarea>
              </div>
          </div>
            <div class="col-md-12">
                <div class="form-group buttonofff mt-4">
                    <button type="submit" class="btn btn-info">حفظ</button>
                    {{-- <a href="#" style="color: white;" class="action quickview btn btn-info" data-link-action="quickview" data-bs-toggle="modal" data-bs-target="#print"> حفظ </a> --}}
                    <button type="button" class="btn btn-outline-secondary" onclick="history.back();">الغاء</button>
                </div>
            </div>
                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="print" tabindex="-1" role="dialog"
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
                      <div class="modal-body">
                          <h4>
                              هل تريد طباعة الباركود ؟
                          </h4>
                      </div>
                      <div class="modal-footer">
                        <form action="{{route('exports.store')}}" method="POST">
                          @csrf
                            <button type="submit" class="btn btn-info">نعم</button>
                        </form>
                        <form action="{{route('exports.store')}}" method="POST">
                          @csrf
                            <button type="submit" class=" btn btn-secondary"
                              data-bs-dismiss="modal" aria-label="Close">لا</button>
                        </form>

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
        var size = $('#table_field tbody').children().length;
        var warehouse_name = $('#warehouse_id :selected').text(); 
        var warehouse_id = $('#warehouse_id :selected').val(); 
        var product_name = $('#product_id :selected').text(); 
        var product_id = $('#product_id :selected').val(); 
        var box_id = $('#box_id').val();
        var qty = $('#qty').val();
        var weight = $('#weight').val();
        var html = '<tr>'+'<td>'+size+'</td>'+'<td><input type="text" class="form-control" value="'+warehouse_name+'"><input type="hidden" class="form-control" name="warehouse_id[]" value="'+warehouse_id+'"></td><td><input type="text" class="form-control" value="'+product_name+'"><input type="hidden" class="form-control" name="product_id[]" value="'+product_id+'"></td><td><input type="text" class="form-control" name="box_id[]" value="'+box_id+'"></td><td><input type="text" class="form-control" name="qty[]" value="'+qty+'"></td><td><input type="text" class="form-control weight" name="weight[]" value="'+weight+'"></td><td><input type="button" class="btn btn-danger" name="remove" id="remove" value="حذف" style="color:white;"></td></tr>';
          $('#table_field').append(html);
          $('#box_id').val('');
          $('#qty').val('');
          $('#weight').val('');
          $('#warehouse_id').val('');
          $('#product_id').val('');
      });

      $('#table_field').on('click','#remove',function(){
          $(this).closest('tr').remove();
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
      $(document).on('click','#warehouse_id',function(e){
          var warehouse_id = $('#warehouse_id').val();
          
          /**Ajax code**/
          $.ajax({
          type: "POST",
          url:"{{route('warehouse.products')}}",
          data:{
            warehouse_id:warehouse_id,
          },
          success: function (data) {
                  if (data.status == true) 
                  {
                      $('select[name="product_id"]').empty();
                      $('select[name="product_id"]').append('<option selected value="">اختر الصنف</option>');
                      $('select[name="product_id"]').append(data.data);
                  }
              }
          });
      });
  });
</script>
@endsection