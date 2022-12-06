@extends('admin.master')
@section('title', 'وسائل النقل')
@section('css')

@endsection
@section('header_title', 'وسائل النقل')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="dainfo">
                    <h3> وسائل النقل </h3>
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
                                    <th style="text-align:center"># </th>
                                    <th class="text-center"> النوع </th>
                                    <th class="text-center">رقم اللوحة</th>
                                    <th class="text-center">رقم الساشيه</th>
                                    <th class="text-center">جهة المرور الصادر منها</th>
                                    <th class="text-center"> بدايه الترخيص</th>
                                    <th class="text-center">نهايه الترخيص</th>
                                    <th class="text-center">صور المستندات</th>
                                    <th class="text-center">المواصفات</th>
                                    <th class="text-center"> العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($transports as $transport)
                                    <tr>
                                        <td style="text-align:center">{{$i++}}</td>
                                        <td class="text-center">{{ $transport->type }}</td>
                                        <td class="text-center">{{ $transport->num }}</td>
                                        <td class="text-center">{{ $transport->chassis_num }}</td>
                                        <td class="text-center">{{ $transport->organization_name }}</td>
                                        <td class="text-center">{{ $transport->start_date }}</td>
                                        <td class="text-center">{{ $transport->exp_date }}</td>
                                        <td style="text-align:center">
                                            <?php $images = explode(',', $transport->image);?>
                                            @foreach ( $images as $image)
                                                <img width="100" src="{{ $image }}">
                                            @endforeach
                                        </td>
                                        <td class="text-center">{{ $transport->description }}</td>
                                        <td>
                                            <div class="conhhh text-center">
                                                <a href="#" style="color: white;"
                                                    class="action quickview btn btn-success" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $transport->id }}"><i
                                                        class="far fa-edit"></i> تعديل </a>


                                                <a href="#" style="color: white;" type="button"
                                                    class="action quickview btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop"><i class="fas fa-trash-alt"></i>
                                                    حذف</a>

                                              
                                                     {{-- <a href="#" style="color: white; background:#0dcaf0" type="button"
                                                     class="action quickview btn " data-bs-toggle="modal"
                                                     data-bs-target="#addexpeness{{ $transport->id }}">
                                                     <i class="fas fa-duotone fa-traffic-light"></i>
                                                      خط سير</a> --}}
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">حذف</h5>
                                                    <h3 type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">X</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('Transports.destroy', $transport->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('Delete')
                                                        <h4>
                                                             <span style="color: red"> هل انت  متاكد من حذف</span>  {{ $transport->type }}  <span style="color: red"> رقم </span> {{ $transport->num }}
                                                        </h4>

                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                            <div class="buttonofff">
                                                                <button type="submit" class="btn btn-info">موافق</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">الغاء</button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="countermodel contentmoder">
                                        <div class="modal fade" id="editModal{{ $transport->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="heading-title">تعديل بيانات وسيله نقل </h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">x</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="cobtervvvbb">
                                                            <form
                                                                action="{{ route('Transports.update', $transport->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                {{ method_field('patch') }}
                                                                @csrf
                                                                <div class="bd-examplepl">
                                                                    <div class="row">
                                                                        <p class="italic"><small>الحقول التى تحتوى على
                                                                                هذه العلامة (*) حقول مطلوبة.</small></p>
                                                                                <input type="hidden" name="id" value="{{$transport->id}}">
                                                                                <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> اختر النوع *</label>
                                                                            <select id="ctl00_ContentPlaceHolder1_DropUser"
                                                                                class="form-control" name="type">
                                                                                <option value="سياره"
                                                                                    @if ($transport->type == 'سياره') selected @endif>
                                                                                    سياره</option>
                                                                                <option value="موتوسيكل"
                                                                                    @if ($transport->type == 'موتوسيكل') selected @endif>
                                                                                    موتوسيكل</option>
                                                                                <option value="تروسيكل"
                                                                                    @if ($transport->type == 'تروسيكل') selected @endif>
                                                                                    تروسيكل</option>
                                                                            </select>
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> رقم اللوحة *</label>
                                                                            <div class="controlsopop">
                                                                                <i class="fa fa-car"
                                                                                    aria-hidden="true"></i>
                                                                                <input class="form-control" type="text"
                                                                                    name="num" placeholder=""
                                                                                    value="{{ $transport->num }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> رقم الساشيه </label>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control" name="chassis_num" type="text"
                                                                                    placeholder="اضافة" value="{{ $transport->chassis_num }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> جهة المرور الصادر منها الرخصة *</label>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control" name="organization_name" type="text"
                                                                                    placeholder="اضافة" value="{{ $transport->organization_name}}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-6 col-md-6 col-lg-6 pr-0 pl-0 labelform">
                                                                            <label> تاريخ بدايه الترخيص * </label>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control"
                                                                                    name="start_date" type="date"
                                                                                    value="{{ $transport->start_date }}">
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="form-group col-6 col-md-6 col-lg-6 pr-0 pl-0  labelform">
                                                                            <label> تاريخ نهايه الترخيص *</label>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control"
                                                                                    name="exp_date" type="date"
                                                                                    value="{{ $transport->exp_date }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0  labelform">
                                                                            <label> رفع صوره الرخصه او اى مستندات اخرى</label>
                                                                            <span class="text-danger ml-1">يمكنك اختيار اكثر من صورة</span>

                                                                            <div class="controlsopop">
                                                                                <input class="form-control" name="image[]" type="file" multiple>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> المواصفات </label>
                                                                            <div class="controlsopop">
                                                                                <textarea class="form-control" name="description" rows="5"
                                                                                    placeholder="اضافة">{{$transport->description}}</textarea>
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

                                    {{-- <div class="countermodel contentmoder">
                                        <div class="modal fade" id="addexpeness{{ $transport->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="heading-title"> خط سير  </h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">x</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="cobtervvvbb">
                                                            <form
                                                                action="{{ route('Transports.update', $transport->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                {{ method_field('patch') }}
                                                                @csrf
                                                                <div class="bd-examplepl">
                                                                    <div class="row">
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> اختر النوع </label>
                                                                            <select id="ctl00_ContentPlaceHolder1_DropUser"
                                                                                class="form-control" name="type" disabled
                                                                                >
                                                                                <option 
                                                                                    @if ($transport->id == $transport->type) selected @endif>
                                                                                    {{ $transport->type }}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                            <label> الرقم *</label>
                                                                            <div class="controlsopop">
                                                                                <i class="fa fa-car"
                                                                                    aria-hidden="true"></i>
                                                                                <input class="form-control" type="text"
                                                                                    name="num" placeholder=""
                                                                                    value="{{ $transport->num }}" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-5 col-md-5 col-lg-5 pr-0 pl-0  labelform">
                                                                            <label>من * </label>
                                                                            <div class="controlsopop">
                                                                                <input class="form-control" name="image"
                                                                                    type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                        class="form-group col-1 col-md-1 col-lg-1 pr-0 pl-0  labelform">
                                                                    </div>
                                                                    <div
                                                                    class="form-group col-1 col-md-1 col-lg-1 pr-0 pl-0  labelform">
                                                                </div>
                                                                        <div
                                                                        class="form-group col-5 col-md-5 col-lg-5 pr-0 pl-0  labelform">
                                                                        <label>الى  * </label>
                                                                        <div class="controlsopop">
                                                                            <input class="form-control" name="image"
                                                                                type="text">
                                                                        </div>
                                                                    </div>
                                                
                                                                <div
                                                                class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0  labelform">
                                                                <label>ملاحظات  * </label>
                                                                <div class="controlsopop">
                                                                    <input class="form-control" name=""
                                                                        type="text">
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
                                    </div> --}}
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
                            <h4 class="heading-title"> اضافة وسيله نقل</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">x</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="cobtervvvbb">
                                <div class="bd-examplepl glooo">
                                    <form action="{{ route('Transports.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <p class="italic"><small>الحقول التى تحتوى على
                                                هذه العلامة (*) حقول مطلوبة.</small></p>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> اختر النوع *</label>
                                                <select id="ctl00_ContentPlaceHolder1_DropUser" class="form-control"
                                                    name="type">
                                                    <option value="سياره">سياره</option>
                                                    <option value="موتوسيكل">موتوسيكل</option>
                                                    <option value="تروسيكل">تروسيكل</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> رقم اللوحة *</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="num" type="text"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> رقم الساشيه *</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="chassis_num" type="text"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> جهة المرور الصادر منها الرخصة *</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="organization_name" type="text"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-6 pr-0 pl-0 labelform">
                                                <label> تاريخ بدايه الترخيص *</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="start_date" type="date"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-md-6 col-lg-6 pr-0 pl-0  labelform">
                                                <label> تاريخ نهايه الترخيص *</label>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="exp_date" type="date"
                                                        placeholder="اضافة">
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0  labelform">
                                                <label> رفع صوره الرخصة او اى مستندات اخرى</label>
                                                <span class="text-danger ml-1">يمكنك اختيار اكثر من صورة</span>
                                                <br>
                                                <div class="controlsopop">
                                                    <input class="form-control" name="image[]" type="file" placeholder="اضافة" multiple>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> المواصفات </label>
                                                <div class="controlsopop">
                                                    <textarea class="form-control" name="description" rows="5"
                                                        placeholder="اضافة"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                <div class="buttonofff">
                                                    <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">غلق</button>              
                                                    <button type="submit" class="btn btn-info">حفظ</button>
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
