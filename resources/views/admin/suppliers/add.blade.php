@extends('admin.master')
@section('title','اضافة مورد')
@section('css')

@endsection
@section('header_title','اضافة مورد')
@section('content')

        <div class="row">
          <div class="col-sm-6">
           
            <div class="dainfo">
              <h3> اضافة مورد </h3>
            </div>
          </div>
        </div>

          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                            <form method="post" action="{{route('suppliers.store')}}" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4"><strong>رفع صورة المورد </strong></label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                      <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                      </div> 
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                  <label>اسم المورد *</label>
                                    <input type="text" name="name" placeholder="اضافة" class="form-control" value="{{ Request::old('name') }}">
                                    @error('name')
                                      <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                      </div> 
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>تاريخ التعامل</label>
                                      <input class="form-control" type="date" name="start_deal" placeholder="اضافة" id="example-tel-input" value="{{ Request::old('start_deal') }}">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>رقم الجوال *</label>
                                      <input class="form-control" type="text" name="phone" placeholder="اضافة" id="example-number-input" value="{{ Request::old('phone') }}">
                                      @error('phone')
                                        <div class="alert alert-danger" role="alert">
                                          {{$message}}
                                        </div> 
                                      @enderror
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>رقم الجوال بديل</label>
                                      <input class="form-control" type="text" name="alternate_phone" placeholder="اضافة" id="example-text-input" value="{{ Request::old('alternate_phone') }}">
                                    </div>
                                  <div class="form-group col-md-4">
                                    <label>رقم التسجيل الضريبى</label>
                                      <input class="form-control" type="text" name="reference_no" placeholder="اضافة" id="example-text-input" value="{{ Request::old('reference_no') }}">
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label>العنوان</label>
                                      <textarea name="address" placeholder="اضف العنوان بالتفصيل" class="form-control" value="{{ Request::old('address') }}" rows="5"></textarea>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>وصف المورد</label>
                                      <textarea name="desc" placeholder="اضف طبيعة عمل المورد مع الشركة" class="form-control" value="{{ Request::old('desc') }}" rows="5"></textarea>
                                  </div>
                                    <div class="form-group col-md-6">
                                      <label>المبلغ المستحق</label>
                                        <input type="number" name="due_amount" class="form-control" value="{{ Request::old('due_amount') }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label> الارضية </label>
                                        <input type="number" name="standard" class="form-control" value="{{ Request::old('standard') }}">
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