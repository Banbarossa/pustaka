<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Perpustakaan | Pesantren Imam Syafi'i</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{asset('assets/images/logo-pavicon.png')}}">

        <link href="{{asset('')}}assets/plugins/morris/morris.css" rel="stylesheet">

        <link href="{{asset('')}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{asset('')}}assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="{{asset('')}}assets/css/style.css" rel="stylesheet" type="text/css">

        {{-- data table --}}
        <link href="{{asset('')}}assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{asset('')}}assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        @stack('style')

        {{-- @livewireStyles --}}
        
        <livewire:styles />

    </head>


    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        @include('layouts.header')
        <!-- End Navigation Bar-->


        <div class="wrapper">
            @yield('content')
        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        @include('layouts.footer')
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="{{asset('')}}assets/js/jquery.min.js"></script>
        <script src="{{asset('')}}assets/js/popper.min.js"></script>
        <script src="{{asset('')}}assets/js/bootstrap.min.js"></script>
        <script src="{{asset('')}}assets/js/modernizr.min.js"></script>
        <script src="{{asset('')}}assets/js/waves.js"></script>
        <script src="{{asset('')}}assets/js/jquery.slimscroll.js"></script>
        <script src="{{asset('')}}assets/js/jquery.nicescroll.js"></script>
        <script src="{{asset('')}}assets/js/jquery.scrollTo.min.js"></script>

        <script src="{{asset('')}}assets/plugins/skycons/skycons.min.js"></script>
        <script src="{{asset('')}}assets/plugins/raphael/raphael-min.js"></script>
        <script src="{{asset('')}}assets/plugins/morris/morris.min.js"></script>
        
        <script src="{{asset('')}}assets/pages/dashborad.js"></script>



        {{-- data table --}}
        <script src="{{asset('')}}assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{asset('')}}assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="{{asset('')}}assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="{{asset('')}}assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        {{-- <script src="{{asset('')}}assets/plugins/datatables/jszip.min.js"></script>
        <script src="{{asset('')}}assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="{{asset('')}}assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="{{asset('')}}assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="{{asset('')}}assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="{{asset('')}}assets/plugins/datatables/buttons.colVis.min.js"></script> --}}
        <!-- Responsive examples -->
        <script src="{{asset('')}}assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="{{asset('')}}assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="{{asset('')}}assets/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="{{asset('')}}assets/js/app.js"></script>

        @stack('script')

        <!-- App js -->
        <script src="{{asset('')}}assets/js/app.js"></script>
        
        <script>
            /* BEGIN SVG WEATHER ICON */
            if (typeof Skycons !== 'undefined'){
           var icons = new Skycons(
               {"color": "#fff"},
               {"resizeClear": true}
               ),
                   list  = [
                       "clear-day", "clear-night", "partly-cloudy-day",
                       "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                       "fog"
                   ],
                   i;

               for(i = list.length; i--; )
               icons.set(list[i], list[i]);
               icons.play();
           };

       // scroll

       $(document).ready(function() {
       
       $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true});
       $("#boxscroll2").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true}); 
       
       });
       </script>
       <livewire:scripts />




    </body>
</html>