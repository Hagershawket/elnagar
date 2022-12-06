@extends('admin.master')
@section('title', 'فيديوهات استرشاديه')
@section('css')

@endsection
@section('header_title', 'فيديوهات استرشاديه')
@section('content')

        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="dainfo">
                    <h3> فيديوهات استرشاديه </h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-lg-6">
                <div class="butonmodr text-left">
                    <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>اضافة الجديدة </a>
                </div>
            </div>
            <div class="counteriesoff">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center">#</th>
                                    <th class="text-center"> الفيديو </th>
                                    <th class="text-center"> رابط الفديو من اليوتيوب </th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($medias as $media)
                                    <tr class="text-center">
                                        <td style="text-align:center">{{$i++}}</td>
                                        <td>
                                            @if($media->media)
                                                <video width="300" height="200" controls>
                                                    <source src="{{ asset($media->media) }}" type="video/mp4">
                                                </video>
                                            @else
                                                <img width="150" src="{{asset('images/zummXD2dvAtI.png')}}"></td>
                                            @endif
                                        </td>
                                        <td>
                                            @if($media->video_link)
                                                <iframe width="420" height="315"
                                                    src="https://www.youtube.com/embed/{{$media->video_link}}">
                                                </iframe>
                                            @else
                                                <img width="150" src="{{asset('images/zummXD2dvAtI.png')}}"></td>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="conhhh text-center">
                                                <a href="#" style="color: white;"
                                                    class="action quickview btn btn-success" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $media->id }}"><i
                                                        class="far fa-edit"></i> تعديل </a>

                                                <a href="#" style="color: white;" type="button"
                                                    class="action quickview btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop"><i class="fas fa-trash-alt"></i>
                                                    حذف</a>
                                        </td>
                                    </tr>
                                    <div class="countermodel contentmoder">
                                        <div class="modal fade" id="editModal{{ $media->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="heading-title">تعديل بيانات الفديوهات الاسترشادية </h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">x</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="cobtervvvbb">
                                                            <form action="{{route('media.update',$media->id)}}" method="POST" enctype="multipart/form-data">
                                                                {{ method_field('patch') }}
                                                                @csrf
                                                                <div class="bd-examplepl">
                                                                    <div class="row">
                                                                        <p class="italic"><small>الحقول التى تحتوى على
                                                                                هذه العلامة (*) حقول مطلوبة.</small></p>

                                                                                <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                                    <label>  رفع الفيديو </label>
                                                                                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                                                                                    <div class="">
                                                                                        <input class="form-control" name="media" type="file" value="{{ $media->media }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                                    <label for="projectinput1"> تعديل رابط الفيديو</label>
                                                                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                                                        <input type="url" class="form-control" name="video_link">
                                                                                        @error("video_link")
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                        @enderror
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

                                    <!--Delete Modal -->
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
                                                    <form action="{{ route('media.destroy', $media->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('Delete')
                                                        <h4>
                                                             <span style="color: red"> هل انت  متاكد من الحذف</span>
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
                                <!--Delete Modal -->
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
                            <h4 class="heading-title"> اضافة  فيديو</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">x</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="cobtervvvbb">
                                <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="bd-examplepl">
                                        <div class="row">
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label> رفع الفيديو </label>
                                                <i class="fa fa-video-camera" aria-hidden="true"></i>
                                                <input class="form-control" name="media" type="file">
                                                @error("media")
                                                        <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                <label for="projectinput1">رابط الفيديو</label>
                                                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                    <input type="url" class="form-control" name="video_link">
                                                    @error("video_link")
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                <div class="buttonofff">
                                                    <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">غلق</button>              
                                                    <button type="submit" class="btn btn-info">حفظ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- bd-examplepl -->
                                    </form>
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
