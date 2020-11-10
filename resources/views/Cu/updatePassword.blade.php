<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="dashboard_assets/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="dashboard_assets/css/style.css" type="text/css" />
	<link rel="stylesheet" href="dashboard_assets/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="dashboard_assets/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="dashboard_assets/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="dashboard_assets/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="dashboard_assets/css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Update Password - CU</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap py-0">
				<div class="section dark p-0 m-0 h-100 position-absolute"></div>
				<div class="section bg-transparent min-vh-100 p-0 m-0 d-flex">
					<div class="vertical-middle">
						<div class="container py-5">
							<div class="card mx-auto rounded-0 border-0" style="max-width: 500px;">
								<div class="card-body" style="padding: 40px;">
									<form id="updatePassword-form" name="updatePassword-form" class="mb-0" action="/updatePasswordSuccess" method="POST">
                 					{{ csrf_field() }}
										<h3>Update Your Password</h3>

										<div class="row">
											<div class="col-12 form-group">
												<label for="updatePassword-form-username">Masukkan Password Baru:</label>
												<input type="password" id="passwordBaru" name="passwordBaru" value="" class="form-control not-dark" required autofocus />
											</div>

											<div class="col-12 form-group">
												<label for="updatePassword-form-password">Konfirmasi Password Baru:</label>
												<input type="password" id="konfirmasiPassword" name="konfirmasiPassword" value="" class="form-control not-dark" required/>
											</div>

											<div class="col-12 form-group mb-0">
												<button class="button button-3d button-black m-0" id="updatePassword-form-submit" name="updatePassword-form-submit" value="updatePassword">Go To Dashboard</button>
												<!-- <a href="#" class="float-right">Forgot Password?</a> -->
											</div>
										</div>
										
                                        @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
									</form>
									<div class="line line-sm"></div>
								</div>
							</div>

							<div class="text-center text-muted mt-3">
								<small>Copyright © <script>document.write(new Date().getFullYear())</script> All Rights Reserved by Puskopdit BKCU Kalimantan</small>
							</div>

						</div>
					</div>
				</div>

			</div>
		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="database_assets/js/jquery.js"></script>
	<script src="database_assets/js/plugins.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="database_assets/js/functions.js"></script>

</body>
</html>