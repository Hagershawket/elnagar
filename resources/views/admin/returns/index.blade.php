@extends('admin.master')
@section('title',' مرتجعات سمك')
@section('css')
@endsection
@section('header_title',' مرتجعات سمك')
@section('content')


  <div class="row">
    <div class="col-sm-6">
     
      <div class="dainfo">
        <h3>مرتجعات سمك</h3>
      </div>
    </div>
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="butonmodr text-left">
          <a href="" data-toggle="modal" data-target="#invoiceModal" class="action quickview btn btn-info"><i class="fa fa-plus"></i>اضافة مرتجع </a>
        </div>
      </div>
      
   
    </div>

    <div class="counteriesoff">
      <div class="row">
        <div class="col-md-12 col-sm-12 pl-0">
          <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                  <th style="text-align: center">رقم المرتجع</th>
                  <th style="text-align: center">رقم فاتورة الشراء</th>
                  <th style="text-align: center"> تاريخ الاسترجاع</th>
                  <th style="text-align: center">قيمة الفاتورة</th>
                  <th style="text-align: center">ملاحظات </th>
                  <th style="text-align: center"> اسم الموظف</th>
                  {{-- <th style="text-align: center">العمليات</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($returns as $return)
                  <tr data-href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#purchase-details{{$return->id}}" style="text-align: center">
                    <td>{{$return->id}}</td>
                    <td>{{$return->purchase->id}}</td>
                    <td>{{$return->date}}</td>
                    <td>{{$return->grand_total}}</td>
                    @if($return->notes)<td>{{$return->notes}}</td>@else<td style="text-align: center;color:#ED6B27; ">لا يوجد ملاحظات</td>@endif
                    <td>{{$return->user->name}}</td>
                    {{-- <td>
                      <div class="">
                       <a href="#" style="color: white;" class="btn btn-sm btn-success" style="text-align: center"><i class="far fa-eye"></i> مشاهدة</a>
                      </div>
                    </td> --}}
                  </tr>
                @endforeach
            </tbody>
        </table>

        </div>


    
      </div>
    </div>



  <!-- Start Modal -->
<div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اختر رقم الفاتورة</h5>
      </div>
      <form method="post" action="{{route('selectInvoice')}}">
        @csrf
        <div class="modal-body">
          <label for="inputState"><strong>رقم الفاتورة  </strong></label>
          <select  name="invoice_no" class="form-control">
            <option value="">اختر رقم الفاتورة</option>
            @foreach ($purchases as $purchase)
            <option value="{{$purchase->id}}">{{$purchase->id}}</option>
            @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
          <button type="submit" class="btn btn-info">اختر</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->
@endsection
@section('scripts')
  @include('sweetalert::alert')
  <script>
    $('#purchase-details').modal('show');
  </script>
  <script>
    document.addEventListener("DOMContentLoaded",()=>{

      const rows = document.querySelectorAll("tr[data-href]");
      rows.forEach(row=>{
          row.addEventListener("click",()=>{
              window.location.href = row.dataset.href
          });
      });
    });
  </script>
@endsection