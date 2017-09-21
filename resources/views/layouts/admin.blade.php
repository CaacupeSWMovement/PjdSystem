<!DOCTYPE HTML>
<html>
<head>
<title>PJD - Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('css/style.css')}}"/>
<!-- font CSS -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}"/> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/modernizr.custom.js')}}"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link rel="stylesheet" href="{{asset('css/animate.css')}}" />
<script src="{{asset('js/wow.min.js')}}"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="{{asset('js/Chart.js')}}"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="{{asset('css/clndr.css')}}"/>
<script src="{{asset('js/underscore-min.js')}}" type="text/javascript"></script>
<script src= "{{asset('js/moment-2.2.1.js')}}" type="text/javascript"></script>
<script src="{{asset('js/clndr.js')}}" type="text/javascript"></script>
<script src="{{asset('js/site.js')}}" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/custom.css')}}"/>
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu">
						<li>
							<a href="/inscripcion" class="active"><i class="fa fa-home nav_icon"></i>Principal</a>
						</li>
						<li class="">
							<a href="#"><i class="fa fa-book nav_icon"></i>Informes <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/inscripcion">Inscriptos</a>
								</li>
								<li>
									<a href="/localidad/parroquia">Parroquias</a>
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-envelope nav_icon"></i>Mensajes masivos</a>
							<!-- //nav-second-level -->
						</li>
						<li>
							<a href="#" class="chart-nav"><i class="fa fa-bar-chart nav_icon"></i>Estadisticas</a>
						</li>
					</ul>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="/inscripcion">
						<h1>MJM - PJD</h1>
						<span>AdminPanel</span>
					</a>
				</div>
				<!--//logo-->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="images/a.png" alt=""> </span> 
									<div class="user-name">
										<p>{{ Auth::user()->name }}</p>
										<span>Administrator</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<!--<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
								<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>--> 
								<li> <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="charts">
					
				@yield('contenido')	
				
				<div class="row calender widget-shadow">
					<h4 class="title">Calenderio</h4>
					<div class="cal1">
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2017 Caacupé Software Movement</p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="{{asset('js/classie.js')}}"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="{{asset('js/jquery.nicescroll.js')}}"></script>
	<script src="{{asset('js/scripts.js')}}"></script>
	<!--//scrolling js-->
	<link rel="stylesheet" href="{{asset('css/jqvmap.css')}}" />
						<script src="{{asset('js/jquery.vmap.js')}}"></script>
						<script src="{{asset('js/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
						<script src="{{asset('js/jquery.vmap.world.js')}}" type="text/javascript"></script>
						<script type="text/javascript">
							jQuery(document).ready(function() {
								jQuery('#vmap').vectorMap({
									map: 'world_en',
									backgroundColor: '#fff',
									color: '#696565',
									hoverOpacity: 0.8,
									selectedColor: '#696565',
									enableZoom: true,
									showTooltip: true,
									values: sample_data,
									scaleColors: ['#585858', '#696565'],
									normalizeFunction: 'polynomial'
								});
							});
						</script>
	<!-- Bootstrap Core JavaScript -->
   <script src="{{asset('js/bootstrap.js')}}"> </script>
</body>
</html>