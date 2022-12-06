@extends('admin.master')
@section('title',' طباعة الباركود')
@section('css')
    
@endsection
@section('header_title',' طباعة الباركود')
@section('content')

    {{-- <div class="row">
      <div class="col-sm-6">
       
        <div class="dainfo">
          <h3>اذن صرف</h3>
        </div>
      </div>
    </div> --}}

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row" id="el" style="text-align: center">
                    @foreach ($boxes as $box)
                        <div class="col-md-12" style="display:block; width:100%; border:none; padding: 14px 28px; font-size: 16px; cursor: pointer; text-align: center">
                                    <p>شركة النجار للاسماك المملحة</p>
                                    <p style="padding-right:50px;">{{$export->branch->name}}</p>
                                    {{-- {!!DNS1D::getBarcodeHTML($box->barcode, 'C128', 2, 60)!!} --}}
                                    <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($box->barcode, 'C39'). '"/>' ?>
                                    <p style="padding-right:50px;">{{$box->barcode}}</p>
                                    <hr>
                        </div>
                    @endforeach
              </div>
              <br>
              <br>

            <div class="col-md-12">
                <div class="form-group buttonofff mt-4">
                    <button type="submit" class="btn btn-info" onClick="PrintReceiptContent('print')">طباعة</button>
                    <button type="button" class="btn btn-outline-secondary" onclick="history.back();">الغاء</button>
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
{{-- print section --}}
<script>
    function PrintReceiptContent(el)
    {
        var data = '<input type="button" id="printPageButton" class="printPageButton" style="display:block; width:100%; border:none; background-color: #008B8B; color: #fff; padding: 14px 28px; font-size: 16px; cursor: pointer; text-align: center" value="طباعة الباركود" onClick="window.print()">';
            data += document.getElementById("el").innerHTML;
        myReceipt = window.open("", "myWin", "left=150, top=130, width=400, height=400");
        myReceipt.screnX = 0;
        myReceipt.screnY = 0;
        myReceipt.document.write(data);
        myReceipt.document.title = "طباعة باركود";
        myReceipt.focus();
        setTimeout(() => {
            myReceipt.close();
        }, 9000);

    }
</script>
@endsection