@extends('admin.master')
@section('title', 'كارت الصنف')
@section('css')

@endsection
@section('header_title', 'كارت الصنف')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3>كارت الصنف</h3>
                </div>
            </div>
        </div><!-- row -->

        <div class="row g-3">
            <div class="form-group col-md-4">
              <label><strong>  اسم الصنف </strong></label>
              <input type="text" name="startDate" class="form-control" disabled>
            </div>
            <div class="form-group col-md-4">
              <label><strong> رقم الصنف </strong></label>
              <input type="text" name="startDate" class="form-control" disabled>
            </div>
            <div class="form-group col-md-4">
              <label><strong> المستودع </strong></label>
              <input type="text" name="endDate" class="form-control" disabled>
            </div>
            <div class="form-group col-md-4">
                <label><strong> متوسط السعر </strong></label>
                <input type="text" name="endDate" class="form-control" disabled>
            </div>
            <div class="form-group col-md-4">
                <label><strong> وحدة القياس </strong></label>
                <input type="text" name="endDate" class="form-control" disabled>
            </div> 
        </div>

        <br><br>
        <div class="counteriesoff">
            <div class="row">
                <div class="col-md-12 col-sm-12 pl-0">
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>

                                <th style="text-align:center">تاريخ</th>
                                <th style="text-align:center">وارد</th>
                                <th style="text-align:center">صادر</th>
                                <th style="text-align:center">رصيد</th>
                                <th style="text-align:center">سعر الوحدة</th>
                                <th style="text-align:center">الاجمالى</th>
                                <th style="text-align:center">الفرع</th>
                                <th style="text-align:center">ملاحظات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actions as $action)
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">2</td>
                                    <td class="text-center">3</td>
                                    <td class="text-center">4</td>
                                    <td class="text-center">5</td>
                                    <td class="text-center">6</td>
                                    <td class="text-center">7</td>
                                    <td class="text-center">8</td>
                                    {{-- <td>
                                        <div class="conhhh text-center">
                                            <a href="#" style="color: white;" class="action quickview btn btn-success"
                                                data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $action->id }}"><i
                                                    class="far fa-edit"></i> تعديل </a>
                                                    <a href="#" style="color: white; background:#7c5cc4;" class="action quickview btn"
                                                data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#showModal{{ $action->id }}"><i
                                                    class="far fa-eye"></i> عرض الاصناف </a>
                                        </div>
                                    </td> --}}
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
