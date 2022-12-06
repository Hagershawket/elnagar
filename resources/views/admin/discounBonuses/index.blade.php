@extends('admin.master')
@section('title','الخصومات و المكافآت')
@section('css')

@endsection
@section('header_title','الخصومات والمكافآت')
@section('content')


  <div class="row">
    <div class="col-sm-6">
      <div class="dainfo">
        <h3>الخصومات والمكافآت</h3>
      </div>
    </div>
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="butonmodr text-left">
          <a href="{{route('discountBonus.create')}}" class="action quickview btn btn-info"><i class="fa fa-plus"></i>اضافة خصم او المكافآت </a>
        </div>
      </div>   
    </div>

    <div class="counteriesoff">
      <div class="row">
        <div class="col-md-12 col-sm-12 pl-0">
        <table id="example" class="display nowrap" style="width:100%">
          <thead>
              <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">اسم الموظف</th>
                <th style="text-align: center">  تاريخ الخصم / المكأفة</th>
                <th style="text-align: center">المبلغ</th>
                <th style="text-align: center">النوع</th>
                <th style="text-align: center">ملاحظات</th>
                {{-- <th style="text-align: center">العمليات</th> --}}
              </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($discountBonuses as $discountBonus)
            <tr style="text-align: center">
                <td>{{$i++}}</td>
                <td>{{App\Models\Employee::where('id',$discountBonus->employee_id)->first()->name}}</td>
                <td>{{$discountBonus->date}}</td>
                <td>{{$discountBonus->amount}}</td>
                @if($discountBonus->type ==1)
                  <td style="text-align: center; color:#11ce2a;">مكافأة</td>
                @else
                 <td style="text-align: center;color:#ED6B27; ">خصم</td>
                @endif   
                
                  @if($discountBonus->notes)
                  <td>{{$discountBonus->notes}}</td>@else<td style="text-align: center; color:#ED6B27;">لا يوجد ملاحظات</td>
                  @endif
                
            </tr>
            @endforeach
              
          </tbody>
      </table>
      </div>
        </div>


    
      </div>
 
@endsection
@section('scripts')
  @include('sweetalert::alert')

<script type="text/javascript">

  </script>
@endsection