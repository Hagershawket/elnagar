@extends('admin.master')
@section('title', ' المصاريف الرئيسيه ')
@section('css')

@endsection
@section('header_title', ' المصاريف الرئيسيه ')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="dainfo">
                    <h3>   المصاريف الرئيسيه </h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" text-left">
                    <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view"
                        data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: white;"><i class="fa fa-plus"></i>  اضافة الجديدة
                    </a>
                    <a href="{{ route('sub_expenses.index') }}" class="btn btn-warning" style="color: white;">  مصروفات فرعيه 
                    </a>
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
                <div class="col-md-12 col-sm-12 pl-0">
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align:center"># </th>
                                <th style="text-align:center"> البنود الرئيسيه</th>
                                <th style="text-align:center">العمليات</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($mainexpenses as $mainexpense)
                                <tr>
                                    <td style="text-align:center">{{$i++}}</td>
                                    <td class="text-center">{{ $mainexpense->name }}</td>
                                    <td>
                                        <div class="conhhh text-center">
                                            <a href="#" style="color: white;" class="action quickview btn btn-success"
                                                data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $mainexpense->id }}"><i
                                                    class="far fa-edit"></i> تعديل </a>


                                            <a href="#" style="color: white;" class="action quickview btn btn-danger"
                                                data-link-action="quickview" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $mainexpense->id }}"><i
                                                    class="fas fa-trash-alt"></i>
                                                حذف </a>


                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editModal{{ $mainexpense->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="col-md-6">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل مصروف </h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="close" style="padding-right:220px;"
                                                        data-bs-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">x</span></button>
                                                </div>
                                            </div>
                                            <form action="{{ route('main_expenses.update', $mainexpense->id) }}"
                                                method="POST">
                                                @method('PATCH')
                                                @csrf
                                                <div class="modal-body">
                                                    <p class="italic"><small>الحقول التى تحتوى على
                                                            هذه العلامة (*) حقول مطلوبة.</small></p>
                                                    <div class="form-group  labelform">
                                                        <label> البنود الرئيسيه *</label>
                                                        <div class="controlsopop">
                                                            <i class="fa fa-list-alt"></i>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $mainexpense->name }}">
                                                        </div>
                                                    </div>
                                               
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-info">حفظ</button>
                                                    <button type="button" class=" btn btn-secondary"
                                                        data-bs-dismiss="modal" aria-label="Close">غلق</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="delete{{ $mainexpense->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="col-md-6">
                                                    <h5 class="modal-title" id="exampleModalLabel">حذف مصروف </h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="close" style="padding-right:220px;"
                                                        data-bs-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">x</span></button>
                                                </div>
                                            </div>
                                            <form action="{{ route('main_expenses.destroy', $mainexpense->id) }}"
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
                            @endforeach
                </div>
                </tbody>
                </table>

            </div>



        </div>

    <!-- ADD Modal Start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-6">
                        <h5 class="modal-title" id="exampleModalLabel"> اضافة مصروف </h5>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="close" style="padding-right:220px;" data-bs-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                </div>
                <form action="{{ route('main_expenses.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p class="italic"><small>الحقول التى تحتوى على
                                هذه العلامة (*) حقول مطلوبة.</small></p>
                       
                        <div class="form-group  labelform">
                            <label> البند الرئيسى  *</label>
                            <div class="controlsopop">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                <input type="text" name="name" placeholder=" اضافة بند رئيسى " class="form-control">
                            </div>
                        </div>
                     
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">حفظ</button>
                        <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal"
                            aria-label="Close">غلق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ADD Modal end -->



@endsection
@section('scripts')
    @include('sweetalert::alert')
@endsection
