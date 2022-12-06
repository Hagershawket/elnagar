@extends('admin.master')
@section('title', 'الشركاء')
@section('css')

@endsection
@section('header_title', 'الشركاء ')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3> الشركاء</h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="butonmodr text-left">
                    <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view"
                        data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i>اضافة الجديدة </a>
                </div>
            </div>
        </div>
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
                    <div class="col-sm-12">
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center"># </th>
                                    <th class="text-center">اسم الشريك </th>
                                    <th class="text-center">الرقم القومى </th>
                                    <th class="text-center">العنوان </th>
                                    <th class="text-center">رقم الهاتف </th>
                                    <th class="text-center">تاريخ الشراكة </th>
                                    <th class="text-center"> مبلغ الشراكه </th>
                                    <th class="text-center">نسبه الشراكه </th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($partners as $partner)
                                    <tr>
                                        <td style="text-align:center">{{$i++}}</td>
                                        <td class="text-center">{{ $partner->name }}</td>
                                        <td class="text-center">{{ $partner->national_num }}</td>
                                        <td class="text-center">{{ $partner->address }}</td>
                                        <td class="text-center">{{ $partner->phone }}</td>
                                        <td class="text-center">{{ $partner->date }}</td>
                                        <td class="text-center">{{ $partner->amount }}</td>
                                        <td class="text-center">{{ $partner->rate }} % </td>
                                        <td>
                                            <div class="conhhh text-center">
                                                <a href="#" style="color: white;"
                                                    class="action quickview btn btn-success" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $partner->id }}"><i
                                                        class="far fa-edit"></i> تعديل </a>
                                                        
                                                        <a class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#plus{{ $partner->id }}">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> ارباح</a>
    
                                                    <a href="" style="color: white;" class="btn btn-warning"
                                                        data-bs-toggle="modal" data-bs-target="#minus{{ $partner->id }}">
                                                    <i class="fa fa-minus-circle" aria-hidden="true"></i> خسائر</a>
    
                                                    <a href="{{ route('partners.show',$partner->id) }}" style="color: white;" class="btn btn-primary active">
                                                        <i class="fa fa-address-card" aria-hidden="true"></i> تقرير حساب </a>
    
                                                        <a href="#" style="color: white;" class="action quickview btn btn-danger"
                                                        data-link-action="quickview" data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $partner->id }}"><i
                                                            class="fas fa-trash-alt"></i>
                                                        حذف </a>
                                        </td>
                                    </tr>
                                    <div class="countermodel contentmoder">
                                        <div class="modal fade" id="editModal{{ $partner->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="heading-title">تعديل الشريك </h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">x</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="cobtervvvbb">

                                                            <form action="{{ route('partners.update', $partner->id) }}"
                                                                method="POST">
                                                                {{ method_field('patch') }}
                                                                @csrf
                                                                <div class="bd-examplepl">
                                                                    <div class="row">
                                                                        <p class="italic"><small>الحقول التى تحتوى على
                                                                                هذه العلامة (*) حقول مطلوبة.</small></p>
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> اسم الشريك *</label>
                                                                            <div class="controlsopop">
                                                                                <i class="fas fa-user"></i>
                                                                                <input class="form-control" type="text"
                                                                                    name="name" placeholder=""
                                                                                    value="{{ $partner->name }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> مبلغ الشراكه *</label>
                                                                            <div class="controlsopop">
                                                                                <i class="fa fa-money"
                                                                                    aria-hidden="true"></i>
                                                                                <input class="form-control" type="text"
                                                                                    name="amount" placeholder=""
                                                                                    value="{{ $partner->amount }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> نسبه الشراكه %</label>
                                                                            <div class="controlsopop">
                                                                                <i class="fa fa-money"
                                                                                    aria-hidden="true"></i>
                                                                                <input class="form-control" type="text"
                                                                                    name="rate" placeholder=""
                                                                                    value="{{ $partner->rate }} ">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> تاريخ الشراكه </label>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control" type="date"
                                                                                    name="date"
                                                                                    value="{{ $partner->date }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> الرقم القومى </label>
                                                                            <div class="controlsopop">
                                                                                <i class="fa fa-money"
                                                                                    aria-hidden="true"></i>
                                                                                <input class="form-control" type="number"
                                                                                    name="national_num" placeholder=""
                                                                                    value="{{ $partner->national_num}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> رقم الهاتف </label>
                                                                            <div class="controlsopop">
                                                                                <i class="fa fa-money"
                                                                                    aria-hidden="true"></i>
                                                                                <input class="form-control" type="text"
                                                                                    name="phone" placeholder=""
                                                                                    value="{{ $partner->phone }} ">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> العنوان </label>
                                                                            <div class="controlsopop">
                                                                                <textarea class="form-control"
                                                                                    name="address" placeholder="">{{ $partner->address }}</textarea>
                                                                            </div>
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
                                        <!-- Start Plus Model-->
                                <div class="countermodel contentmoder">
                                    <div class="modal fade" id="plus{{ $partner->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="heading-title"> اضافة مبلغ </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">x</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="cobtervvvbb">
                                                        <form action="{{ route('partner_plus', $partner->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="bd-examplepl">
                                                                <div class="row">
                                                                    <p class="italic"><small>الحقول التى تحتوى على
                                                                            هذه العلامة (*) حقول مطلوبة.</small></p>
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> ارباح الاستثمار</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="total" placeholder="" disabled
                                                                                value="{{ $partner->amount }}">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> التاريخ *</label>
                                                                        <div class="controlsopop">
                                                                            <input class="form-control" type="date"
                                                                                name="date" placeholder="" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> المبلغ *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="amount_plus"
                                                                                placeholder="ادخل المبلغ " required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                    <label> رفع ايصال </label>
                                                                    <div class="controlsopop">
                                                                        <i class="fa fa-money" aria-hidden="true"></i>
                                                                        <input class="form-control" type="file"
                                                                            name="image">
                                                                    </div>
                                                                </div>
                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                                        <div class="buttonofff">
                                                                            <button type="submit"
                                                                                class="btn btn-info">اضافة </button>
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
                                <!-- End Plus Model-->

                                <!-- Start Minus Model-->
                                <div class="countermodel contentmoder">
                                    <div class="modal fade" id="minus{{ $partner->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="heading-title"> سحب مبلغ </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">x</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="cobtervvvbb">
                                                        <form action="{{ route('partner_minus', $partner->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="bd-examplepl">
                                                                <div class="row">
                                                                    <p class="italic"><small>الحقول التى تحتوى على
                                                                            هذه العلامة (*) حقول مطلوبة.</small></p>
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> ارباح الاستثمار</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="total" placeholder="" disabled
                                                                                value="{{ $partner->amount }}">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> التاريخ *</label>
                                                                        <div class="controlsopop">
                                                                            <input class="form-control" type="date"
                                                                                name="date" placeholder="" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> المبلغ *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="amount_minus" placeholder="ادخل المبلغ" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                    <label> رفع ايصال </label>
                                                                    <div class="controlsopop">
                                                                        <i class="fa fa-money" aria-hidden="true"></i>
                                                                        <input class="form-control" type="file"
                                                                            name="image">
                                                                    </div>
                                                                </div>
                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                                        <div class="buttonofff">
                                                                            <button type="submit"
                                                                                class="btn btn-info">اضافة </button>
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
                                <!-- End Minus Model-->
                                <!-- Start Delete Model-->
                                <div class="modal fade" id="delete{{ $partner->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="col-md-6">
                                                    <h5 class="modal-title" id="exampleModalLabel">حذف شريك </h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="close" style="padding-right:220px;"
                                                        data-bs-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">x</span></button>
                                                </div>
                                            </div>
                                            <form action="{{ route('partners.destroy', $partner->id) }}"
                                                method="POST">
                                                @method('Delete')
                                                @csrf
                                                <div class="modal-body">
                                                    <h4>
                                                        هل متاكد من الحذف
                                                    </h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-info">موافق</button>
                                                    <button type="button" class=" btn btn-secondary"
                                                        data-bs-dismiss="modal" aria-label="Close">الغاء</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--End Delete Model-->
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

        </div>


        <!-- Start Add Modal -->
        <div class="countermodel contentmoder">
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="heading-title">اضافة شريك </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">x</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="cobtervvvbb">
                                <div class="bd-examplepl glooo">
                                    <form action="{{ route('partners.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <p class="italic"><small>الحقول التى تحتوى على
                                                هذه العلامة (*) حقول مطلوبة.</small></p>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label>اسم الشريك *</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="name" type="text"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> مبلغ الشراكه *</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="amount" type="number"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> نسبه الشراكه %</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="rate" type="text"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>

                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> تاريخ الشراكة </label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="date" type="date"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label>  الرقم القومى </label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="national_num" type="number"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label>  رقم الهاتف </label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="phone" type="text"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label>  العنوان </label>
                                                <div class="controlsopop">
                                                    <textarea class="form-control" name="address"
                                                        placeholder="اضافة"></textarea>
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
            </div>
        </div>
        <!-- End Add Model -->

        @endsection
        @section('scripts')
            @include('sweetalert::alert')
        @endsection
