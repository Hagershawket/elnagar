@extends('admin.master')
@section('title','الزى الرسمي')
@section('css')
    
@endsection
@section('header_title','الزى الرسمي')
@section('content')

<div class="page-wrapper offcontt">
    <div class="row">
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="dainfo">
          <h3>الزى الرسمي</h3>
        </div>
      </div>
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="butonmodr text-left">
          <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>اضافة الجديدة </a>
        </div>
      </div>
    </div><!-- row -->

    <div class="counteriesoff">
      <div class="row">
        <div class="col-md-9 col-sm-9 pl-0">
          <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                  <th style="text-align:center">الاسم</th>
                  <th style="text-align:center">الكمية</th>
                  <th style="text-align:center">النوع</th>
                  <th style="text-align:center">العمليات</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($uniforms as $uniform)
                  <tr>
                    <td class="text-center">{{$uniform->name}}</td>
                    <td class="text-center">{{$uniform->quantity}}</td>
                    @if($uniform->type ==0)
                        <td style="text-align: center; color:#11ce2a;">ملابس صيفية</td>
                    @else
                        <td style="text-align: center;color:#ED6B27; "> ملابس شتوية</td>
                    @endif
                    <td>
                      <div class="conhhh text-center">
                        <a href="#"  style="color: white;" class="action quickview btn btn-sm btn-success" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#editModal{{$uniform->id}}"><i class="far fa-edit"></i> تعديل </a>
                      </div>
                    </td>
                  </tr>
                  <div class="countermodel contentmoder">
                  <div class="modal fade" id="editModal{{ $uniform->id }}" tabindex="-1"
                    role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="heading-title">تعديل الزى الرسمي</h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">x</span></button>
                            </div>
                           
                            <div class="modal-body">

                                <div class="cobtervvvbb">

                                    <form action="{{ route('uniforms.update', $uniform->id) }}" method="POST">
                                        {{ method_field('patch') }}
                                        @csrf
                                        <div class="bd-examplepl">
                                            <div class="row">
                                                <p class="italic"><small>الحقول التى تحتوى على
                                                        هذه العلامة (*) حقول مطلوبة.</small></p>
                                            
                                                <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                    <label> الاسم *</label>
                                                    <div class="controlsopop">
                                                        <i class="fas fa-user"></i>
                                                        <input class="form-control" type="text"
                                                            name="unit_name" placeholder="" required
                                                            value="{{ $uniform->name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                    <label> الكمية  *</label>
                                                    <div class="controlsopop">
                                                        <i class="fas fa-user"></i>
                                                        <input class="form-control" type="text"
                                                            name="unit_code" placeholder="" required
                                                            value="{{ $uniform->quantity }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-12 labelform">
                                                    <label for="inputEmail4"><strong>اختر نوع الزى </strong></label>
                                                    <select class="form-control" name="type">
                                                        <option value="0" @if($uniform->type ==0) selected @endif>صيفي</option>
                                                        <option value="1" @if($uniform->type ==1) selected @endif>شتوى</option>
                                                      </select>
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
          </div>
                @endforeach
            </tbody>
        </table>
  
        </div>
        
  
    
      </div>
    </div>
  </div>
  <div class="contentmoder">

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="heading-title">اضافة زي رسمي </h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <form action="{{route('uniforms.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="col-md-12 col-sm-12 col-lg-12 pl-0 mb-25 pr-0 pl-0">
                <div class="cobtervvvbb">
                  <div class="datapriii">
                    </div>
                  </div>
                  <div class="bd-examplepl">
                      <div class="row">
                        <div class="form-group col-12 labelform">
                          <label>  الاسم </label>
                          <div class="controlsopop">
                            <i class="far fa-envelope"></i>
                            <input type="text" name="name" placeholder="اضافة" class="form-control">
                          </div>
                        </div>
                        <div class="form-group col-12 labelform">
                            <label>  الكمية </label>
                            <div class="controlsopop">
                              <i class="far fa-envelope"></i>
                              <input type="number" name="quantity" placeholder="اضافة" class="form-control">
                            </div>
                          </div>
                          <div class="form-group col-12 labelform">
                            <label for="inputEmail4"><strong>اختر نوع الزى </strong></label>
                            <select class="form-control" name="type">
                                <option selected>اختر نوع الزى </option>
                                <option value="0">صيفي</option>
                                <option value="1">شتوى</option>
                              </select>
                        </div>
                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                          <div class="buttonofff">
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
    </div>
    <!-- Modal end -->
  </div>
 

@endsection
@section('scripts')
  @include('sweetalert::alert')
@endsection