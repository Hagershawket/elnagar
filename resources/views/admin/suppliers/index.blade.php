@extends('admin.master')
@section('title',' الموردين')
@section('css')
    
@endsection
@section('header_title',' الموردين')
@section('content')

  <div class="row">
    <div class="col-sm-6">
     
      <div class="dainfo">
        <h3>الموردين</h3>
      </div>
    </div>
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="text-left">
          <a href="{{route('suppliers.create')}}" class="action quickview btn btn-info" style="color: white;"><i class="fa fa-plus"></i> اضافة مورد جديد </a>
          <a href="#" class="action quickview btn" style="color: white; background:#7c5cc4" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ImportModal"><i class="fa fa-copy"></i> رفع ملف </a>
        </div>
      </div>
    </div>

    <div class="counteriesoff">
      <div class="row">
        <div class="col-md-12 col-sm-12 pl-0">
          <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                  <th style="text-align:center">#</th>
                  <th style="text-align: right">الصورة</th>
                  <th style="text-align: right">الاسم</th>
                  <th style="text-align: right"> رقم التسجيل الضريبى</th>
                  <th style="text-align: right">رقم الجوال</th>
                  <th style="text-align: right">العنوان</th>
                  <th style="text-align: right">تاريخ التعامل</th>
                  <th style="text-align: center">العمليات</th>
                </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
                @foreach ($suppliers as $supplier)
                  <tr>
                    <td style="text-align:center">{{$i++}}</td>
                    <td><img width="50" src="{{asset($supplier->image ? $supplier->image : 'images/zummXD2dvAtI.png')}}"></td>
                    <td>{{$supplier->name}}</td>
                    <td>{{$supplier->reference_no}}</td>
                    <?php $phone = explode(',', $supplier->phone);?>
                    <td>{{$phone[0]}}</td>
                    <td>{{$supplier->address}}</td>
                    <td>{{$supplier->start_deal}}</td>
                    <td>
                      <div class="">
                       <a href="{{route('suppliers.edit',$supplier->id)}}" style="color: white;" class="action quickview btn btn-success btn-sm"><i class="far fa-edit"></i> تعديل</a>
                       <a href="{{route('suppliers.stop',['id' => $supplier->id, 'status' => $supplier->is_active == 1 ? 0 : 1])}}" style="color: white;" type="submit" class="btn btn-sm btn-{{$supplier->is_active == 1 ? 'danger' : 'info'}}"> {{$supplier->is_active == 1 ? 'إيقاف' : 'تفعيل' }}</a>
                       <a href="#" style="color: white;" class="action quickview btn btn-primary btn-sm" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#DetailsModal{{$supplier->id}}"><i class="far fa-eye"></i> مشاهدة </a>
                      </div>
                    </td>
                  </tr>

              <!-- Edit Modal Start-->
              {{-- <div class="contentmoder">
                <div class="modal fade" id="EditModal{{$supplier->id}}" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 600px;">
                      <div class="modal-header">
                        <h4 class="heading-title">تعديل مورد</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <p class="italic"><small>الحقول التى تحتوى على
                            هذه العلامة (*) حقول مطلوبة.</small></p>
                          <form action="{{route('suppliers.update',$supplier->id)}}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="id" value="{{$supplier->id}}">
                          <div class="col-md-12 col-sm-12 col-lg-12 pl-0 mb-25 pr-0 pl-0">
                            <div class="cobtervvvbb">
                              <div class="datapriii">
                                <div id="loaded-files" class="upload-image-thumbs">
                                  <div class="uploadimgle">
                                    <img width="50" src="{{asset($supplier->image ? $supplier->image : 'images/zummXD2dvAtI.png')}}"> 
                                  </div>
                                  <div class="btn btn-rounded aqua-gradient float-left waves-effect waves-light uesrnamephoto">
                                    <span>تغيير صورة المورد</span>
                                    <input type="file" name="image">
                                  </div>
                                </div>
                              </div>


                              <div class="bd-examplepl">
                                  <div class="row">
                                    <input type="hidden" name="id" value="{{$supplier->id}}">
                                    <div class="form-group col-12 col-md-4 col-lg-4 pr-0 labelform">
                                      <label>اسم المورد *</label>
                                      <div class="controlsopop">
                                        <i class="far fa-envelope"></i>
                                        <input type="text" name="name" class="form-control" value="{{$supplier->name}}">
                                        @error('name')
                                              <small style="color: red;">
                                                {{$message}}
                                              </small> 
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-group col-12 col-md-4 col-lg-4 pr-0 labelform">
                                      <label>تاريخ التعامل</label>
                                      <div class="controlsopop">
                                        <input class="form-control" type="date" name="start_deal" id="example-tel-input" value="{{$supplier->start_deal}}">
                                      </div>
                                    </div>
                                    <div class="form-group col-12 col-md-4 col-lg-4 pr-0 pl-0 labelform">
                                      <label>رقم الجوال *</label>
                                      <div class="controlsopop">
                                        <i class="fa fa-phone-square"></i>
                                        <input class="form-control" type="text" name="phone"  id="example-number-input" value="{{$supplier->phone}}">
                                        @error('phone')
                                              <small style="color: red;">
                                                {{$message}}
                                              </small> 
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-6 pr-0 labelform">
                                      <label>رقم الجوال بديل</label>
                                      <div class="controlsopop">
                                        <i class="fa fa-phone-square"></i>
                                        <input class="form-control" type="text" name="alternate_phone" id="example-text-input" value="{{$supplier->alternate_phone}}">
                                      </div>
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-6 pr-0 labelform">
                                      <label>رقم التسجيل الضريبى</label>
                                      <div class="controlsopop">
                                        <i class="fa fa-phone-square"></i>
                                        <input class="form-control" type="text" name="reference_no" id="example-text-input" value="{{$supplier->reference_no}}">
                                      </div>
                                    </div>
                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                      <label>العنوان</label>
                                      <div class="controlsopop">
                                        <i class="fab fa-wolf-pack-battalion"></i>
                                        <input type="text" name="address" class="form-control" value="{{$supplier->address}}">
                                      </div>
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-6 pr-0 labelform">
                                      <label>المبلغ المستحق</label>
                                      <div class="controlsopop">
                                        <i class="fab fa-wolf-pack-battalion"></i>
                                        <input type="text" name="due_amount" class="form-control" value="{{$supplier->due_amount}}">
                                      </div>
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-6 pr-0 labelform">
                                      <label> الارضية </label>
                                      <div class="controlsopop">
                                        <i class="fab fa-wolf-pack-battalion"></i>
                                        <input type="text" name="standard" class="form-control" value="{{$supplier->standard}}">
                                      </div>
                                    </div>
                                    {{-- <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 loeree">
                                      <h6 class="titecheck"> طرق الدفع الخاصة بالمورد </h6>
                                    </div>
                                @if($supplier->accounts->isEmpty())
                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0  repeater">
                                          
                                      <div data-repeater-list="group_aaa_edit" class="offrepp">
                                        <div data-repeater-item  class="row">
                                          
                                          <div class="form-group col-12 col-md-4 col-lg-4 pr-0 labelform ohhh">
                                            <label>الطرق</label>
                                            <div class="controlsopop">
                                              <i class="fa fa-user"></i>
                                              <select id="ctl00_ContentPlaceHolder1_DropUser" class="form-control" name="payment_method_id">
                                                <option value="">اختر</option>
                                                @foreach ( $methods as $method)
                                                  <option value="{{$method->id}}">{{$method->name}}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group col-12 col-md-4 col-lg-4 pr-0 labelform ohhh">
                                            <label>الرقم</label>
                                            <div class="controlsopop">
                                              <i class="fas fa-street-view"></i>
                                              <input type="text" name="account_num" class="form-control" value="">
                                            </div>
                                          </div>
                                          <div class="col-12 col-md-2 col-lg-2 pr-0" style="padding-top: 27px;">
                                            <button type="button" class="btn btn-outline-info" data-repeater-delete><i class="fas fa-minus fa-fw"></i></button>
                                          </div>
                                          <div class="col-12 col-md-2 col-lg-2 pr-0" style="padding-top: 27px;">
                                            <button type="button" class="btn btn-info bojour" data-repeater-create><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                      </div>
                                      
                                    </div>
                                @else
                                    @foreach ($supplier->accounts as $account)
                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0  repeater">
                                  
                                      <div data-repeater-list="group_aaa_edit" class="offrepp">
                                        <div data-repeater-item  class="row">
                                          
                                          <div class="form-group col-12 col-md-4 col-lg-4 pr-0 labelform ohhh">
                                            <label>الطرق</label>
                                            <div class="controlsopop">
                                              <i class="fa fa-user"></i>
                                              <select id="ctl00_ContentPlaceHolder1_DropUser" class="form-control" name="payment_method_id">
                                                <option value="">اختر</option>
                                                @foreach ( $methods as $method)
                                                  <option value="{{$method->id}}" @if($method->id == $account->payment_method_id) selected @endif>{{$method->name}}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group col-12 col-md-4 col-lg-4 pr-0 labelform ohhh">
                                            <label>الرقم</label>
                                            <div class="controlsopop">
                                              <i class="fas fa-street-view"></i>
                                              <input type="text" name="account_num" class="form-control" value="{{$account->account_num}}">
                                            </div>
                                          </div>
                                          <div class="col-12 col-md-2 col-lg-2 pr-0" style="padding-top: 27px;">
                                            <button type="button" class="btn btn-outline-info" data-repeater-delete><i class="fas fa-minus fa-fw"></i></button>
                                          </div>
                                          <div class="col-12 col-md-2 col-lg-2 pr-0" style="padding-top: 27px;">
                                            <button type="button" class="btn btn-info bojour" data-repeater-create><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                      </div>
                                      
                                    </div>
                                    @endforeach
                                @endif
                                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                      <div class="buttonofff">
                                        <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">غلق</button>
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
              </div> --}}
            <!-- Edit Modal End-->

            <!-- Details Modal Start-->
            <div  class="modal fade" id="DetailsModal{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content" style="width: 130%">
                    <div class="container mt-3 pb-2 border-bottom">
                      <div class="row">
                        <div class="col-md-3">
                          <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">بيانات المورد</h5>
                      </div>
                      <div class="col-md-6">
                          <h3 id="exampleModalLabel" class="modal-title text-center container-fluid"><img src="{{asset('images/logo.png')}}" width="50" height="50" alt=""></h3>
                      </div>
                      <div class="col-md-3">
                        <button type="button" class="close" style="float:left;" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                      </div>
                      <div class="col-md-12 text-center">
                          <i style="font-size: 15px;"><strong>شركة النجار للاسماك المملحة</strong></i>
                      </div>
                      <div class="col-md-12 text-center" id="purchase-invoice">
                        <i style="font-size: 15px;"></i>
                    </div>
                      </div>
                      </div>
                      <div class="modal-body">
                        <div class="row g-2">
                          <div class="col-md-6">
                             <label><strong> اسم المورد</strong></label>
                            <span> : </span>
                            <span style="margin-right: 5px">{{$supplier->name}}</span>
                          </div>
                        </div>
                        <div class="row g-2" style="margin-top: 10px">
                          <div class="col-md-6">
                            <strong> رقم التسجيل الضريبى</strong> 
                              <span> : </span>
                              <span style="margin-right: 5px">{{$supplier->reference_no}}</span>
                          </div>
                        </div>
                        <div class="row g-2" >
                          <div class="col-md-6">
                            <div class="" style="margin-top: 15px">
                              <strong style="position:relative">  رقم الهاتف </strong> 
                                <span> : </span>
                                <span style="margin-right: 5px">{{$supplier->phone}}</span>
                            </div>
                            <div class="" style="margin-top: 15px">
                              <strong style="position:relative">  العنوان </strong> 
                                <span> : </span>
                                <span style="margin-right: 5px">{{$supplier->address ?? 'لا يوجد'}}</span>
                            </div>
                            <div class="" style="margin-top: 15px">
                              <strong style="position:relative">  وصف المورد </strong> 
                                <span> : </span>
                                <span style="margin-right: 5px">{{$supplier->desc ?? 'لا يوجد'}}</span>
                            </div>
                            <div class="" style="margin-top: 15px">
                              <strong style="position:relative">  تاريخ التعامل </strong> 
                                <span> : </span>
                                <span style="margin-right: 5px">{{$supplier->start_deal}}</span>
                            </div>
                            <div class="" style="margin-top: 15px">
                              <strong style="position:relative">   المبلغ المستحق </strong> 
                                <span> : </span>
                                <span style="margin-right: 5px">{{$supplier->due_amount}}</span>
                            </div>
                            <div class="" style="margin-top: 15px">
                              <strong style="position:relative">  الارضية </strong> 
                                <span> : </span>
                                <span style="margin-right: 5px">{{$supplier->standard}}</span>
                            </div>
                            <div class="" style="margin-top: 15px">
                              <strong style="position:relative">  الاجمالى </strong> 
                                <span> : </span>
                                <span style="margin-right: 5px">{{$supplier->standard + $supplier->due_amount}}</span>
                            </div>
                            {{-- @if ($Swallets->count() > 0)
                              @foreach ($Swallets as $wallet)
                              <div class="" style="margin-top: 15px">
                                <strong style="position:relative"> {{$wallet->wallet_name}} </strong> 
                                  <span> : </span>
                                  <span style="margin-right: 5px">{{$wallet->wallet_num}}</span>
                              </div>
                            @endforeach
                            @endif
                            @if ($Sbanks->count() > 0)
                              @foreach ($Sbanks as $bank)
                                <div class="" style="margin-top: 15px">
                                  <strong style="position:relative">  {{$bank->bank_name}} </strong> 
                                    <span> : </span>
                                    <span style="margin-right: 5px"> {{$bank->ibn}}</span>
                                </div>
                              @endforeach
                            @endif --}}
                          </div>
                          
                          <div class="col-md-6"> 
                            <span><img src="{{asset($supplier->image ? $supplier->image : 'images/zummXD2dvAtI.png')}}" style="width: 180px;padding-top: 5px;"></span>
                          </div>
                        </div>
                        
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                          غلق</button>
                      </div>
                </div>
              </div>
            </div>
            <!-- Details Modal End-->
                @endforeach
            </tbody>
        </table>

        </div>


    
      </div>

  <!-- Import Modal Start-->
  <div id="ImportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade">
    <div role="document" class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <form action="{{route('supplier.import')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="modal-header">
          <h5 id="exampleModalLabel" class="modal-title col-md-6">رفع ملف للمورد </h5>
          <button type="button" class="close col-md-6" data-bs-dismiss="modal" aria-label="Close" style="padding-right: 325px"><span aria-hidden="true">x</span></button>
        </div>
        <div class="modal-body">
           <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
          <p>To display Image it must be stored in images/suppliers directory. Image name must be same as supplier name</p>
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>رفع ملف اكسيل *</strong></label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>ملف عينة</strong></label>
                        <a href="images/sample_file/suppliers.xlsx" class="btn btn-info btn-block btn-md"><i class="fa fa-download"></i>  تحميل</a>
                    </div>
                </div>
           </div>           
           <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
            <div class="buttonofff">
              <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                غلق</button>
              <button type="submit" class="btn btn-info">حفظ</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
</div>
<!-- Import Modal End-->
@endsection
@section('scripts')
  @include('sweetalert::alert')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js" integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(document).ready(function () {
        $('.repeater').repeater();
    });
  </script>
@endsection