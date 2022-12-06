  
    <script src="{{asset('public/admin/assets/mona/assets/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/slick.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('public/admin/assets/js/intlTelInput.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/intlTelInput-jquery.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/phone.js')}}"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script type="text/javascript" src="{{asset('public/admin/assets/mona/assets/js/jquery.slimscroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/assets/mona/assets/plugins/light-gallery/js/lightgallery-all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/assets/mona/assets/js/app.js')}}"></script>
    <script src="{{asset('public/admin/assets/mona/jave/owl.carousel.min.js')}}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

     <!-- Resources -->
  <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>


  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	{{-- <script type="text/javascript" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script> --}}
  <script type="text/javascript" src="{{asset('public/admin/assets/js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	{{-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script> --}}
	{{-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script> --}}
  <script type="text/javascript" src="{{asset('public/admin/assets/js/buttons.print.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/admin/assets/js/buttons.html5.min.js')}}"></script>
  
  

	<script type="text/javascript">
		$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csvs', 'excel', 'print'
        ]
    } );
		} );
	</script>
  <script type="text/javascript">
		$(document).ready(function() {
    $('#example2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csvs', 'excel', 'print'
        ]
    } );
		} );
	</script>
   <script type="text/javascript">
		$(document).ready(function() {
    $('#example3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csvs', 'excel', 'print'
        ]
    } );
		} );
	</script>

<script type="text/javascript">
  $(document).ready(function() {
  $('#example4').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'copy', 'csvs', 'excel', 'print'
      ]
  } );
  } );
</script>
 @yield('scripts') 

