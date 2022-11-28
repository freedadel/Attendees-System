<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyleft  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyleft notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <title>Attendees’ system</title>
  <meta name="keywords" content="Attendees’ system" />
  <meta property="og:title" content="Attendees’ system" /> 
<meta property="og:description" content="Attendees’ system" /> 
<meta property="og:image" type="image/png" /> 
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="400" />
<meta property="og:image" content="" /> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">
  <link href="{{asset('https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>
<style>
  span{
    color:#fff !important; 
  }
  i{
    color: #fff !important;
  }
  ..text-default{
    color: #fff !important;
  }
  .card-header{
    background-color: #0088cc !important;
    color: #fff !important;
  }
  #active{
    background-color: #0088cc;
  }
  #dpd:hover{
    background-color:#0088cc;
  }
  hr{
    margin-top: 0.5rem !important;
    margin-bottom: 0.5rem !important;
  }
  .navbar-vertical.navbar-expand-xs .navbar-nav .nav-link{
    padding: 5px !important;
  }
</style>
<body>


  <!-- Main content -->
  <div class="main-content" id="panel">
    @yield('content')
  </div>

      <!-- Footer -->
      <footer class="py-5" id="footer-main" style="direction: ltr">
        <div class="container">
          <div class="row"  style="text-align: center">
            <div class="col-xl-12" style="text-align: center">
              <div class="copyright text-center text-muted" style="text-align: center">
                &copy; {{date('Y')}} <a href="#" class="font-weight-bold ml-1" target="_blank" style="">Attendees’ system</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if (session('نجاح'))
      <script>
        swal("احسنت",{{Session::get('نجاح')}},"success");
        setTimeout(function() { document.getElementById("customer_id").focus(); }, 5000);
      </script>
  @endif
  @if (session('فشل'))
      <script>
        swal("نتأسف","لم تكتمل العملية","warning");
        setTimeout(function() { document.getElementById("customer_id").focus(); }, 5000);
      </script>
  @endif
  <!-- Argon Scripts -->
  <!-- Core -->
  
  <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <!-- Argon JS -->
  
  <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
      <!-- Page level plugins -->
      <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
      <script src="{{asset('vendor/datatables-demo.js')}}"></script>
     

      <script>
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#dataTable').dataTable( {
          "pageLength": 100
        } );
      </script>
</body>

</html>
