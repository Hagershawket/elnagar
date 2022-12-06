@extends('admin.master')
@section('title','الاقساط')
@section('css')
    
@endsection
@section('header_title','الاقساط')
@section('content')

    {{-- write code here--}}

        <div class="row">
          <div class="col-sm-6">
           
            <div class="dainfo">
              <h3> الاقساط</h3>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="butonmodr text-left">
                <a href="#" class="action quickview btn btn-info" data-link-action="quickview" title="Quick view"
                    data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i>اضافة قسط </a>
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
              <div class="col-md-12 col-sm-9 pl-0">
                <table id="example" class="display nowrap" style="width:100%">
                  <thead>
                      <tr>
                        <th style="text-align: center"> # </th>
                        <th style="text-align: center">سبب القسط</th>
                        <th style="text-align: center">التوجيه</th>
                        <th style="text-align: center">عدد الشهور</th>
                        <th style="text-align: center">المبلغ الشهرى</th>
                        <th style="text-align: center">بداية التقسيط</th>
                        <th style="text-align: center">نهاية التقسيط</th>
                        <th style="text-align: center">اجمالى المبلغ</th>
                        <th style="text-align: center">المدفوع</th>
                        <th style="text-align: center">الملاحظات</th>
                        <th style="text-align: center">العمليات</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                      @foreach ($installments as $installment)
                        <tr>
                          <td style="text-align: center">{{$i++}}</td>
                          <td style="text-align: center">{{$installment->reason}}</td>
                          <td style="text-align: center">{{$installment->link->name}}</td>
                          <td style="text-align: center">{{$installment->months_num}}</td>
                          <td style="text-align: center">{{$installment->monthly_amount}}</td>
                          <td style="text-align: center">{{$installment->start_date}}</td>
                          <td style="text-align: center">{{$installment->end_date}}</td>
                          <td style="text-align: center">{{$installment->total_amount}}</td>
                          <td style="text-align: center">{{$installment->total_paid}}</td>
                          <td style="text-align: center">{{$installment->notes}}</td>
                          <td>
                            <div class="conhhh text-center">
                                <a href="#" style="color: white;"
                                    class="action quickview btn btn-success" data-link-action="quickview"
                                    title="Quick view" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $installment->id }}"><i
                                        class="far fa-edit"></i> تعديل </a>

                                <a href="#" style="color: white;" class="action quickview btn btn-danger"
                                    data-link-action="quickview" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $installment->id }}"><i
                                        class="fas fa-trash-alt"></i>
                                    حذف </a>

                                <a class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#plus{{ $installment->id }}">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> دفع قسط</a>

                                <a href="{{ route('installments.show',$installment->id) }}" style="color: white;" class="btn btn-primary active">
                                    <i class="fa fa-address-card" aria-hidden="true"></i> كارت التفاصيل </a>

                        </td>
                        </tr>

                        <!-- Start Edit Model-->
                        <div class="countermodel contentmoder">
                            <div class="modal fade" id="editModal{{ $installment->id }}" tabindex="-1"
                                role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="heading-title">تعديل بيانات القسط </h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">x</span></button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="cobtervvvbb">

                                                <form action="{{ route('installments.update',$installment->id) }}" method="POST">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                                                        <input class="form-control" type="hidden" name="id" value="{{$installment->id}}">
                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                            <label> سبب القسط *</label>
                                                            <i class="fas fa-user"></i>
                                                            <div class="controlsopop">
                                                              <textarea class="form-control" name="reason">{{$installment->reason}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                            <label> عدد الشهور *</label>
                                                            <div class="controlsopop">
                                                                <input class="form-control" name="months_num" type="number" value="{{$installment->months_num}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                            <label> المبلغ الشهرى *</label>
                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                            <div class="controlsopop">
                                                                <input type="number" class="form-control" name="monthly_amount" value="{{$installment->monthly_amount}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                            <label> بداية التقسيط *</label>
                                                            <div class="controlsopop">
                                                                <input type="date" class="form-control" name="start_date" value="{{$installment->start_date}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                            <label>  نهاية التقسيط *</label>
                                                            <div class="controlsopop">
                                                              <input type="date" class="form-control" name="end_date" value="{{$installment->end_date}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                          <label>  اجمالى المبلغ *</label>
                                                          <i class="fa fa-money" aria-hidden="true"></i>
                                                          <div class="controlsopop">
                                                            <input type="number" class="form-control" name="total_amount" value="{{$installment->total_amount}}">
                                                          </div>
                                                      </div>
                                                      {{-- <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                        <label> الحسابات الرئيسية </label>
                                                        <div class="controlsopop">
                                                            <select class="form-control" name="category_id" id="category_id">
                                                              <option value="">اختر</option>
                                                              @foreach ($categories as $category )
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                              @endforeach
                                                            </select>
                                                        </div>
                                                      </div>
                                                      <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                        <label> الحسابات الفرعية </label>
                                                        <div class="controlsopop">
                                                            <select class="form-control" name="subCategory_id" id="subCategory_id"></select>
                                                        </div>
                                                      </div>
                                                      <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                        <label> التوجيه *</label>
                                                        <div class="controlsopop">
                                                            <select class="form-control" name="link_id" id="link_id"></select>
                                                        </div>
                                                      </div> --}}
                                                      <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                        <label> ملاحظات </label>
                                                        <i class="fas fa-user"></i>
                                                        <div class="controlsopop">
                                                          <textarea class="form-control" name="notes" placeholder="اضافة"></textarea>
                                                        </div>
                                                    </div>
                                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                            <div class="buttonofff">
                                                                <button type="submit" class="btn btn-info">حفظ</button>
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
                    <!-- End Edit Model-->

                        <!-- Start Plus Model-->
                        <div class="countermodel contentmoder">
                          <div class="modal fade" id="plus{{ $installment->id }}" tabindex="-1"
                              role="dialog">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="heading-title"> اضافة قسط </h4>
                                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                      </div>
                                      <div class="modal-body">
                                          <div class="cobtervvvbb">
                                              <form action="{{ route('installment_plus') }}"
                                                  method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                  <div class="bd-examplepl">
                                                      <div class="row">
                                                          <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                                                          <input class="form-control" type="hidden" name="installment_id" value="{{$installment->id}}">
                                                          <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                                <label> اجمالى المدفوع</label>
                                                                <div class="controlsopop">
                                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                                    <input class="form-control" type="text" disabled
                                                                        value="{{ $installment->total_paid }}">
                                                                </div>
                                                            </div>
                                                          <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                              <label> التاريخ *</label>
                                                              <div class="controlsopop">
                                                                  <input class="form-control" type="date" name="date" placeholder="" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                              <label> المبلغ *</label>
                                                              <div class="controlsopop">
                                                                  <i class="fa fa-money" aria-hidden="true"></i>
                                                                  <input class="form-control" type="text" name="amount_plus" placeholder="ادخل المبلغ" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                                          <label> رفع ايصال </label>
                                                          <div class="controlsopop">
                                                              <i class="fa fa-money" aria-hidden="true"></i>
                                                              <input class="form-control" type="file" name="image">
                                                          </div>
                                                        </div>
                                                          <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                                              <div class="buttonofff">
                                                                  <button type="submit"
                                                                      class="btn btn-info">اضافة </button>
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
                      <!-- End Plus Model-->
                      <!-- Start Delete Model-->
                      <div class="modal fade" id="delete{{ $installment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="col-md-6">
                                        <h5 class="modal-title" id="exampleModalLabel">حذف القسط </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="close" style="padding-right:220px;"
                                            data-bs-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">x</span></button>
                                    </div>
                                </div>
                                <form action="{{ route('installments.destroy', $installment->id) }}" method="POST">
                                    @method('Delete')
                                    @csrf
                                    <div class="modal-body">
                                        <h4> هل متاكد من الحذف </h4>
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
                    <!--End Delete Model-->
                      @endforeach
                  </tbody>
              </table>
      
              </div>
            </div>
          </div>
      
        </div>
      
<!-- Start Add Model -->
<div class="countermodel contentmoder">
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="heading-title"> اضافة قسط</h4>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                          aria-hidden="true">x</span></button>
              </div>
              <div class="modal-body">
                  <div class="cobtervvvbb">
                      <div class="bd-examplepl glooo">
                          <form action="{{ route('installments.store') }}" method="POST">
                              @csrf
                              <div class="row">
                                  <p class="italic"><small>الحقول التى تحتوى على هذه العلامة (*) حقول مطلوبة.</small></p>
                                  <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                      <label> سبب القسط *</label>
                                      <i class="fas fa-user"></i>
                                      <div class="controlsopop">
                                        <textarea class="form-control" name="reason" placeholder="اضافة"></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                      <label> عدد الشهور *</label>
                                      <div class="controlsopop">
                                          <input class="form-control" name="months_num" type="number"
                                              placeholder="اضافة">
                                      </div>
                                  </div>
                                  <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                      <label> المبلغ الشهرى *</label>
                                      <i class="fa fa-money" aria-hidden="true"></i>
                                      <div class="controlsopop">
                                          <input type="number" class="form-control" name="monthly_amount" placeholder="اضافة">
                                      </div>
                                  </div>
                                  <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                      <label> بداية التقسيط *</label>
                                      <div class="controlsopop">
                                          <input type="date" class="form-control" name="start_date" placeholder="اضافة">
                                      </div>
                                  </div>
                                  <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                      <label>  نهاية التقسيط *</label>
                                      <div class="controlsopop">
                                        <input type="date" class="form-control" name="end_date" placeholder="اضافة">
                                      </div>
                                  </div>
                                  <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                    <label>  اجمالى المبلغ *</label>
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    <div class="controlsopop">
                                      <input type="number" class="form-control" name="total_amount" placeholder="اضافة">
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                    <label> الحسابات الرئيسية </label>
                                    <div class="controlsopop">
                                        <select class="form-control" name="category_id" id="category_id">
                                          <option value="">اختر</option>
                                          @foreach ($categories as $category )
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                  </div>
                                  <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                    <label> الحسابات الفرعية </label>
                                    <div class="controlsopop">
                                        <select class="form-control" name="subCategory_id" id="subCategory_id"></select>
                                    </div>
                                  </div>
                                  <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                    <label> التوجيه *</label>
                                    <div class="controlsopop">
                                        <select class="form-control" name="link_id" id="link_id"></select>
                                    </div>
                                  </div>
                                <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                  <label> ملاحظات </label>
                                  <i class="fas fa-user"></i>
                                  <div class="controlsopop">
                                    <textarea class="form-control" name="notes" placeholder="اضافة"></textarea>
                                  </div>
                              </div>
                                  <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0">
                                      <div class="buttonofff">
                                          <button type="submit" class="btn btn-info">حفظ</button>
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
<!-- End Add Model -->

@endsection
@section('scripts')
@include('sweetalert::alert')
<script>
  $(document).ready(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })
      $(document).on('change','#category_id',function(e){
          var category_id = $('#category_id').val();          
          /**Ajax code**/
          $.ajax({
          type: "POST",
          url:"{{route('getSubcategories')}}",
          data:{
            category_id:category_id,
          },
          success: function (data) {
                  if (data.status == true) 
                  {
                      $('select[name="subCategory_id"]').empty();
                      $('select[name="subCategory_id"]').append('<option selected value="">اختر</option>');
                      $('select[name="subCategory_id"]').append(data.data);
                  }
              }
          });
      });
  });
</script>
<script>
  $(document).ready(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })
      $(document).on('change','#subCategory_id',function(e){
          var category_id    = $('#category_id').val();          
          var subCategory_id = $('#subCategory_id').val();          
          /**Ajax code**/
          $.ajax({
          type: "POST",
          url:"{{route('getLinks')}}",
          data:{
            category_id:category_id,
            subCategory_id:subCategory_id,
          },
          success: function (data) {
                  if (data.status == true) 
                  {
                      $('select[name="link_id"]').empty();
                      $('select[name="link_id"]').append('<option selected value="">اختر</option>');
                      $('select[name="link_id"]').append(data.data);
                  }
              }
          });
      });
  });
</script>
@endsection