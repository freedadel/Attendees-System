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
  <link rel="icon" href="{{asset('assets/img/brand/favicon.ico')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">
  <link href="{{asset('https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{asset('https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css')}}" rel="stylesheet">
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
    background-color: #5fc294 !important;
    color: #fff !important;
  }
  #active{
    background-color: #363738;
  }
  #dpd:hover{
    background-color:#0088cc;
  }
  hr{
    margin-top: 0.5rem !important;
    margin-bottom: 0.5rem !important;
  }
  .navbar-vertical.navbar-expand-xs .navbar-nav .nav-link{
    padding: 8px !important;
  }
  .text-ekram{
    color: #5fc294 !important;
  }
  .product-card{
    padding:5px;
    border-top-left-radius:15px;
    border-top-right-radius:15px;
    direction:rtl;
    margin:auto;
    margin-top: -34px;
    padding-top: 0px;
    padding-bottom: 0px;
    width: 90px ;
  }
</style>
<body>
  <!-- Sidenav -->
 
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom" style="background-color: #fff !important;">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
         
          <!-- Search form -->
           <!--<div class="navbar-search navbar-search-light form-inline mr-sm-3" id="searchForm">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" id="customer_id" placeholder="Search" type="text">
              </div>
            </div>
          </div>-->
          
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('img/users/'.Auth::user()->img)}}" width="40px" height="40px">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold  text-ekram">{{Auth::user()->name}}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-left" style="background-color: #292928 !important">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0  text-ekram">مرحباً بك</h6>
                </div>
                <a href="{{route('users.show',Auth::user()->id)}}" class="dropdown-item" id="dpd">
                  <i class="ni ni-single-02"></i>
                  <span>الملف الشخصي</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" id="dpd">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  <span>تسجيل الخروج</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">هل تريد الخروج فعلاً؟</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close" style="margin-left: 0px">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">اختر الخروج اذا كنت ترغب في المغادرة</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">بقاء</button>
              <a class="btn btn-primary" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">خروج</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    <!-- Header -->
    @yield('content')
  </div>

      <!-- Footer -->
      <footer class="py-5" id="footer-main" style="direction: ltr;position:inherit">
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
      <script src="{{asset('vendor/datatables/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/buttons.html5.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/jszip.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/buttons.print.min.js')}}"></script>
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
