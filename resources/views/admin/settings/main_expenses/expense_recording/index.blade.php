@extends('admin.master')
@section('title', ' تسجيل مصروف ')
@section('css')

@endsection
@section('header_title', ' تسجيل مصروف ')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="dainfo">
                    <h3> تسجيل مصروف </h3>
                </div>
            </div>
        </div>
                <br><br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                                    <form method="post" action="{{ route('expense_recording.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="form-group col-5 col-md-5 col-lg-5 pr-0 pl-0 labelform">
                                                <label> البنود الرئيسيه *</label>
                                                <select name="main_id" id="main" class="form-control SlectBox"
                                                    onclick="console.log($(this).val())"
                                                    onchange="console.log('change is firing')">
                                                    <!--placeholder-->
                                                    <option value="" selected disabled>حدد البند الرئيسى</option>
                                                    @foreach ($mainexpenses as $mainexpense)
                                                        <option value="{{ $mainexpense->id }}"> {{ $mainexpense->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('main_id')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{$message}}
                                                    </div> 
                                                @enderror
                                            </div>
                                            <div class="form-group col-1 col-md-1 col-lg-1 pr-0 pl-0 labelform">
                                            </div>
                                            <div class="form-group col-5 col-md-5 col-lg-5 pr-0 pl-0 labelform">
                                                <label> البنود الفرعيه *</label>

                                                <select id="sub" name="sub_id"  class="form-control">
                                                    <option value="" selected disabled>حدد البند الفرعى</option>
                                                    @foreach ($subexpenses as $subexpense)
                                                        <option value="{{ $subexpense->id }}"> {{ $subexpense->name }}
                                                        </option>
                                                    @endforeach
                                                    </option>
                                                </select>
                                                @error('sub_id')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{$message}}
                                                    </div> 
                                                @enderror
                                            </div>
                                            <div class="form-group col-1 col-md-1 col-lg-1 pr-0 pl-0 labelform">
                                            </div>
                                            <div class="form-group col-5 col-md-5 col-lg-5 pr-0 pl-0 labelform">
                                                <label> تاريخ السداد *</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" type="date" name="date" placeholder="">
                                                </div>
                                                @error('date')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{$message}}
                                                    </div> 
                                                @enderror
                                            </div>
                                            <div class="form-group col-1 col-md-1 col-lg-1 pr-0 pl-0 labelform">
                                            </div>
                                            <div class="form-group col-5 col-md-5 col-lg-5 pr-0 pl-0 labelform">
                                                <label> اجمالى مبلغ الفاتورة *</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" type="text" name="grand_total" placeholder="">
                                                </div>
                                                @error('grand_total')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{$message}}
                                                    </div> 
                                                @enderror
                                            </div>
                                            <div class="form-group col-11 col-md-11 col-lg-11 pr-0 pl-0 labelform">
                                                <label> صورة الفاتورة </label>
                                                <div class="controlsopop">
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group col-11 col-md-11 col-lg-11 pr-0 pl-0 labelform">
                                                <label> ملاحظات  </label>
                                                <div class="controlsopop">
                                                    
                                                    <textarea class="form-control" name="notes" placeholder=" ملاحظات" id="notes" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <table class="table table-bordered table_field" id="table_field">
                                                <thead>
                                                  <tr class="thead-dark">
                                                    <th> # </th>
                                                    <th style="width: 150px; !important">الاسم</th>
                                                    <th style="width: 150px; !important">وحدة القياس</th>
                                                    <th>الكمية</th>
                                                    <th>السعر</th>
                                                    <th>الاجمالى</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <?php $x=1;?>
                                                    <td>1</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="name[]">
                                                        @error('name.*')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{$message}}
                                                        </div> 
                                                        @enderror
                                                  </td>
                                                  <td>
                                                    <select name="unit_id[]" class="form-control">
                                                        <option value="">اختر الوحدة</option>
                                                        @foreach ($units as $unit)
                                                          <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                                        @endforeach
                                                      </select>
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
                                                    <input type="text" class="form-control" name="unit_cost[]">
                                                    @error('unit_cost.*')
                                                      <div class="alert alert-danger" role="alert">
                                                        {{$message}}
                                                      </div> 
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control total" name="total[]">
                                                    @error('total.*')
                                                      <div class="alert alert-danger" role="alert">
                                                        {{$message}}
                                                      </div> 
                                                    @enderror
                                                  </td>
                                                  <td><input type="button" class="btn btn-success" name="add" id="add" value="اضافة" style="color: white"></td>
                                                  </tr>
                                                </tbody>
                                                {{-- <tfoot>
                                                    <tr>
                                                      <td colspan="5" style="text-align: center"><strong>اجمالـــــــــــــــــــــــى الفاتـــــــــــــورة</strong></td>
                                                      <td><input type="text" class="form-control grand_total" name="grand_total"></td>
                                                    </tr>
                                                  </tfoot> --}}
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
          var html = '<tr>'+'<td>'+size+'</td>'+'<td><input type="text" class="form-control" name="name[]">@error("name.*")<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</td><td><select name="unit_id[]" class="form-control"><option value="">اختر الوحدة</option>@foreach ($units as $unit)<option value="{{$unit->id}}">{{$unit->unit_name}}</option>@endforeach</select>@error("unit_id.*")<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</td><td><input type="text" class="form-control" name="qty[]">@error("qty.*")<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</td><td><input type="text" class="form-control" name="unit_cost[]">@error("unit_cost.*")<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</td><td><input type="text" class="form-control total" name="total[]">@error("total.*")<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</td><td><input type="button" class="btn btn-danger" name="remove" id="remove" value="حذف" style="color: white"></td></tr>';

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
    $('table').delegate('.unit_cost, .qty','keyup',function(){
            var tr = $(this).parent().parent();
            var price = tr.find('.unit_cost').val();
            var qty   = tr.find('.qty').val();
            var amount = price * qty;
            tr.find('.total').val(amount);
            sum();
        });
    
</script>
<script>
        $(document).ready(function() {
            $('select[name="main_id"]').on('change', function() {
                var MainId = $(this).val();
                if (MainId) {
                    $.ajax({
                        url: "{{ URL::to('main') }}/" + MainId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_id"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        }); 

    </script>


@endsection
