@extends('admin.master')
@section('title', 'حسابات البنوك')
@section('css')

@endsection
@section('header_title', 'حسابات البنوك')
@section('content')

    
        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3>حسابات البنوك</h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="butonmodr text-left">
                    <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>اضافة الجديدة </a>
                </div>
            </div>
        </div><!-- row -->

        <div class="counteriesoff">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">اسم البنك</th>
                                <th class="text-center">رقم الحساب</th>
                                <th class="text-center">اسم صاحب الحساب</th>
                                <th class="text-center">IBAN </th>
                                <th class="text-center"> رصيد الحساب</th>
                                <th class="text-center">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td class="text-center">{{ $account->bank_name }}</td>
                                    <td class="text-center">{{ $account->account_num }}</td>
                                    <td class="text-center">{{ $account->name }}</td>
                                    <td class="text-center">{{ $account->ibn }}</td>
                                    <td class="text-center">{{ $account->total }}</td>
                                    <td>
                                        <div class="conhhh text-center">
                                            <a href="#" style="color: white;" class="action quickview btn btn-success"
                                                data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $account->id }}"><i class="far fa-edit"></i>
                                                تعديل </a>

                                            <a href="#" style="color: white;" type="submit" class="btn btn-danger"><i
                                                    class="fas fa-trash-alt"></i>حذف</a>

                                            <a class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $account->id }}">
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i> ايداع</a>

                                            <a href="" style="color: white;" class="btn btn-warning"
                                                data-bs-toggle="modal" data-bs-target="#myModal{{ $account->id }}">
                                                <i class="fa fa-minus-circle" aria-hidden="true"></i> سحب</a>

                                                <a href="{{ route('all',$account->id) }}" style="color: white;" class="btn btn-primary active">
                                                <i class="fa fa-address-card" aria-hidden="true"></i> تقرير حساب </a>




                                    </td>
                                </tr>
                                <div class="countermodel contentmoder">
                                    <div class="modal fade" id="editModal{{ $account->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="heading-title">تعديل الحساب</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">x</span></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="cobtervvvbb">

                                                        <form action="{{ route('bank_accounts.update', $account->id) }}"
                                                            method="POST">
                                                            {{ method_field('patch') }}
                                                            @csrf
                                                            <div class="bd-examplepl">
                                                                <div class="row">
                                                                    <p class="italic"><small>الحقول التى تحتوى على
                                                                            هذه العلامة (*) حقول مطلوبة.</small></p>

                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> اسم البنك *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fas fa-user"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="bank_name" placeholder="" required
                                                                                value="{{ $account->bank_name }}">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> رقم الحساب *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fas fa-user"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="account_num" placeholder="" required
                                                                                value="{{ $account->account_num }}">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> اسم صاحب الحساب *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fas fa-user"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="name" placeholder="" required
                                                                                value="{{ $account->name }}">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> IBAN *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fas fa-user"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="ibn" placeholder="" required
                                                                                value="{{ $account->ibn }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                    <label> رصيد الحساب *</label>
                                                                    <div class="controlsopop">
                                                                        <i class="fas fa-user"></i>
                                                                        <input class="form-control" type="text"
                                                                            name="account_balance" placeholder="" required
                                                                            value="{{ $account->total }}">
                                                                    </div>
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
                                {{-- ------------- plus   -------------------- --}}
                                <div class="countermodel contentmoder">
                                    <div class="modal fade" id="staticBackdrop{{ $account->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="heading-title"> ايداع الى الحساب</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">x</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="cobtervvvbb">
                                                        <form action="{{ route('plus', $account->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="bd-examplepl">
                                                                <div class="row">
                                                                    <p class="italic"><small>الحقول التى تحتوى على
                                                                            هذه العلامة (*) حقول مطلوبة.</small></p>
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> رصيد الحساب</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="total" placeholder="" disabled
                                                                                value="{{ $account->total }}">
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
                                                                        <label> عمولة الايداع </label>
                                                                        <div class="controlsopop">
                                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="commission"
                                                                                placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                    <label> رفع ايصال  *</label>
                                                                    <div class="controlsopop">
                                                                        <i class="fa fa-money" aria-hidden="true"></i>
                                                                        <input class="form-control" type="file"
                                                                            name="image" required>
                                                                    </div>
                                                                </div>
                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                                        <div class="buttonofff">
                                                                            <button type="submit"
                                                                                class="btn btn-info">ايداع </button>
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
                                {{-------------------------minus----------------- --}}
                                <div class="countermodel contentmoder">
                                    <div class="modal fade" id="myModal{{ $account->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="heading-title"> سحب من الحساب </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">x</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="cobtervvvbb">

                                                        <form action="{{ route('minus', $account->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="bd-examplepl">
                                                                <div class="row">
                                                                    <p class="italic"><small>الحقول التى تحتوى على
                                                                            هذه العلامة (*) حقول مطلوبة.</small></p>

                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> رصيد الحساب</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="total" placeholder="" disabled
                                                                                value="{{ $account->total }}">
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
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> المبلغ *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="amount_minus"
                                                                                placeholder="ادخل المبلغ " required>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                    class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                    <label> رفع ايصال  *</label>
                                                                    <div class="controlsopop">
                                                                        <i class="fa fa-money" aria-hidden="true"></i>
                                                                        <input class="form-control" type="file"
                                                                            name="image" required>
                                                                    </div>
                                                                </div>
                                                                    <div
                                                                        class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                                        <div class="buttonofff">
                                                                            <button type="submit" class="btn btn-info">
                                                                                سحب </button>
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
                                 {{-- ------------- all Action   -------------------- --}}
                                 <div class="countermodel contentmoder">
                                    <div class="modal fade" id="all{{ $account->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="heading-title"> تقرير حساب  </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">x</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="cobtervvvbb">
                                                        
                                                    
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
    

{{---Create------------------------}}
    <div class="countermodel contentmoder">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="heading-title">اضافة حساب بنكي</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">

                        <div class="cobtervvvbb">


                            <div class="bd-examplepl glooo">
                                <form action="{{ route('bank_accounts.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                            <label>اسم البنك</label>
                                            <div class="controlsopop">
                                                <input class="form-control" name="bank_name" type="text"
                                                    placeholder="اضافة">
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                            <label>رقم الحساب</label>
                                            <div class="controlsopop">
                                                <input class="form-control" name="account_num" type="text"
                                                    placeholder="اضافة">
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                            <label>اسم صاحب الحساب</label>
                                            <div class="controlsopop">
                                                <input class="form-control" name="name" type="text"
                                                    placeholder="اضافة">
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                            <label>IBAN</label>
                                            <div class="controlsopop">
                                                <input class="form-control" name="ibn" type="text"
                                                    placeholder="اضافة">
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                            <label>رصيد الحساب </label>
                                            <div class="controlsopop">
                                                <input class="form-control" name="account_balance" type="text"
                                                    placeholder="اضافة">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                            <div class="buttonofff">
                                                <button type="submit" class="btn btn-info">حفظ</button>
                                                <button type="button" class="btn btn-outline-secondary">الغاء</button>
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

        {{-- Plus --}}




    @endsection
    @section('scripts')
        @include('sweetalert::alert')
    @endsection
