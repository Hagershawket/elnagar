@extends('admin.master')
@section('title', 'المستودعات')
@section('css')

@endsection
@section('header_title', 'المستودعات')
@section('content')

    
        <div class="heabottom">

        </div><!-- heabottom -->
        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3>المستودعات</h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="butonmodr text-left">
                    <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view"
                        data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i>اضافة مستودع
                    </a>
                </div>
            </div>
        </div><!-- row -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
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

                                <th style="text-align:center">الاسم</th>
                                <th style="text-align:center">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($warehouses as $warehouse)
                                <tr>
                                    <td class="text-center">{{ $warehouse->name }}</td>
                                    <td>
                                        <div class="conhhh text-center">
                                            <a href="#" style="color: white;" class="action quickview btn btn-success"
                                                data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $warehouse->id }}"><i
                                                    class="far fa-edit"></i> تعديل </a>
                                                    <a href="#" style="color: white; background:#7c5cc4;" class="action quickview btn"
                                                data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#showModal{{ $warehouse->id }}"><i
                                                    class="far fa-eye"></i> عرض الاصناف </a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Edit Modal Start-->
                                    <div class="modal fade" id="editModal{{ $warehouse->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> تحديث بيانات المستودع</h5>
                                            <div class="col-md-3">
                                                <button type="button" class="close" style="float:left;" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                              </div>
                                            </div>
                                            <form action="{{route('warehouses.update',$warehouse->id)}}" method="POST">
                                                @method('PATCH')
                                            @csrf
                                            <div class="modal-body">
                                                <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                                                <label for="inputState"><strong> اسم المستودع *</strong></label>
                                                <input class="form-control" type="text" name="name" placeholder="اضافة" value="{{$warehouse->name}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                                                    غلق</button>
                                                <button type="submit" class="btn btn-info">حفظ</button>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- Edit Modal End -->

                                    <!-- Show Modal Start-->
                                    <div class="modal fade" id="showModal{{ $warehouse->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> عرض الاصناف</h5>
                                            <div class="col-md-3">
                                                <button type="button" class="close" style="float:left;" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            </div>
                                            </div>
                                            <div class="modal-body">
                                                    @if ($warehouse->products->isEmpty())
                                                        <div class="col-md-6">
                                                            <strong style="position:relative; color:red">  لا يوجد اصناف </strong>
                                                        </div>
                                                    @else
                                                    <div class="row g-2" >
                                                        <div class="col-md-6">
                                                            @foreach ($warehouse->products as $product)
                                                                <div class="" style="margin-top: 15px">
                                                                    <ul>
                                                                        <li style="list-style: disc;"><strong style="position:relative;">  {{$product->name}} </strong> </li>
                                                                    </ul>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        {{-- <div class="col-md-6">
                                                            <span><img src="{{asset('images/logo.png')}}" style="width: 120px;padding-top: 12px;"></span>
                                                        </div> --}}
                                                    </div>
                                                    @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                                                    غلق</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- Show Modal End -->

                                @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>

                    <!-- ADD Modal Start-->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">اضافة مستودع</h5>
                            <div class="col-md-3">
                                <button type="button" class="close" style="float:left;" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                            </div>
                            </div>
                            <form action="{{route('warehouses.store')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                                <label for="inputState"><strong> اسم المستودع *</strong></label>
                                <input class="form-control" type="text" name="name" placeholder="اضافة" id="example-number-input">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                                    غلق</button>
                                <button type="submit" class="btn btn-info">حفظ</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <!-- ADD Modal End -->
@endsection
@section('scripts')
    @include('sweetalert::alert')
@endsection
