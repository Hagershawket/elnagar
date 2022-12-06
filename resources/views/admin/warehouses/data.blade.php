@extends('admin.master')
@section('title', 'بيانات المستودع')
@section('css')

@endsection
@section('header_title', 'بيانات المستودع')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3>بيانات مستودع {{$warehouse->name}}</h3>
                </div>
            </div>
        </div><!-- row -->
        <div class="counteriesoff">
            <div class="row">
                <div class="col-md-12 col-sm-12 pl-0">
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                                <tr>
                                    <th style="text-align:center">#</th>
                                    <th style="text-align:center">اسم الصنف</th>
                                    <th style="text-align:center">الوزن</th>
                                    <th style="text-align:center">العدد</th>
                                    <th style="text-align:center">السعر</th>
                                    <th style="text-align:center">القيمة</th>
                                    <th style="text-align:center">كارت الصنف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td class="text-center">{{ $product->product->name }}</td>
                                        <td class="text-center">{{ $product->weight }}</td>
                                        <td class="text-center">{{ $product->qty }}</td>
                                        <td class="text-center">{{ $product->unit_cost }}</td>
                                        <td class="text-center">{{ $product->total }}</td>
                                        <td class="text-center"><a href="{{route('warehouse.productCard',$product->id)}}"> <i class="fa fa-id-card" aria-hidden="true"></i></a></td>
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
@endsection
