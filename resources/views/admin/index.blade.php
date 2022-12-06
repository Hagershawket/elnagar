@extends('admin.master')
@section('title','الرئيسية')
@section('css')
    
@endsection
@section('header_title','الرئيسية')
@section('content')


    <div class="row">
      <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="dash-widget5">
          <span class="dash-widget-icon">
            <img class="img-circle" src="public/admin/assets/mona/assets/img/user.jpg" width="100%" alt="Admin">
          </span>
          <div class="dash-widget-info">
            <h3>حساب المدير العام</h3>
            <p>{{Auth::user()->name}}</p>
            <span>#{{Auth::user()->job_num}}</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-9">
        <div class="row contevtkkkjk">
          <div class="dash-widget">
            <span class="dash-widget-icon ">
              <i class="fa fa-home" aria-hidden="true"></i>
            </span>
            <div class="dash-widget-info">
              <h3>{{$data['branches']}} <span>فرع</span></h3>
              <div class="delitesoddd">
                <a href="{{route('branches.index')}}" class="pull-right">التفاصيل</a>
                <span class="pull-left"><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="dash-widget">
            <span class="dash-widget-icon ">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
            <div class="dash-widget-info">
              <h3>{{$data['employees']}} <span>موظف</span></h3>
              <div class="delitesoddd">
                <a href="{{route('employees.index')}}" class="pull-right">التفاصيل</a>
                <span class="pull-left"><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="dash-widget">
            <span class="dash-widget-icon">
              <i class="fa fa-users fa-fw" aria-hidden="true"></i>
            </span>
            <div class="dash-widget-info">
              <h3>{{$data['suppliers']}} <span>مورد</span></h3>
              <div class="delitesoddd">
                <a href="{{route('suppliers.index')}}" class="pull-right">التفاصيل</a>
                <span class="pull-left"><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="dash-widget">
            <span class="dash-widget-icon">
             <i class="fa fa-money-bill fa-fw" aria-hidden="true"></i>
            </span>
            <div class="dash-widget-info">
              <h3>{{$data['accounts']}} <span>حساب بنكي</span></h3>
              <div class="delitesoddd">
                <a href="{{route('bank_accounts.index')}}" class="pull-right">التفاصيل</a>
                <span class="pull-left"><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="dash-widget">
            <span class="dash-widget-icon">
              <i class="fa fa-laptop fa-fw" aria-hidden="true"></i>
            </span>
            <div class="dash-widget-info">
              <h3>المخازن</h3>
              <div class="delitesoddd">
                <a href="#" class="pull-right">التفاصيل</a>
                <span class="pull-left"><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-7 pl-0 pr-0">
        <div id="chartdiv"></div>
      </div>
      <div class="col-sm-5">
        <div class="panel panel-table panel-table-top mb-25">
          <div class="row">
        
            <div class="col-sm-6">
              <div class="panel-body">
                <div class="table-responsive">
                  <table id="tbl_LastOrder" class="table no-margin">
                    <thead>
                      <tr>
                        <th>الدولة </th>
                        <th>الفروع</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($countries as $country )
                        <tr>
                          <td><img src="{{asset($country->image ?? 'images/zummXD2dvAtI.png')}}" width="20"> {{$country->name}} </td>
                          <td>{{$country->branches->count()}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="panel-heading">
                <h3 class="panel-title">الفروع</h3>
              </div>
              <div id="chartdiv2"></div>
            </div>
          </div>
        </div>
        <div class="panel panel-table panel-table-top mb-25">
          <div class="notifications">
            <div class="topnav-dropdown-header">
              <span class="pught"><i class="fa fa-bell"></i>التبهيات</span>
              <a href="#" class="pull-left">مسح الكل</a>
            </div>
            <ul class="media-list">
              <li class="media notification-message">
                <a href="#">
                  <div class="media-body">
                    <p class="noti-details">تم ا اضافة  الموظف   باسم  <strong>خالد علي</strong>لفريق  
                    <strong>المنصورة</strong> رقم الوظيفي<span class="noti-title">12321</span></p>
                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                  </div>
                </a>
              </li>
              <li class="media notification-message">
                <a href="#">
                  <div class="media-body">
                    <p class="noti-details">تم ا اضافة  الموظف   باسم  <strong>خالد علي</strong>لفريق  
                    <strong>المنصورة</strong> رقم الوظيفي<span class="noti-title">12321</span></p>
                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div><!-- panel panel-table panel-table-top -->
          
      </div>
    </div>



@endsection
@section('scripts')
<script>
    am5.ready(function() {
  
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");
  
  
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
  
  
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: true,
      panY: true,
      wheelX: "panX",
      wheelY: "zoomX",
      pinchZoomX:true
    }));
  
  
    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineY.set("visible", false);
  
  
    // Generate random data
    var date = new Date();
    date.setHours(0, 0, 0, 0);
    var value = 100;
  
    function generateData() {
      value = Math.round((Math.random() * 10 - 5) + value);
  
      if (value < 10) {
        value = 10;
      }
  
      am5.time.add(date, "day", 1);
      return { date: date.getTime(), value: value };
    }
  
    function generateDatas(count) {
      var data = [];
      for (var i = 0; i < count; ++i) {
        data.push(generateData());
      }
      return data;
    }
  
  
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
      baseInterval: { timeUnit: "day", count: 1 },
      renderer: am5xy.AxisRendererX.new(root, {}),
      tooltip: am5.Tooltip.new(root, {})
    }));
  
    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      renderer: am5xy.AxisRendererY.new(root, {})
    }));
  
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(am5xy.StepLineSeries.new(root, {
      name: "Series",
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "value",
      valueXField: "date",
      noRisers: true,
      tooltip: am5.Tooltip.new(root, {
        labelText: "{valueY}"
      })
    }));
  
    series.strokes.template.setAll({
      strokeWidth: 3
    });
  
    series.fills.template.setAll({
      fillOpacity: 0.1,
      visible: true
    });
  
  
    // Add scrollbar
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    chart.set("scrollbarX", am5.Scrollbar.new(root, {
      orientation: "horizontal"
    }));
  
    var data = generateDatas(50);
    series.data.setAll(data);
  
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    chart.appear(1000, 100);
  
    }); // end am5.ready()
  </script>        
  <script type="text/javascript">
    /* Imports */
  
  
    import am4themes_https://cdn.amcharts.com/lib/5/Animated from "@amcharts/amcharts4/themes/https://cdn.amcharts.com/lib/5/Animated";
  
    /* Chart code */
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    let root = am5.Root.new("chartdiv");
  
  
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
  
  
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    let chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: true,
      panY: true,
      wheelX: "panX",
      wheelY: "zoomX",
      pinchZoomX:true
    }));
  
  
    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    let cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineY.set("visible", false);
  
  
    // Generate random data
    let date = new Date();
    date.setHours(0, 0, 0, 0);
    let value = 100;
  
    function generateData() {
      value = Math.round((Math.random() * 10 - 5) + value);
  
      if (value < 10) {
        value = 10;
      }
  
      am5.time.add(date, "day", 1);
      return { date: date.getTime(), value: value };
    }
  
    function generateDatas(count) {
      let data = [];
      for (var i = 0; i < count; ++i) {
        data.push(generateData());
      }
      return data;
    }
  
  
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    let xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
      baseInterval: { timeUnit: "day", count: 1 },
      renderer: am5xy.AxisRendererX.new(root, {}),
      tooltip: am5.Tooltip.new(root, {})
    }));
  
    let yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      renderer: am5xy.AxisRendererY.new(root, {})
    }));
  
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    let series = chart.series.push(am5xy.StepLineSeries.new(root, {
      name: "Series",
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "value",
      valueXField: "date",
      noRisers: true,
      tooltip: am5.Tooltip.new(root, {
        labelText: "{valueY}"
      })
    }));
  
    series.strokes.template.setAll({
      strokeWidth: 3
    });
  
    series.fills.template.setAll({
      fillOpacity: 0.1,
      visible: true
    });
  
  
    // Add scrollbar
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    chart.set("scrollbarX", am5.Scrollbar.new(root, {
      orientation: "horizontal"
    }));
  
    let data = generateDatas(50);
    series.data.setAll(data);
  
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    chart.appear(1000, 100);
  </script>
  
  
  
  </html>
  
  <!-- ///////////////////////////////////////////////map -->
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