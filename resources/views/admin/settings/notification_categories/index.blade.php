@extends('admin.master')
@section('title','فئات الاشعارات')
@section('css')
    
@endsection
@section('header_title','فئات الاشعارات')
@section('content')

    <div class="row">
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="dainfo">
          <h3>فئات الاشعارات </h3>
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
              
                  <th style="text-align:center">العمليات</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                  <tr>
                    <td class="text-center">{{$category->name}}</td>
                 
                    <td>
                      <div class="conhhh text-center">
                        <a href="#"  style="color: white;" class="action quickview btn btn-success" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#editModal{{$category->id}}"><i class="far fa-edit"></i> تعديل </a>
                       <a href="#" style="color: white;" type="submit" class="btn btn-sm btn-danger p-2"><i class="fas fa-trash-alt"></i> حذف</a>
                      </div>
                    </td>
                  </tr>
                  <div class="countermodel contentmoder">
                  <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1"
                    role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="heading-title">تعديل </h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">x</span></button>
                            </div>
                           
                            <div class="modal-body">

                                <div class="cobtervvvbb">

                                    <form action="{{ route('notification_categories.update', $category->id) }}" method="POST">
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
                                                            name="name" placeholder="" required
                                                            value="{{ $category->name }}">
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
          </div>
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
            <h4 class="heading-title">اضافة  </h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <form action="{{route('notification_categories.store')}}" method="POST" enctype="multipart/form-data">
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
                     
                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                          <div class="buttonofff">
                            <button type="submit" class="btn btn-info">حفظ</button>
                            <button type="button" class="btn btn-outline-secondary">الغاء</button>
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