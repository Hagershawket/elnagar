@extends('resturant.master')
@section('title','صرف النقدية')
@section('css')
    
@endsection
@section('header_title','صرف النقدية')
@section('content')
<div class="grouponr">
    <div class="row">
      <div class="col-sm-6">
        <div class="dainfo">
          <h3>صرف النقدية</h3>
        </div>
      </div>
    </div>
    <form method="post" action="{{route('cashExchange.store')}}">
        @csrf
      <div class="row">
        <div class="col-md-4 col-12 form-group">
          <label>التاريخ<span style="color:#040202">*</span></label>
          <div class="inputcode">
            <div class="iconantimat"> <i class="fas fa-apple-alt"></i></div>
            <input type="date" class="form-control" name="date">
          </div><!-- inputcode -->
        </div>
        <div class="col-md-4 col-12 form-group">
          <label>المصروفات الرئيسية<span style="color:#040202">*</span></label>
          <div class="inputcode">
            <div class="iconantimat"><i class="fas fa-user"></i></div>
            <select name="maincat" class="form-control"  id="maincat">
                <option value="">يتم اختيار بند مسجل مسبقا</option>
                @foreach ($mainExpenses as $Expenses)
                    <option value="{{$Expenses->id}}">{{$Expenses->name}}</option>
                @endforeach              
            </select>
          </div>
        </div>
        <div class="col-md-4 col-12 form-group">
          <label>المصروفات الفرعية<span style="color:#040202">*</span></label>
          <div class="inputcode">
            <div class="iconantimat"><i class="fas fa-user"></i></div>
            <select name="subcat" class="form-control"  id="subcat">
                <option selected>اختر المصروف الفرعي</option>
            </select>
          </div>
        </div>
        <div class="col-md-4 col-12 form-group">
          <label> المبلغ <span style="color:#040202">*</span></label>
          <div class="inputcode">
            <div class="iconantimat"><i class="fas fa-hand-holding-heart"></i></div>
            <input type="text" class="form-control" name="amount">
          </div><!-- inputcode -->
        </div>


        <div class="col-md-8 col-12 form-group">
          <label>  ملاحظات<span style="color:#040202">*</span></label>
          <div class="inputcode">
            <div class="iconantimat"><i class="fas fa-atom"></i></div>
            <input type="text"  class="form-control" name="notes">
          </div><!-- inputcode -->
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-success" style="margin-top: 20px;"> اضافة </button>
        </div>
      </div><!-- row -->
    </form>
  </div><!-- grouponr -->
  <div class="supliersoff">
    <div class="row">
      <div class="col-sm-12 px-0">
        <table  id="table_id" class="display table table-striped table-bordered table-sm">
          <thead>
            <tr>
              <th class="th-sm">م</th>
              <th class="th-sm">التاريخ</th>
              <th class="th-sm">المبلغ</th>
              <th class="th-sm">ملاحظات</th>
              <th class="th-sm">حذف</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 0; ?>
            @foreach ($records as $record)
            <tr>
              <?php $i++; ?>
              <td>{{$i}}</td>
              <td>{{$record->date}}</td>
              <td>{{$record->amount}}</td>
              <td>{{$record->notes}}</td>
              <td><i class="fas fa-trash-alt" data-bs-toggle="modal" data-bs-target="#exampleModal{{$record->id}}"></i></td>
            </tr>


            <!-- delete_modal_Grade -->
            <div class="modal fade" id="exampleModal{{$record->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">حذف صرف النقدية</h5>
                          <div class="col-md-3">
                            <button type="button" class="close" style="float:left;" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                          </div>                      </div>
                      <form action="{{route('cashExchange.destroy',$record->id)}}" method="post">
                          {{ method_field('Delete') }}
                          @csrf
                          <input id="id" type="hidden" name="id" class="form-control"
                                 value="{{ $record->id }}">
                          <div class="modal-body">هل أنت متاكد من حذف صرف النقدية</div>
                          <div class="modal-footer">
                              <button class="btn btn-info" type="button" data-bs-dismiss="modal">غلق</button>
                              <button class="btn btn-danger" type="submit">حذف</button>
                          </div>
                      </form>

                  </div>
              </div>
          </div>
            @endforeach
            
          </tbody>
        </table>
      </div><!-- col-sm-12 -->
    </div><!-- row -->
  </div><!-- supliers counteriesoff -->
@endsection
@section('scripts')
@include('sweetalert::alert')
<script type="text/javascript">

    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $(document).on('change','#maincat', function(e) {
            
            var cat = $('#maincat').val();
            // alert(cat);
            /**Ajax code**/
            $.ajax({
                type: "POST",
                url:"{{route('subcats')}}",
                data:{cat:cat},
                

                success: function (data) {
                    $('select[name="subcat"]').empty();
                    $('select[name="subcat"]').append('<option selected value="">اختر القسم الفرعي</option>');
                    $('select[name="subcat"]').append(data.data);
                },
                error:function(){
                    console.log('برجاء اختيار قسم');
                }
            });
            /**Ajax code ends**/
        });
    });
</script>
@endsection