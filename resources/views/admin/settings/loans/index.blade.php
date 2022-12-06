@extends('admin.master')
@section('title', 'القروض')
@section('css')

@endsection
@section('header_title', 'القروض')
@section('content')
    
        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3> القروض </h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="butonmodr text-left">
                    <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>اضافة الجديدة </a>
                </div>
            </div>
            <div class="counteriesoff">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center">#</th>
                                    <th class="text-center"> مبلغ القرض </th>
                                    <th class="text-center">اسم البنك</th>
                                    <th class="text-center"> نسبه الفائده</th>
                                    <th class="text-center"> تاريخ بدايه القرض </th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td style="text-align:center">{{$i++}}</td>
                                        <td class="text-center">{{ $loan->amount }}</td>
                                        <td class="text-center">{{ $loan->bank }}</td>
                                        <td class="text-center">{{ $loan->rate }} % </td>
                                        <td class="text-center">{{ $loan->from_date }}</td>
                                        <td>
                                            <div class="conhhh text-center">
                                                <a href="#" style="color: white;"
                                                    class="action quickview btn btn-success" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $loan->id }}"><i
                                                        class="far fa-edit"></i> تعديل </a>

                                                <a href="#" style="color: white;" type="button"
                                                    class="action quickview btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop"><i class="fas fa-trash-alt"></i>
                                                    حذف</a>

                                                <a href="#" style="color: white; background:#086c85" type="button"
                                                    class="action quickview btn " data-bs-toggle="modal"
                                                    data-bs-target="#add{{ $loan->id }}">
                                                    <i class="fas fa-file"></i>
                                                    سداد قسط </a>

                                                <a href="{{ route('loan_installments.show', $loan->id) }}"
                                                    style="color: white; background:#8f650b" type="button"
                                                    class="action quickview btn ">
                                                    <i class="fas fa-file"></i>
                                                    تقرير اقساط </a>




                                        </td>
                                    </tr>
                                    <div class="countermodel contentmoder">
                                        <div class="modal fade" id="editModal{{ $loan->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="heading-title">تعديل بيانات قرض </h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">x</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="cobtervvvbb">
                                                            <form action="{{ route('loans.update', $loan->id) }}"
                                                                method="POST">
                                                                {{ method_field('patch') }}
                                                                @csrf
                                                                <div class="bd-examplepl">
                                                                    <div class="row">
                                                                        <p class="italic"><small>الحقول التى تحتوى على
                                                                                هذه العلامة (*) حقول مطلوبة.</small></p>
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> مبلغ القرض *</label>
                                                                            <div class="controlsopop">
                                                                                <i class="fa fa-money"
                                                                                    aria-hidden="true"></i>
                                                                                <input class="form-control" type="text"
                                                                                    name="amount" placeholder="" required
                                                                                    value="{{ $loan->amount }}">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> اسم البنك *</label>
                                                                            <div class="controlsopop">
                                                                                <i class="fa fa-university"
                                                                                    aria-hidden="true"></i>
                                                                                <input class="form-control" type="text"
                                                                                    name="bank" placeholder="" required
                                                                                    value="{{ $loan->bank }}">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> نسبه الفائده *</label>
                                                                            <div class="controlsopop">
                                                                                <i class="fa fa-percent"
                                                                                    aria-hidden="true"></i>
                                                                                <input class="form-control" type="text"
                                                                                    name="rate" placeholder="" required
                                                                                    value="{{ $loan->rate }}">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> تاريخ بدايه القرض *</label>
                                                                            <div class="controlsopop">

                                                                                <input class="form-control" type="date"
                                                                                    name="from_date" placeholder=""
                                                                                    required
                                                                                    value="{{ $loan->from_date }}">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                                            <div class="buttonofff">
                                                                                <button type="submit"
                                                                                    class="btn btn-info">تحديث</button>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary">الغاء</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </form>
                                                        </div><!-- bd-examplepl -->
                                                    </div><!-- cobtervvvbb -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="countermodel contentmoder">
                                        <div class="modal fade" id="add{{ $loan->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="heading-title"> سداد قسط </h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">x</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="cobtervvvbb">
                                                            <form
                                                                action="{{ route('loan_installments.update', $loan->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="bd-examplepl">
                                                                    <div class="row">

                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> مبلغ الفائده</label>
                                                                            <div class="controlsopop">
                                                                                <i class="fa fa-money"
                                                                                    aria-hidden="true"></i>
                                                                                <input class="form-control" type="text"
                                                                                    name="amount"
                                                                                    placeholder="اضف المبلغ" required>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> تاريخ السداد</label>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control" type="date"
                                                                                    name="date" placeholder=""
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> رفع ايصال السداد </label>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control" type="file"
                                                                                    name="image" required>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">

                                                                            <div class="controlsopop">
                                                                                <i class="fa fa-university"
                                                                                    aria-hidden="true"></i>
                                                                                <input class="form-control" type="text"
                                                                                    name="loan_id" placeholder="" required
                                                                                    hidden value="{{ $loan->id }}">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                                            <div class="buttonofff">
                                                                                <button type="submit"
                                                                                    class="btn btn-info">حفظ</button>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary">الغاء</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </form>
                                                        </div><!-- bd-examplepl -->
                                                    </div><!-- cobtervvvbb -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        <div class="countermodel contentmoder">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="heading-title"> اضافة بيانات قرض</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">x</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="cobtervvvbb">
                                <div class="bd-examplepl glooo">
                                    <form action="{{ route('loans.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> مبلغ القرض </label>
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="amount" type="text"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> اسم البنك </label>
                                                <i class="fa fa-university" aria-hidden="true"></i>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="bank" type="text"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> نسبه الفائده </label>
                                                <i class="fa fa-percent" aria-hidden="true"></i>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="rate" type="text"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> تاريخ بدايه القرض </label>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="from_date" type="date"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                <div class="buttonofff">
                                                    <button type="submit" class="btn btn-info">حفظ</button>
                                                    <button type="button"
                                                        class="btn btn-outline-secondary">الغاء</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- bd-examplepl -->
                            </div><!-- cobtervvvbb -->
                        </div>
                    </div>
                </div>
            </div><!-- Modal end -->
        </div>
        @endsection
        @section('scripts')
            @include('sweetalert::alert')
        @endsection
