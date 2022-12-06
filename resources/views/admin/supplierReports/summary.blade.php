@extends('admin.master')
@section('title',' تقرير مجمع موردين')
@section('css')

@endsection
@section('header_title',' تقرير مجمع موردين')
@section('content')

  <div class="row">
    <div class="col-sm-6">
     
      <div class="dainfo">
        <h3>تقرير مجمع موردين</h3>
      </div>
    </div>
      
   
    </div>

    <div class="counteriesoff">
      <div class="row">
        <div class="col-md-12 col-sm-12 pl-0">
        <table id="example" class="display nowrap" style="width:100%">
          <thead>
              <tr>
                <th style="text-align: center">كود المورد</th>
                <th style="text-align: center">اسم المورد</th>
                <th style="text-align: center"> المبلغ المستحق</th>
                <th style="text-align: center"> الارضية</th>
                <th style="text-align: center">المبلغ الاجمالى</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($suppliers as $supplier)
            <tr>
                <td style="text-align: center">{{$supplier->id}}</td>
                <td style="text-align: center">{{$supplier->name}}</td>
                <td style="text-align: center">{{$supplier->due_amount}}</td>
                <td style="text-align: center">{{$supplier->standard}}</td>
                <td style="text-align: center">{{$supplier->due_amount + $supplier->standard}}</td>
            </tr>
            @endforeach
              
          </tbody>
      </table>
      </div>
        </div>


    
      </div>

    <!-- Modal -->
    <div id="purchase-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
      <div role="document" class="modal-dialog">
        <div class="modal-content" style="width: 750px;">
          <div class="container mt-3 pb-2 border-bottom">
              <div class="row">
                <div class="col-md-3">
                  <button id="print-btn" onclick="window.print()"
                  type="button" class="btn btn-default btn-sm d-print-none" style="font-size: 15px; float:right;"><i class="fa fa-print" style="color:#7c5cc4; font-size: 24px"></i> طباعة</button>
              </div>
              <div class="col-md-6">
                  <h3 id="exampleModalLabel" class="modal-title text-center container-fluid"><img src="{{asset('images/logo.jpeg')}}" width="50" height="50" alt=""></h3>
              </div>
              <div class="col-md-3">
                <button type="button" class="close" style="float:left;" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
              </div>
              <div class="col-md-12 text-center">
                  <i style="font-size: 15px;"><strong>شركة النجار للاسماك المملحة</strong></i>
              </div>
              <div class="col-md-12 text-center" id="purchase-invoice">
                <i style="font-size: 15px;"></i>
            </div>
              </div>
          </div>
              <div id="purchase-content" class="modal-body"></div>
              <br>
    <div class="container" style="width: 95%">
      <table id="modaldata" class="table table-hover table-bordered product-purchase-list">
        <thead>
            <tr>
              <th> #  </th>
              <th> اسم الصنف</th>
              <th> الوحدة  </th>
              <th>  الكمية </th>
              <th>الكمية المجانية</th>
              <th>  الوزن  </th>
              <th> سعر الوحدة </th>
              <th> الاجمالى </th>   
            </tr>
        </thead>
        <tbody>
      </tbody>
      </table>
              </div>
      <div id="purchase-footer" class="modal-body"></div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
  @include('sweetalert::alert')
@endsection