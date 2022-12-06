@extends('admin.master')
@section('title',' الدول')
@section('css')
    
@endsection
@section('header_title',' الدول')
@section('content')

    <div class="row">
      <div class="col-md-12 col-sm-6 col-lg-6">
        <div class="dainfo">
            <h3>الدول</h3>
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
        <div class="col-md-7 col-sm-7 pl-0">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                      <th style="text-align:center">#</th>
                      <th style="text-align:center">الصورة</th>
                      <th style="text-align:center">الاسم</th>
                      <th style="text-align:center">العملة</th>
                      <th style="text-align:center">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  @foreach ($countries as $country)
                      <tr>
                        <td style="text-align:center">{{$i++}}</td>
                        <td style="text-align:center"><img width="50" src="{{asset($country->image ? $country->image : 'images/zummXD2dvAtI.png')}}"></td>
                        <td style="text-align:center">{{$country->name}}</td>
                        <td style="text-align:center">{{$country->currency->name}}</td>
                        <td>
                          <div class="conhhh text-center">
                            <a href="#"  style="color: white;" class="action quickview btn btn-success" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#editModal{{$country->id}}"><i class="far fa-edit"></i> تعديل </a>
                            {{-- <a href="#"  style="color: white;" class="action quickview btn btn-sm btn-danger p-2" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#DeleteModal{{$country->id}}"><i class="fas fa-trash-alt"></i> حذف </a> --}}
                          </div>
                        </td>
                      </tr>
                       <!-- Edit Modal Start -->
                      <div class="countermodel contentmoder">
                        <div class="modal fade" id="editModal{{$country->id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="heading-title">تعديل دولة</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                              </div>
                              <div class="modal-body">
                                <p class="italic"><small>الحقول التى تحتوى على
                                  هذه العلامة (*) حقول مطلوبة.</small></p>
                                <div class="cobtervvvbb">
                                  <div class="datapriii">
                                    <div id="loaded-files" class="upload-image-thumbs">
                                      <div class="uploadimgle">
                                        <img width="50" src="{{asset($country->image ?? 'images/zummXD2dvAtI.png')}}">                                      </div>
                                      <form action="{{route('countries.update',$country->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <input type="hidden" name="id" value="{{$country->id}}">
                                      <div class="btn btn-rounded aqua-gradient float-left waves-effect waves-light uesrnamephoto">
                                        <span>تغيير صورة الدولة</span>
                                        <input type="file" name="image">
                                        @error('image')
                                          <small style="color: red;">
                                            {{$message}}
                                          </small> 
                                      @enderror
                                      </div>
                                    </div>
                                  </div>
                    
                    
                                  <div class="bd-examplepl">
                                      <div class="row">
                                   
                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                          <label>اسم الدولة *</label>
                                          <div class="controlsopop">
                                            <i class="fas fa-user"></i>
                                            <input type="text" name="name" value="{{$country->name}}" class="form-control"  placeholder="اضافة">
                                            @error('name')
                                              <small style="color: red;">
                                                {{$message}}
                                              </small> 
                                          @enderror
                                          </div>
                                        </div>
                                        <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                                            <label>اسم العملة *</label>
                                            <div class="controlsopop">
                                              <select name="currency_id" class="form-control">
                                                <option value="">اختر العملة</option>
                                                @foreach ($currencies as $currency)
                                                    <option value="{{$currency->id}}" @if($currency->id == $country->currency->id)selected @endif>{{$currency->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('currency_id')
                                                <small style="color: red;">
                                                  {{$message}}
                                                </small> 
                                            @enderror
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
                                </form>
                                </div><!-- cobtervvvbb -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                     <!-- Edit Modal end -->
                    
          <!-- Delete modal start -->
          <div class="modal fade" id="DeleteModal{{$country->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <div class="col-md-6">
                      <h4 class="heading-title">حذف دولة </h4>
                    </div>
                    <div class="col-md-6">
                      <button type="button" class="close" style="padding-right:220px;" data-bs-dismiss="modal" aria-label="Close">x</button>
                    </div>
                  </div>
                    <form action="{{route('countries.destroy',$country->id)}}" method="post">
                        {{ method_field('Delete') }}
                        @csrf
                        <input id="id" type="hidden" name="id" class="form-control" value="{{ $country->id }}">
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
        <div class="col-sm-5">
          <div class="paneleading">
            <div id="chartdiv2"></div>
          </div>
        </div>
      </div>
      
    </div>
   


   <!-- ADD Modal Start -->
  <div class="countermodel contentmoder">

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="heading-title">اضافة دولة</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
          </div>
          <div class="modal-body">
            <p class="italic"><small>الحقول التى تحتوى على
              هذه العلامة (*) حقول مطلوبة.</small></p>
            <div class="cobtervvvbb">
              <div class="datapriii">
                <div id="loaded-files" class="upload-image-thumbs">
                  <div class="uploadimgle">
                    <i class="fa fa-camera"></i>
                  </div>
                  <form action="{{route('countries.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="btn btn-rounded aqua-gradient float-left waves-effect waves-light uesrnamephoto">
                    <span>رفع صورة الدولة</span>
                    <input type="file" name="image">
                    @error('image')
                              <small style="color: red;">
                                {{$message}}
                              </small> 
                    @enderror
                  </div>
                </div>
              </div>


              <div class="bd-examplepl">
                  <div class="row">
               
                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                      <label>اسم الدولة *</label>
                      <div class="controlsopop">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" class="form-control"  placeholder="اضافة" value="{{ Request::old('name') }}">
                        @error('name')
                            <small style="color: red;">
                              {{$message}}
                            </small> 
                        @enderror
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-12 col-lg-12 pr-0 pl-0 labelform">
                        <label>اسم العملة *</label>
                        <div class="controlsopop">
                          <select name="currency_id" class="form-control">
                            <option value="">اختر العملة</option>
                            @foreach ($currencies as $currency)
                                <option value="{{$currency->id}}">{{$currency->name}}</option>
                            @endforeach
                        </select>
                        @error('currency_id')
                            <small style="color: red;">
                              {{$message}}
                            </small> 
                        @enderror
                        </div>
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
    </div>
  </div>

 <!-- ADD Modal end -->
@endsection
@section('scripts')
  @include('sweetalert::alert')


      <!-- Resources -->
  <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->

<script>
  am5.ready(function() {

  // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  var root = am5.Root.new("chartdiv2");


  // Set themes
  // https://www.amcharts.com/docs/v5/concepts/themes/
  root.setThemes([
    am5themes_Animated.new(root)
  ]);


  // Create the map chart
  // https://www.amcharts.com/docs/v5/charts/map-chart/
  var chart = root.container.children.push(am5map.MapChart.new(root, {
    panX: "rotateX",
    panY: "rotateY",
    projection: am5map.geoOrthographic(),
    paddingBottom: 20,
    paddingTop: 20,
    paddingLeft: 20,
    paddingRight: 20
  }));


  // Create main polygon series for countries
  // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
  var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
    geoJSON: am5geodata_worldLow 
  }));

  polygonSeries.mapPolygons.template.setAll({
    tooltipText: "{name}",
    toggleKey: "active",
    interactive: true
  });

  polygonSeries.mapPolygons.template.states.create("hover", {
    fill: root.interfaceColors.get("primaryButtonHover")
  });

  polygonSeries.mapPolygons.template.states.create("active", {
    fill: root.interfaceColors.get("primaryButtonHover")
  });


  // Create series for background fill
  // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
  var backgroundSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {}));
  backgroundSeries.mapPolygons.template.setAll({
    fill: root.interfaceColors.get("alternativeBackground"),
    fillOpacity: 0.1,
    strokeOpacity: 0
  });
  backgroundSeries.data.push({
    geometry: am5map.getGeoRectangle(90, 180, -90, -180)
  });


  // Set up events
  var previousPolygon;

  polygonSeries.mapPolygons.template.on("active", function (active, target) {
    if (previousPolygon && previousPolygon != target) {
      previousPolygon.set("active", false);
    }
    if (target.get("active")) {
      var centroid = target.geoCentroid();
      if (centroid) {
        chart.animate({ key: "rotationX", to: -centroid.longitude, duration: 1500, easing: am5.ease.inOut(am5.ease.cubic) });
        chart.animate({ key: "rotationY", to: -centroid.latitude, duration: 1500, easing: am5.ease.inOut(am5.ease.cubic) });
      }
    }

    previousPolygon = target;
  });


  // Make stuff animate on load
  chart.appear(1000, 100);

  }); // end am5.ready()
</script>

<script type="text/javascript">
  /* Imports */


  import am4geodata_https://cdn.amcharts.com/lib/5/worldLow from "@amcharts/amcharts4-geodata/https://cdn.amcharts.com/lib/5/worldLow";
  import am4themes_https://cdn.amcharts.com/lib/5/Animated from "@amcharts/amcharts4/themes/https://cdn.amcharts.com/lib/5/Animated";

  /* Chart code */
  // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  let root = am5.Root.new("chartdiv2");


  // Set themes
  // https://www.amcharts.com/docs/v5/concepts/themes/
  root.setThemes([
    am5themes_Animated.new(root)
  ]);


  // Create the map chart
  // https://www.amcharts.com/docs/v5/charts/map-chart/
  let chart = root.container.children.push(am5map.MapChart.new(root, {
    panX: "rotateX",
    panY: "rotateY",
    projection: am5map.geoOrthographic(),
    paddingBottom: 20,
    paddingTop: 20,
    paddingLeft: 20,
    paddingRight: 20
  }));


  // Create main polygon series for countries
  // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
  let polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
    geoJSON: am5geodata_worldLow 
  }));

  polygonSeries.mapPolygons.template.setAll({
    tooltipText: "{name}",
    toggleKey: "active",
    interactive: true
  });

  polygonSeries.mapPolygons.template.states.create("hover", {
    fill: root.interfaceColors.get("primaryButtonHover")
  });

  polygonSeries.mapPolygons.template.states.create("active", {
    fill: root.interfaceColors.get("primaryButtonHover")
  });


  // Create series for background fill
  // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
  let backgroundSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {}));
  backgroundSeries.mapPolygons.template.setAll({
    fill: root.interfaceColors.get("alternativeBackground"),
    fillOpacity: 0.1,
    strokeOpacity: 0
  });
  backgroundSeries.data.push({
    geometry: am5map.getGeoRectangle(90, 180, -90, -180)
  });


  // Set up events
  let previousPolygon;

  polygonSeries.mapPolygons.template.on("active", function (active, target) {
    if (previousPolygon && previousPolygon != target) {
      previousPolygon.set("active", false);
    }
    if (target.get("active")) {
      let centroid = target.geoCentroid();
      if (centroid) {
        chart.animate({ key: "rotationX", to: -centroid.longitude, duration: 1500, easing: am5.ease.inOut(am5.ease.cubic) });
        chart.animate({ key: "rotationY", to: -centroid.latitude, duration: 1500, easing: am5.ease.inOut(am5.ease.cubic) });
      }
    }

    previousPolygon = target;
  });


  // Make stuff animate on load
  chart.appear(1000, 100);
      
</script>
@endsection 
