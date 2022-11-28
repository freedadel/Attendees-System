<!DOCTYPE html>
<html lang="en">
  <head>
    <title>نظام المغسلة الذكية</title>
    <meta name="keywords" content="نظام لإدارة المغاسل" />
  <meta property="og:title" content="نظام المغسلة الذكية" /> 
  <meta property="og:url" content="https://laundry.com" /> 
  <meta property="og:description" content="نظام ادارة المغاسل" /> 
  <meta property="og:image" type="image/png" /> 
  <meta property="og:image:width" content="400" />
  <meta property="og:image:height" content="400" />
  <meta property="og:image" content="" /> 
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_ar.css')}}">
  </head>
  <body>

  	<div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6 d-flex align-items-center">
						<p class="mb-0 phone pl-md-2">
							<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +966 556888881</a> 
							<a href="#"><span class="fa fa-paper-plane mr-1"></span> info@elite-fintess.com</a>
						</p>
					</div>
					<div class="col-md-6 d-flex justify-content-md-end">
						<div class="social-media">
			    		<p class="mb-0 d-flex">
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
			    		</p>
					</div>
					</div>
				</div>
			</div>
		</div>
    
    @if(Session::get('lang') == 'en')
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('images/logo2.png')}}" width="11%" /> </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="{{route('home')}}" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="{{route('public.store')}}" class="nav-link">Store</a></li>
	          <li class="nav-item"><a href="{{route('public.consultation')}}" class="nav-link">Consultaions</a></li>
	          <li class="nav-item"><a href="{{route('public.instruction')}}" class="nav-link">Instructions</a></li>
	          <li class="nav-item"><a href="{{route('public.about')}}" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="{{route('public.contact')}}" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="{{route('public.login')}}" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="{{route('arabic')}}" class="nav-link">عربي</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    @else 
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('images/logo2.png')}}" width="11%" /> </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> القائمة
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav" style="direction: rtl">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="{{route('home')}}" class="nav-link">الرئيسية</a></li>
	          <li class="nav-item"><a href="{{route('public.store')}}" class="nav-link">المتجر</a></li>
	          <li class="nav-item"><a href="{{route('public.consultation')}}" class="nav-link">الاستشارات</a></li>
	          <li class="nav-item"><a href="{{route('public.instruction')}}" class="nav-link">الارشادات</a></li>
	          <li class="nav-item"><a href="{{route('public.about')}}" class="nav-link" style="width: max-content">من نحن</a></li>
	          <li class="nav-item"><a href="{{route('public.contact')}}" class="nav-link">لنتواصل</a></li>
            <li class="nav-item"><a href="{{route('public.login')}}" class="nav-link" style="width: max-content">تسجيل دخول</a></li>
            <li class="nav-item"><a href="{{route('english')}}" class="nav-link">English</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    @endif
    <!-- END nav -->
    
    @yield('content')
    @if(Session::get('lang') == 'en')
    <footer class="ftco-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2 logo"><a href="#">elite fitness</a></h2>
              <p>Be attractive .. elegant and in good health</p>
              <ul class="ftco-footer-social list-unstyled mt-2">
                <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Explore</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Home</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact Us</a></li>
              </ul>
            </div>
          </div>
         
          <div class="col-sm-12 col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Club registeration</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Instructions</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Consltations</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Store</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon fa fa-map marker"></span><span class="text">Arras, AlQassim, KSA</span></li>
	                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+966 556888881</span></a></li>
	                <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">info@elite-fintess.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid px-0 py-5 bg-black">
      	<div class="container">
      		<div class="row">
	          <div class="col-md-12">
		
	            <p class="mb-0" style="color: rgba(255,255,255,.5);"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | ICT Syndicate</a>
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	          </div>
	        </div>
      	</div>
      </div>
    </footer>
    @else 
    <footer class="ftco-footer" style="direction: rtl;text-align:right">
      <div class="container">
        <div class="row mb-5">
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2 logo"><a href="#">مركز لياقة النخبة</a></h2>
              <p>كوني جذابة .. انيقة وبصحة جيدة</p>
              <ul class="ftco-footer-social list-unstyled mt-2">
                <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">تصفح</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-left mr-2"></span> الرئيسية</a></li>
                <li><a href="#"><span class="fa fa-chevron-left mr-2"></span> عن لياقة النخبة</a></li>
                <li><a href="#"><span class="fa fa-chevron-left mr-2"></span> تواصل معنا</a></li>
              </ul>
            </div>
          </div>
         
          <div class="col-sm-12 col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">خدماتنا</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-left mr-2"></span> الاشتراك في النادي</a></li>
                <li><a href="#"><span class="fa fa-chevron-left mr-2"></span> الارشادات</a></li>
                <li><a href="#"><span class="fa fa-chevron-left mr-2"></span> الاستشارات</a></li>
                <li><a href="#"><span class="fa fa-chevron-left mr-2"></span> المتجر</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">هل لديك استفسار؟</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon fa fa-map marker"></span><span class="text">الرس - القصيم - المملكة العربية السعودية</span></li>
	                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text" style="direction: ltr">+966 556888881</span></a></li>
	                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@elite-fintess.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid px-0 py-5 bg-black">
      	<div class="container">
      		<div class="row">
	          <div class="col-md-12">
		
	            <p class="mb-0" style="color: rgba(255,255,255,.5);"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | ICT Syndicate</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	          </div>
	        </div>
      	</div>
      </div>
    </footer>
    @endif
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('js/scrollax.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
    
  </body>
</html>