@extends('admin.master')
@section('title', ' تقرير مصاريف ')
@section('css')

@endsection
@section('header_title', ' تقرير مصاريف ')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="dainfo">
                    <h3> تقرير مصاريف  </h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" text-left">
                    <a href="{{ route('expense_recording.index') }}" class="action quickview btn btn-info"
                    style="color: white; background:#7c5cc4" type="button"><i class="fa fa-plus"></i>
                    تسجيل مصروف </a>

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
                                <th style="text-align:center">#</th>
                                <th style="text-align:center">  المصروف</th>
                                <th style="text-align:center">  التاريخ </th>
                                <th style="text-align:center">  المبلغ </th>
                                <th style="text-align:center">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($expenserecording as $expenserecording)
                                <tr>
                                    <td style="text-align:center">{{$i++}}</td>
                                    <td class="text-center">{{ $expenserecording->sub_id }}</td>
                                    <td class="text-center">{{ $expenserecording->date }}</td>
                                    <td class="text-center">{{ $expenserecording->grand_total }}</td>
                                    <td>
                                        <div class="conhhh text-center">
                                            <a href="#" style="color: white;" class="action quickview btn btn-success"
                                                data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $expenserecording->id }}"><i
                                                    class="far fa-edit"></i> تعديل </a>


                                            <a href="#" style="color: white;" class="action quickview btn btn-danger"
                                                data-link-action="quickview" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $expenserecording->id }}"><i
                                                    class="fas fa-trash-alt"></i>
                                                حذف </a>
                                        

                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editModal{{ $expenserecording->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="col-md-6">
                                                    <h5 class="modal-title" id="exampleModalLabel"> تعديل مصروف  </h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="close" style="padding-right:220px;"
                                                        data-bs-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">x</span></button>
                                                </div>
                                            </div>
                                            <form action="{{ route('expense_recording.update', $expenserecording->id) }}"
                                                method="POST">
                                                @method('PATCH')
                                                @csrf
                                                <div class="modal-body">
                                                    <p class="italic"><small>الحقول التى تحتوى على
                                                            هذه العلامة (*) حقول مطلوبة.</small></p>
                                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                <label> البنود الرئيسيه *</label>
                                                                <select id="ctl00_ContentPlaceHolder1_DropUser" class="form-control"
                                                                    name="main_id" required>
                                                                    @foreach ($mainexpenses as $mainexpense)
                                                                        <option value="{{ $mainexpense->id }}"
                                                                            @if ($mainexpense->id == $mainexpense->id) selected @endif>
                                                                            {{ $mainexpense->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                <label> البنود الفرعيه *</label>
                                                                <select id="ctl00_ContentPlaceHolder1_DropUser" class="form-control"
                                                                    name="sub_id" required>
                                                                    @foreach ($subexpenses as $subexpense)
                                                                        <option value="{{ $subexpense->id }}"
                                                                            @if ($subexpense->id == $subexpense->main->id) selected @endif>
                                                                            {{ $subexpense->name }}</option>
                                                                    @endforeach
                                                                </select>
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

                                <div class="modal fade" id="delete{{ $expenserecording->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('expense_recording.destroy', $expenserecording->id) }}"
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
                                <div class="modal fade" id="add{{ $expenserecording->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="col-md-6">
                                                    <h5 class="modal-title" id="exampleModalLabel"> تسجيل مصروف </h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="close" style="padding-right:220px;"
                                                        data-bs-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">x</span></button>
                                                </div>
                                            </div>
                                            <form action="{{ route('sub_expenses.destroy', $expenserecording->id) }}"
                                                method="POST">

                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                        <label> البنود الفرعيه *</label>
                                                        <div class="controlsopop">
                                                            <i class="fa fa-list-alt"></i>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $expenserecording->name }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                        <label> التاريخ  *</label>
                                                        <div class="controlsopop">
                                                          
                                                            <input type="date" name="name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                        <label> المبلغ  *</label>
                                                        <div class="controlsopop">
                                                            <i class="fa fa-usd" aria-hidden="true"></i>
                                                            <input type="text" name="name" class="form-control">
                                                        </div>
                                                    </div>
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
                        <h5 class="modal-title" id="exampleModalLabel"> اضافة مصروف فرعى </h5>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="close" style="padding-right:220px;" data-bs-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                </div>
                <form action="{{ route('sub_expenses.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p class="italic"><small>الحقول التى تحتوى على
                                هذه العلامة (*) حقول مطلوبة.</small></p>

                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                            <select  class="form-control SlectBox" name="main_id" required>
                                <option value="" selected disabled>حدد البند الرئيسى</option>
                            
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                            <label> البنود الفرعيه *</label>
                            <div class="controlsopop">
                                <i class="fa fa-list-alt"></i>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">حفظ</button>
                        <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal"
                            aria-label="Close">الغاء</button>
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
