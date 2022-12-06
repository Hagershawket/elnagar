@extends('admin.master')
@section('title', ' تقرير حساب مستثمر')
@section('css')

@endsection
@section('header_title', ' تقرير حساب مستثمر')
@section('content')

    
        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3>  تقرير حساب  {{$installment->name}}</h3>
                </div>
            </div>
        </div><!-- row -->

        <div class="counteriesoff">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">التاريخ</th>
                                <th class="text-center">اضافة</th>
                                {{-- <th class="text-center">سحب</th> --}}
                                <th class="text-center">الايصال</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                ?>
                            @foreach ($installment_actions as $action)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $action->date }}</td>
                                    <td class="text-center">{{ $action->amount_plus }}</td>
                                    {{-- <td class="text-center">{{ $action->amount_minus }}</td> --}}
                                    <td style="text-align:center"><img width="50" src="{{asset($action->image ? $action->image : 'images/zummXD2dvAtI.png')}}"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
      
    @endsection
