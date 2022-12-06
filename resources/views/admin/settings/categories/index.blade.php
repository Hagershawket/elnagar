@extends('admin.master')
@section('title', 'مجموعات الاصناف ')
@section('css')

@endsection
@section('header_title', 'مجموعات الاصناف')
@section('content')

 <div class="page-wrapper offcontt">
        <div class="heabottom">
            <div class="menu-wrapper">
             
            </div>
        </div><!-- heabottom -->
        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3>مجموعات الاصناف</h3>
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

                                <th style="text-align:center">الاسم</th>
                               
                                <th style="text-align:center">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $category->name }}</td>
                                   
                                    <td>
                                        <div class="conhhh text-center">
                                            <a href="#" style="color: white;" class="action quickview btn btn-success"
                                                data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $category->id }}"><i
                                                    class="far fa-edit"></i> تعديل </a>
                                                    <a href="#"  style="color: white;" class="action quickview btn btn-sm btn-danger p-2" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#DeleteModal{{$category->id}}"><i class="fas fa-trash-alt"></i> حذف </a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Edit Modal Start -->
                                <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="col-md-6">
                                        <h5 class="modal-title" id="exampleModalLabel">تعديل مجموعه الاصناف</h5>
                                            </div>
                                        <div class="col-md-6">
                                            <button type="button" class="close" style="padding-right:220px;" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                        </div>
                                        </div>
                                        <form action="{{ route('categories.update',$category->id) }}" method="POST">
                                            @method('PATCH')
                                        @csrf
                                        <div class="modal-body">
                                            <p class="italic"><small>الحقول التى تحتوى على
                                                هذه العلامة (*) حقول مطلوبة.</small></p>
                                            <input type="hidden" name="id" value="{{$category->id}}">
                                            <div class="form-group  labelform">
                                                <label> الاسم *</label>
                                                <div class="controlsopop">
                                                    <i class="fa fa-list-alt"></i>
                                                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">غلق</button>              
                                            <button type="submit" class="btn btn-info">تعديل</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                <!-- Edit Modal end -->
                                <!-- Delete modal start -->
                                <div class="modal fade" id="DeleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="col-md-6">
                                            <h4 class="heading-title">حذف مجموعة اصناف </h4>
                                            </div>
                                            <div class="col-md-6">
                                            <button type="button" class="close" style="padding-right:220px;" data-bs-dismiss="modal" aria-label="Close">x</button>
                                            </div>
                                        </div>
                                            <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                <input id="id" type="hidden" name="id" class="form-control" value="{{ $category->id }}">
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
                </div>
                </tbody>
                </table>

            </div>



        </div>
    </div>
    </div> 

    <!-- ADD Modal Start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <div class="col-md-6">
              <h5 class="modal-title" id="exampleModalLabel">اضافة مجموعه الاصناف</h5>
                </div>
              <div class="col-md-6">
                <button type="button" class="close" style="padding-right:220px;" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
              </div>
            </div>
            <form action="{{ route('categories.store') }}" method="POST">
              @csrf
              <div class="modal-body">
                <p class="italic"><small>الحقول التى تحتوى على
                    هذه العلامة (*) حقول مطلوبة.</small></p>
                <div class="form-group  labelform">
                    <label> الاسم *</label>
                    <div class="controlsopop">
                        <i class="fa fa-list-alt"></i>
                        <input type="text" name="name" placeholder="اضافة" class="form-control" value="{{ Request::old('name') }}">
                            @error('name')
                              <small style="color: red;">
                                {{$message}}
                              </small> 
                            @enderror
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">غلق</button>              
                <button type="submit" class="btn btn-info">حفظ</button>
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
