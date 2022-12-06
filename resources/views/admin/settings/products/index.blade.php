@extends('admin.master')
@section('title', 'الاصناف')
@section('css')

@endsection
@section('header_title', 'الاصناف')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3>الاصناف</h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="butonmodr text-left">
                    <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>اضافة الجديدة
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
                <div class="col-md-9 col-sm-9 pl-0">
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align:center">#</th>
                                <th style="text-align:center">الاسم</th>
                                <th style="text-align:center">كود الصنف </th>
                                <th style="text-align:center">وحدة القياس </th>
                                <th style="text-align:center">المستودع </th>
                                <th style="text-align:center">كمية التنبيه </th>
                                <th style="text-align:center">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($Products as $product)
                                <tr>
                                    <td style="text-align:center">{{$i++}}</td>
                                    <td class="text-center">{{ $product->name }}</td>
                                    <td class="text-center">{{ $product->code }}</td>
                                    <td class="text-center">{{ $product->unit->unit_name }}</td>
                                    <td class="text-center">{{ $product->warehouse->name }}</td>
                                    <td class="text-center">{{ $product->alert_quantity }}</td>

                                    <td>
                                        <div class="conhhh text-center">
                                            <a href="#" style="color: white;" class="action quickview btn btn-success"
                                                data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $product->id }}"><i
                                                    class="far fa-edit"></i> تعديل </a>
                                                    <a href="#"  style="color: white;" class="action quickview btn btn-sm btn-danger p-2" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#DeleteModal{{$product->id}}"><i class="fas fa-trash-alt"></i> حذف </a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Edit Modal Start -->
                                <div class="countermodel contentmoder">
                                    <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="heading-title">تعديل الصنف</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">x</span></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="cobtervvvbb">

                                                        <form action="{{ route('products.update', $product->id) }}"
                                                            method="POST">
                                                            {{ method_field('patch') }}
                                                            @csrf
                                                            <div class="bd-examplepl">
                                                                <div class="row">
                                                                    <p class="italic"><small>الحقول التى تحتوى على
                                                                            هذه العلامة (*) حقول مطلوبة.</small></p>
                                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> الاسم *</label>
                                                                        <div class="controlsopop">
                                                                            <i class="fas fa-user"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="name" placeholder="" required
                                                                                value="{{ $product->name }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> كود الصنف </label>
                                                                        <div class="controlsopop">
                                                                            <i class="fas fa-user"></i>
                                                                            <input class="form-control" type="text"
                                                                                name="code" placeholder=""
                                                                                value="{{ $product->code }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> وحدة القياس *</label>
                                                                        <select id="ctl00_ContentPlaceHolder1_DropUser"
                                                                            class="form-control" name="unit_id"
                                                                            required>
                                                                            @foreach ($units as $unit)
                                                                                <option value="{{ $unit->id }}"
                                                                                    @if ($unit->id == $product->unit->id) selected @endif>
                                                                                    {{ $unit->unit_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> اسم المستودع *</label>
                                                                        <select id="ctl00_ContentPlaceHolder1_DropUser"
                                                                            class="form-control" name="warehouse_id"
                                                                            required>
                                                                            @foreach ($warehouses as $warehouse)
                                                                                <option value="{{ $warehouse->id }}"
                                                                                    @if ($warehouse->id == $product->warehouse->id) selected @endif>
                                                                                    {{ $warehouse->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                        <label> كمية التنبيه </label>
                                                                        <div class="controlsopop">
                                                                            <i class="far fa-envelope"></i>
                                                                            <input type="text" name="alert_quantity" placeholder="اضافة"
                                                                                class="form-control" value="{{$product->alert_quantity}}">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div
                                                                    class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                                    <div class="buttonofff">
                                                                        <button type="button"
                                                                        class="btn btn-secondary">غلق</button>
                                                                            <button type="submit"
                                                                            class="btn btn-info">تعديل</button>
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
                            <!-- Edit Modal end -->
                            <!-- Delete modal start -->
                            <div class="modal fade" id="DeleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="col-md-6">
                                        <h4 class="heading-title">حذف صنف </h4>
                                        </div>
                                        <div class="col-md-6">
                                        <button type="button" class="close" style="padding-right:220px;" data-bs-dismiss="modal" aria-label="Close">x</button>
                                        </div>
                                    </div>
                                        <form action="{{route('products.destroy',$product->id)}}" method="post">
                                            {{ method_field('Delete') }}
                                            @csrf
                                            <input id="id" type="hidden" name="id" class="form-control" value="{{ $product->id }}">
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
    </div>

 <!-- ADD Modal Start -->
    <div class="contentmoder">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="heading-title">اضافة صنف </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic"><small>الحقول التى تحتوى على
                            هذه العلامة (*) حقول مطلوبة.</small></p>
                        <div class="row">
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 col-sm-12 col-lg-12 pl-0 mb-25 pr-0 pl-0">
                                    <div class="cobtervvvbb">
                                        <div class="datapriii">
                                        </div>
                                    </div>
                                    <div class="bd-examplepl">
                                        <div class="row">
                                            <div class="form-group col-12 labelform">
                                                <label> الاسم *</label>
                                                <div class="controlsopop">
                                                    <i class="far fa-envelope"></i>
                                                    <input type="text" name="name" placeholder="اضافة"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 labelform">
                                                <label> كود الصنف </label>
                                                <div class="controlsopop">
                                                    <i class="far fa-envelope"></i>
                                                    <input type="text" name="code" placeholder="اضافة"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 labelform">
                                                <label> وحدة القياس *</label>
                                                <select id="ctl00_ContentPlaceHolder1_DropUser" class="form-control"
                                                    name="unit_id">
                                                    <option value=""> حدد الوحدة</option>
                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->id }}">{{ $unit->unit_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-12 labelform">
                                                <label> اسم المستودع *</label>
                                                <select id="ctl00_ContentPlaceHolder1_DropUser" class="form-control"
                                                    name="warehouse_id">
                                                    <option value=""> حدد المستودع</option>
                                                    @foreach ($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-12 labelform">
                                                <label> كمية التنبيه </label>
                                                <div class="controlsopop">
                                                    <i class="far fa-envelope"></i>
                                                    <input type="text" name="alert_quantity" placeholder="اضافة"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                <div class="buttonofff">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                                                          غلق</button>
                                                          <button type="submit" class="btn btn-info">حفظ</button>
                                                      </div>
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
    </div>
<!-- ADD Modal end -->

@endsection
@section('scripts')
    @include('sweetalert::alert')
@endsection
