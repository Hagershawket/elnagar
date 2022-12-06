@extends('admin.master')
@section('title','تعديل مورد')
@section('css')

@endsection
@section('header_title','تعديل مورد')
@section('content')

        <div class="row">
          <div class="col-sm-6">
           
            <div class="dainfo">
              <h3> تعديل مورد </h3>
            </div>
          </div>
        </div>

          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                            <form method="post" action="{{route('suppliers.update',$supplier->id)}}" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                              <input type="hidden" name="id" class="form-control" value="{{$supplier->id}}">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4"><strong>تغيير صورة المورد </strong></label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                      <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                      </div> 
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                  <label>اسم المورد *</label>
                                    <input type="text" name="name" placeholder="اضافة" class="form-control" value="{{$supplier->name}}">
                                    @error('name')
                                      <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                      </div> 
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>تاريخ التعامل</label>
                                      <input class="form-control" type="date" name="start_deal" placeholder="اضافة" id="example-tel-input" value="{{$supplier->date}}">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>رقم الجوال *</label>
                                      <input class="form-control" type="text" name="phone" placeholder="اضافة" id="example-number-input" value="{{$supplier->phone}}">
                                      @error('phone')
                                        <div class="alert alert-danger" role="alert">
                                          {{$message}}
                                        </div> 
                                      @enderror
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>رقم الجوال بديل</label>
                                      <input class="form-control" type="text" name="alternate_phone" placeholder="اضافة" id="example-text-input" value="{{$supplier->alternate_phone}}">
                                    </div>
                                  <div class="form-group col-md-4">
                                    <label>رقم التسجيل الضريبى</label>
                                      <input class="form-control" type="text" name="reference_no" placeholder="اضافة" id="example-text-input" value="{{$supplier->reference_no}}">
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label>العنوان</label>
                                      <textarea name="address" placeholder="اضف العنوان بالتفصيل" class="form-control" rows="5">{{$supplier->address}}</textarea>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>وصف المورد</label>
                                      <textarea name="desc" placeholder="اضف طبيعة عمل المورد مع الشركة" class="form-control" rows="5">{{$supplier->desc}}</textarea>
                                  </div>
                                    <div class="form-group col-md-6">
                                      <label>المبلغ المستحق</label>
                                        <input type="number" name="due_amount" class="form-control" value="{{$supplier->due_amount}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label> الارضية </label>
                                        <input type="number" name="standard" class="form-control" value="{{$supplier->standard}}">
                                    </div>
                                 
                                </div>
                                <br>
                                <br>
                            @error('account_num.*')
                                  <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                  </div> 
                            @enderror                       
                            <div class="col-md-12">
                              <table class="table table-bordered table_field" id="table_field">
                                  <thead>
                                    <tr class="thead-dark">
                                      <th> #</th>
                                      <th style="text-align:center"> الطرق </th>
                                      <th style="text-align:center">رقم الحساب / الجوال </th>
                                      <th></th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ( $supplier_methods as $method)
                                      <tr>
                                        <?php $x=1;?>
                                        <td>1</td>
                                        <td>
                                          <select name="payment_method_id[]" class="form-control">
                                          <option value="">اختر الطريقة</option>
                                          @foreach ($methods as $method)
                                            <option value="{{$method->id}}">{{$method->name}}</option>
                                          @endforeach
                                        </select>
                                      </td>
                                      <td><input type="text" class="form-control" name="account_num[]"></td>
                                      <td><input type="button" class="btn btn-success" name="add" id="add" value="اضافة" style="color: white"></td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                                <div class="col-md-12">
                                    <div class="form-group buttonofff mt-4">
                                        <input type="submit" value="حفظ" class="btn btn-info" style="color: white">
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
<script type="text/javascript">
  $(document).ready(function () {

      $('#add').click(function(){
        var  size = $('#table_field tbody').children().length +1;
        var html = '<tr>'+'<td>'+size+'</td>'+'<td><select name="payment_method_id[]" class="form-control"><option value="">اختر الطريقة</option>@foreach ($methods as $method)<option value="{{$method->id}}">{{$method->name}}</option>@endforeach</select></td><td><input type="text" class="form-control" name="account_num[]"></td><td><input type="button" class="btn btn-danger" name="remove" id="remove" value="حذف" style="color: white"></td></tr>';

          $('#table_field').append(html);
      });

      $('#table_field').on('click','#remove',function(){
          $(this).closest('tr').remove();
      });
  });
</script>

@endsection