<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>My Subulana</title>
		<link rel="shortcut icon" href="{{ asset('my-subulana/public/assets/img/subulana.png')}}" type="image/x-icon">
		<link rel="icon" href="{{ asset('my-subulana/public/assets/img/subulana.png')}}" type="image/x-icon">
		<!-- BOOTSTRAP STYLES-->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="{{ asset('my-subulana/public/assets/css/bootstrap.css') }}" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="{{ asset('my-subulana/public/assets/css/font-awesome.css') }}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="{{ asset('my-subulana/public/assets/css/custom.css') }}" rel="stylesheet" />

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">




		<!-- GOOGLE FONTS-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
		<div id="wrapper">
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="adjust-nav">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">
							<img src="{{ asset('my-subulana/public/assets/img/subulana.png')}}" width="50px" />
							<b style="color:white;padding-left:20px">MY Subulana</b>
						</a>
					</div>
					<span class="logout-spn">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" style="font-size:13pt;color:white;padding-top:15px !important;">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
					</span>
				</div>
			</div>
			<!-- /. NAV TOP  -->
			<nav class="navbar-default navbar-side" role="navigation">
				<div class="sidebar-collapse">
					<ul class="nav" id="main-menu">
						<li>
							<a href="{{url('home')}}">
								<i class="fa fa-desktop "></i>Dashboard 
							</a>
						</li>
						<li>
							<a href="{{url('kasir')}}">
								<i class="fa fa fa-shopping-cart "></i>Kasir
							</a>
						</li>
						<li>
							<a href="{{url('barang')}}">
								<i class="fa fa-archive "></i>Barang
							</a>
						</li>
                        <li>
							<a href="ui.html">
								<i class="fa fa-money "></i>Tabungan Santri
							</a>
						</li>
                        <li>
							<a href="{{url('konfirmasi')}}">
								<i class="fa fa-check-square-o "></i>Verifikasi Kiriman
							</a>
						</li>
						<li>
							<a href="{{url('konfirmasi/manual')}}">
								<i class="fa fa-thumbs-o-up "></i>Kiriman Manual
							</a>
						</li>
                        <li>
							<a href="ui.html">
								<i class="fa fa-key "></i>Admin
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- /. NAV SIDE  -->
			@yield('content')
			<!-- /. PAGE WRAPPER  -->
		</div>
		<div class="footer">
			<div class="row">
				<div class="col-lg-12"> &copy; 2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
				</div>
			</div>
		</div>
		<!-- /. WRAPPER  -->
		<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
		<!-- JQUERY SCRIPTS -->
        <script src="{{ asset('my-subulana/public/assets/js/jquery-1.10.2.js') }}"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="{{ asset('my-subulana/public/assets/js/custom.js') }}"></script>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>


		
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var clickToCloseElements = document.querySelectorAll('.click-to-close');
                clickToCloseElements.forEach(function(element) {
                    element.addEventListener('click', function() {
                        var alertElement = this.closest('.alert');
                        alertElement.classList.add('fade');
                        setTimeout(function() {
                            alertElement.remove();
                        }, 500); // Adjust the duration if needed
                    });
                });
            });
        </script>
		
	</body>
</html>