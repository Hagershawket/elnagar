@extends('admin.master')
@section('title', 'الوحدات')
@section('css')

@endsection
@section('header_title', 'الوحدات')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3>الوحدات</h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="butonmodr text-left">
                    <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>اضافة الجديدة </a>
                </div>
            </div>
        </div><!-- row -->

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="counteriesoff">
            <div class="row">
                <div class="col-md-9 col-sm-9 pl-0">
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align:center"># </th>
                                <th style="text-align:center">الاسم</th>
                                <th style="text-align:center">الترميز</th>
                                <th style="text-align:center">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($units as $unit)
                                <tr>
                                    <td style="text-align:center">{{$i++}}</td>
                                    <td class="text-center">{{ $unit->unit_name }}</td>
                                    <td class="text-center">{{ $unit->unit_code }}</td>
                                    <td>
                                        <div class="conhhh text-center">
                                            <a href="#" style="color: white;" class="action quickview btn btn-success"
                                                data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $unit->id }}"><i class="far fa-edit"></i>
                                                تعديل </a>
                                            <a href="#" style="color: white;"
                                                class="action quickview btn btn-sm btn-danger p-2"
                                                data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#DeleteModal{{ $unit->id }}"><i
                                                    class="fas fa-trash-alt"></i> حذف </a>

                                        </div>
                                    </td>
                                </tr>
                                <div class="countermodel contentmoder">
                                    <div class="modal fade" id="editModal{{ $unit->id }}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="heading-title">تعديل الوحده</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">x</span></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="cobtervvvbb">

                                                        <form action="{{ route('units.update', $unit->id) }}"
                                                            method="POST">
                                                            {{ method_field('patch') }}
                                                            @csrf
                                                            <div class="bd-examplepl">
                                                                <div class="row">
                                                                    <p class="italic"><small>الحقول التى تحتوى على
                                                                            هذه العلامة (*) حقول مطلوبة.</small></p>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $unit->id }}">
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> اسم الوحدة *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fas fa-user"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="unit_name" placeholder="" required
                                                                                value="{{ $unit->unit_name }}">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> الترميز *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fas fa-user"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="unit_code" placeholder="" required
                                                                                value="{{ $unit->unit_code }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                                    <div class="buttonofff">
                                                                        <button type="button" class=" btn btn-secondary"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close">غلق</button>
                                                                        <button type="submit"
                                                                            class="btn btn-info">حفظ</button>
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
                </div>
                <!-- Delete modal start -->
                <div class="modal fade" id="DeleteModal{{ $unit->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="col-md-6">
                                    <h4 class="heading-title">حذف وحده </h4>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="close" style="padding-right:220px;"
                                        data-bs-dismiss="modal" aria-label="Close">x</button>
                                </div>
                            </div>
                            <form action="{{ route('units.destroy', $unit->id) }}" method="post">
                                {{ method_field('Delete') }}
                                @csrf
                                <input id="id" type="hidden" name="id" class="form-control"
                                    value="{{ $unit->id }}">
                                <div class="modal-body">هل أنت متاكد من الحذف</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">غلق</button>
                                    <button class="btn btn-danger" type="submit">حذف</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Delete modal End -->
                @endforeach
                </tbody>
                </table>

            </div>



        </div>
    <div class="contentmoder">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="heading-title">اضافة وحده </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <p class="italic"><small>الحقول التى تحتوى على
                                    هذه العلامة (*) حقول مطلوبة.</small></p>
                            <form action="{{ route('units.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 col-sm-12 col-lg-12 pl-0 mb-25 pr-0 pl-0">
                                    <div class="cobtervvvbb">
                                        <div class="datapriii">
                                        </div>
                                    </div>
                                    <div class="bd-examplepl">
                                        <div class="row">
                                            <div class="form-group col-12 labelform">
                                                <label> اسم الوحدة *</label>
                                                <div class="controlsopop">
                                                    <i class="far fa-envelope"></i>
                                                    <input type="text" name="unit_name" placeholder="اضافة"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 labelform">
                                                <label> الترميز *</label>
                                                <div class="controlsopop">
                                                    <i class="far fa-envelope"></i>
                                                    <input type="text" name="unit_code" placeholder="اضافة"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                <div class="buttonofff">
                                                    <button type="button" class=" btn btn-secondary"
                                                        data-bs-dismiss="modal" aria-label="Close">غلق</button>
                                                    <button type="submit" class="btn btn-info">حفظ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- bd-examplepl -->
                                </div><!-- cobtervvvbb -->
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Modal end -->


@endsection
@section('scripts')
    @include('sweetalert::alert')
@endsection
