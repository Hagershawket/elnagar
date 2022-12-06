@extends('admin.master')
@section('title',' الفروع')
@section('css')

@endsection
@section('header_title',' الفروع')
@section('content')


  <div class="row">
    <div class="col-sm-6">
     
      <div class="dainfo">
        <h3>الفروع</h3>
      </div>
    </div>
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="butonmodr text-left">
          <a href="{{route('branches.create')}}" class="action quickview btn btn-info"><i class="fa fa-plus"></i>اضافة فرع جديد </a>
        </div>
      </div>
      
   
    </div>

    <div class="counteriesoff">
      <div class="row">
        <div class="col-md-12 col-sm-12 pl-0">
        <table id="example" class="display nowrap" style="width:100%">
          <thead>
              <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">اسم الفرع</th>
                <th style="text-align: center">رقم الهاتف</th>
                <th style="text-align: center"> العنوان</th>
                <th style="text-align: center"> اسم الدولة</th>
                <th style="text-align: center">تكلفة الانشاء</th>
                <th style="text-align: center">العمليات</th>
              </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            @foreach ($barnches as $branch)
            <tr style="text-align: center">
                <td>{{$i++}}</td>
                <td>{{$branch->name}}</td>
                <td>{{$branch->phone}}</td>
                <td>{{$branch->address}}</td>
                <td>{{App\Models\Country::where('id',$branch->country_id)->first()->name}}</td>
                <td>{{$branch->cost}}</td>
                
                <td>
                  <a href="{{route('branches.edit',$branch->id)}}" style="color: white;" class="action quickview btn btn-success btn-sm"><i class="far fa-edit"></i> تعديل</a>
                  <a href="{{route('branches.stop',['id' => $branch->id, 'status' => $branch->is_active == 1 ? 0 : 1])}}" style="color: white;" type="submit" class="btn btn-sm btn-{{$branch->is_active == 1 ? 'danger' : 'info'}}"> {{$branch->is_active == 1 ? 'إيقاف' : 'تفعيل' }}</a>
                  <a href="#" style="color: white;" class="action quickview btn btn-primary btn-sm" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal{{$branch->id}}"><i class="far fa-eye"></i> مشاهدة </a>
                </td>
            </tr>
            
            <!-- Modal -->
            <div  class="modal fade" id="exampleModal{{$branch->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 130%">
                      <div class="container mt-3 pb-2 border-bottom">
                        <div class="row">
                          <div class="col-md-3">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">بيانات الفرع</h5>
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
                               <label><strong> اسم الفرع</strong></label>
                              <span> : </span>
                              <span style="margin-right: 5px">{{$branch->name}}</span>
                            </div>
                            <div class="col-md-6">
                              <strong> رقم الهاتف</strong> 
                              <span> : </span>
                              <span style="margin-right: 5px">{{$branch->phone}}</span>
                            </div>
                          </div>
                          <div class="row g-2" style="margin-top: 10px">
                            <div class="col-md-6">
                              <strong> العنوان</strong> 
                                <span> : </span>
                                <span style="margin-right: 5px">{{$branch->address}}</span>
                            </div>
                            <div class="col-md-3">
                              <strong> خط الطول</strong> 
                                <span> : </span>
                                <span style="margin-right: 5px">{{$branch->longitude}}</span>
                            </div>
                            <div class="col-md-3">
                              <strong> دائرة العرض</strong> 
                                <span> : </span>
                                <span style="margin-right: 5px">{{$branch->latitude}}</span>
                            </div>
                          </div>
                          <div class="row g-2" >
                            <div class="col-md-6">
                              <div class="" style="margin-top: 15px">
                                <strong style="position:relative"> البلد </strong> 
                                  <span> : </span>
                                  <span style="margin-right: 5px">{{App\Models\Country::where('id',$branch->country_id)->first()->name}}</span>
                              </div>
                              @if($branch->document)
                                <div class="" style="margin-top: 15px">
                                  <strong style="position:relative"> بدايه تاريخ الرخصة</strong> 
                                    <span> : </span>
                                    <span style="margin-right: 5px">{{$branch->document->start_date}}</span>
                                </div>
                              <div class="" style="margin-top: 15px">
                                <strong style="position:relative"> نهاية تاريخ الرخصة</strong> 
                                  <span> : </span>
                                  <span style="margin-right: 5px">{{$branch->document->end_date}}</span>
                              </div>
                              @endif
                              <div class="" style="margin-top: 15px">
                                <strong style="position:relative"> تكلفة الانشاء</strong> 
                                  <span> : </span>
                                  <span style="margin-right: 5px">{{$branch->cost}}</span>
                              </div>
                              <div class="" style="margin-top: 15px">
                                <strong style="position:relative"> الايجار </strong> 
                                  <span> : </span>
                                  <span style="margin-right: 5px">{{$branch->rent}}</span>
                              </div>
                              
                            </div>
                            
                            @if($branch->document)
                              <div class="col-md-6">
                                <strong> شهادة الترخيص</strong> 
                                  <span> : </span> 
                                  <span><img src="{{asset($branch->document->file)}}" style="width: 180px;padding-top: 12px;"></span>
                              </div>
                            @else
                            <div class="col-md-6">
                              <strong> شهادة الترخيص</strong> 
                                <span> : </span> 
                                <span><img src="{{asset('images/zummXD2dvAtI.png')}}" style="width: 180px;padding-top: 12px;"></span>
                            </div>
                            @endif


                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                            غلق</button>
                        </div>
                        {{-- <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"></button>
                        </div> --}}
                  </div>
                </div>
              </div>
            @endforeach
              
          </tbody>
      </table>
      </div>
        </div>


    
      </div>

@endsection
@section('scripts')
  @include('sweetalert::alert')

<script type="text/javascript">

  </script>
@endsection