@extends('admin.master')
@section('title', ' كشف حساب ')
@section('css')

@endsection
@section('header_title', ' كشف حساب ')
@section('content')

    
        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3>  كشف حساب  </h3>
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
                                <th class="text-center">ايداع</th>
                                <th class="text-center">عمولة ايداع</th>
                                <th class="text-center">سحب</th>
                                <th class="text-center">الايصال</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                ?>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $account->date }}</td>
                                    <td class="text-center">{{ $account->amount_plus }}</td>
                                    <td class="text-center">{{ $account->commission }}</td>
                                    <td class="text-center">{{ $account->amount_minus }}</td>
                                    <td style="text-align:center"><img width="50" src="{{ asset($account->image ?? '') }}"></td>
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
