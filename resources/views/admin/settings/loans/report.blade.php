@extends('admin.master')
@section('title', 'تقرير سداد القروض ')
@section('css')

@endsection
@section('header_title', 'تقرير سداد القروض')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="dainfo">
                    <h3> تقرير سداد القروض </h3>
                   <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="butonmodr text-left">
                            <a href="{{ route('loans.index') }}" class="btn btn-info"
                               ><i class="fa fa-fast-backward" aria-hidden="true"></i>الرجوع لشاشه القروض</a>
                        
                    </div>
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center"> تاريخ السداد </th>
                                    <th class="text-center"> المبلغ المسدد </th>
                                    <th class="text-center">  ايصال السداد </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($installments as $installment)
                                    <tr>
                                        <td class="text-center">{{ $installment->date }}</td>
                                        <td class="text-center">{{ $installment->amount }}</td>
                                     
                                         <td style="text-align:center">
                                            <img  width="50"src="{{ asset( $installment->image ) }}" alt="image">
                                            
                                            
                                         </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                  

                </div>
            </div>
        </div>
    </div>





    @endsection
    @section('scripts')
        @include('sweetalert::alert')
    @endsection
