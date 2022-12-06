@extends('admin.master')
@section('title', 'المستثمرين ')
@section('css')

@endsection
@section('header_title', 'المستثمرين')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="dainfo">
                    <h3> المستثمرين </h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="butonmodr text-left">
                    <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>اضافة الجديدة </a>
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
                                    <th class="text-center"> # </th>
                                    <th class="text-center">اسم المستثمر</th>
                                    <th class="text-center"> الرقم القومى </th>
                                    <th class="text-center"> العنوان </th>
                                    <th class="text-center"> رقم الهاتف </th>
                                    <th class="text-center"> المبلغ الاساسى </th>
                                    <th class="text-center"> مبلغ الاستثمار </th>
                                    <th class="text-center"> نسبة الارباح </th>
                                    <th class="text-center"> ارباح الاستثمار </th>
                                    <th class="text-center"> تاريخ الاشتراك </th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                @foreach ($investors as $investor)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td class="text-center">{{ $investor->name }}</td>
                                        <td class="text-center">{{ $investor->national_num }}</td>
                                        <td class="text-center">{{ $investor->address }}</td>
                                        <td class="text-center">{{ $investor->phone }}</td>
                                        <td class="text-center">{{ $investor->main_amount }}</td>
                                        <td class="text-center">{{ $investor->investment_amount }}</td>
                                        <td class="text-center">{{ $investor->rate }}</td>
                                        <td class="text-center">{{ $investor->profit_amount }}</td>
                                        <td class="text-center">{{ $investor->date }}</td>
                                        <td>
                                            <div class="conhhh text-center">
                                                <a href="#" style="color: white;"
                                                    class="action quickview btn btn-success" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $investor->id }}"><i
                                                        class="far fa-edit"></i> تعديل </a>

                                                <a href="#" style="color: white;" class="action quickview btn btn-danger"
                                                    data-link-action="quickview" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $investor->id }}"><i
                                                        class="fas fa-trash-alt"></i>
                                                    حذف </a>

                                                <a class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#plus{{ $investor->id }}">
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i> دفع ارباح</a>

                                                {{-- <a href="" style="color: white;" class="btn btn-warning"
                                                    data-bs-toggle="modal" data-bs-target="#minus{{ $investor->id }}">
                                                <i class="fa fa-minus-circle" aria-hidden="true"></i> سحب</a> --}}

                                                <a href="{{ route('investors.show',$investor->id) }}" style="color: white;" class="btn btn-primary active">
                                                    <i class="fa fa-address-card" aria-hidden="true"></i> كارت التفاصيل </a>

                                        </td>
                                    </tr>

                                    <!-- Start Edit Model-->
                                    <div class="countermodel contentmoder">
                                        <div class="modal fade" id="editModal{{ $investor->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="heading-title">تعديل بيانات مستثمر </h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">x</span></button>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="cobtervvvbb">

                                                            <form action="{{ route('investors.update', $investor->id) }}"
                                                                method="POST">
                                                                {{ method_field('patch') }}
                                                                @csrf
                                                                <div class="bd-examplepl">
                                                                    <div class="row">
                                                                        <p class="italic"><small>الحقول التى تحتوى على
                                                                                هذه العلامة (*) حقول مطلوبة.</small></p>
                                                                        <input type="hidden" name="id" value="{{ $investor->id }}">
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> اسم المستثمر *</label>
                                                                            <i class="fas fa-user"></i>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control" type="text"
                                                                                    name="name" placeholder=""
                                                                                    value="{{ $investor->name }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> مبلغ الاستثمار *</label>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control" type="number"
                                                                                    name="amount" placeholder=""
                                                                                    value="{{ $investor->amount }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> تاريخ الاشتراك </label>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control" type="date"
                                                                                    name="date" placeholder=""
                                                                                    value="{{ $investor->amount }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> الرقم القومى </label>
                                                                            <i class="fa fa-money"
                                                                                    aria-hidden="true"></i>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control" type="number"
                                                                                    name="national_num"
                                                                                    value="{{ $investor->national_num }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> رقم الهاتف </label>
                                                                            <i class="fa fa-money"
                                                                                    aria-hidden="true"></i>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control" type="text"
                                                                                    name="phone"
                                                                                    value="{{ $investor->phone }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> العنوان </label>
                                                                            <i class="fa fa-money"
                                                                                    aria-hidden="true"></i>
                                                                            <div class="controlsopop">
                                                                                <textarea class="form-control" type="text"
                                                                                    name="address">{{ $investor->address }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
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
                                <!-- End Edit Model-->

                                <!-- Start Plus Model-->
                                <div class="countermodel contentmoder">
                                    <div class="modal fade" id="plus{{ $investor->id }}" tabindex="-1"
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
                                                        <form action="{{ route('investor_plus', $investor->id) }}"
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
                                                                                name="profit_amount" placeholder="" disabled
                                                                                value="{{ $investor->profit_amount }}">
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
                                    <div class="modal fade" id="minus{{ $investor->id }}" tabindex="-1"
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
                                                        <form action="{{ route('investor_minus', $investor->id) }}"
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
                                                                                value="{{ $investor->amount }}">
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
                                <div class="modal fade" id="delete{{ $investor->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="col-md-6">
                                                    <h5 class="modal-title" id="exampleModalLabel">حذف مسثمر </h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="close" style="padding-right:220px;"
                                                        data-bs-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">x</span></button>
                                                </div>
                                            </div>
                                            <form action="{{ route('investors.destroy', $investor->id) }}"
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


        <!-- Start Add Model -->
        <div class="countermodel contentmoder">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="heading-title"> اضافة بيانات مستثمر</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">x</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="cobtervvvbb">
                                <div class="bd-examplepl glooo">
                                    <form action="{{ route('investors.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <p class="italic"><small>الحقول التى تحتوى على
                                                هذه العلامة (*) حقول مطلوبة.</small></p>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> اسم المستثمر *</label>
                                                <i class="fas fa-user"></i>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="name" type="text"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> مبلغ الاستثمار *</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="investment_amount" type="number"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> المبلغ الاساسى *</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="main_amount" type="number"
                                                        placeholder="اضافة">
                                                </div>
                                            </div><div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> نسبة الارباح  %</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="rate" type="number"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> تاريخ الاشتراك </label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="date" type="date"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> الرقم القومى </label>
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="national_num" type="number"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> رقم الهاتف </label>
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="phone" type="text"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label>  العنوان </label>
                                                <i class="fa fa-money" aria-hidden="true"></i>
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
