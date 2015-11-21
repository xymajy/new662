<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">

	<head>
	
		<!-- Basic -->
    	<meta charset="UTF-8" />

		<title>Register | Nadhif - Responsive Admin Template</title>
		
		<!-- Mobile Metas -->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
		<!-- Import google fonts -->
        <link href="http://fonts.useso.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css" />
        
		<!-- Favicon and touch icons -->
		<link rel="shortcut icon" href="assets/ico/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="assets/ico/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="assets/ico/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="assets/ico/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="assets/ico/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="assets/ico/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="assets/ico/apple-touch-icon-152x152.png" />
		
	    <!-- start: CSS file-->
		
		<!-- Vendor CSS-->
		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/vendor/skycons/css/skycons.css" rel="stylesheet" />
		<link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
		
		<!-- Plugins CSS-->		
		
		<!-- Theme CSS -->
		<link href="assets/css/jquery.mmenu.css" rel="stylesheet" />
		
		<!-- Page CSS -->		
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href="assets/css/add-ons.min.css" rel="stylesheet" />
		
		<style>
			footer {
				display: none;
			}
		</style>
		
		<!-- end: CSS file-->	
	    
		
		<!-- Head Libs -->
		<script src="assets/plugins/modernizr/js/modernizr.js"></script>
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->		
		
	</head>

	<body>

		<!-- Start: Content -->
		<div class="container-fluid content">
			<div class="row">
				<!-- Main Page -->
				<div class="body-register">
					<div class="center-register">
						<a href="#" class="logo pull-left hidden-xs">
							<img src="assets/img/logo.png" height="45" alt="Clemson Jail" />
						</a>

						<div class="panel panel-register">
							<div class="panel-title-register text-right">
								<h2 class="title text-uppercase"><i class="fa fa-user"></i> First Login</h2>
							</div>
							<div class="panel-body">
								<form action="?<?php htmlout($action); ?>" method="post">
									<div class="form-group">
										<div class="text-center">
										<h2><?php  echo $_SESSION["firstlogin"];  $_SESSION["firstlogin"] = ""; ?>
		    							<?php  echo $_SESSION["states"];  $_SESSION["states"] = ""; ?></h2>
										</div>
										<label>Userid</label>
										<input type="text" name="userid" id="userid" value="<?php htmlout($id); ?>" class="form-control" disabled>
									</div>
									<div class="form-group">
										<label>Username</label>
										<input type="text" name="username" id="username" value="<?php htmlout($username); ?>" class="form-control" >
									</div>
									<div class="form-group">
										<label>E-mail Address</label>
										<input type="text" name="email" id="email" value="<?php htmlout($email); ?>" class="form-control">
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="text" name="phone" id="phone" value="<?php htmlout($phone); ?>" class="form-control">
									</div>
									<div class="form-group">
										<label>Address</label>
										<input type="text" name="address" id="address" value="<?php htmlout($address); ?>" class="form-control">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>Password</label>
												<input  type = "password"  name="userpwd" id="userpwd" value="<?php htmlout($userpwd); ?>" class="form-control">
											</div>
											<div class="col-sm-6">
												<label>Password Confirmation</label>
												<input  type = "password"  name="confpwd" id="confpwd" value="<?php htmlout($userpwd); ?>" class="form-control">
											</div>
										</div>
									</div>
											<div>
												<h1>
												<?php echo $_SESSION["error1"]; $_SESSION["error1"] = ""; ?><br/>
												<?php echo $_SESSION["error2"]; $_SESSION["error2"] = ""; ?><br/>
												<?php echo $_SESSION["error3"]; $_SESSION["error3"] = ""; ?><br/>
												<?php echo $_SESSION["error4"]; $_SESSION["error4"] = ""; ?><br/>
												<?php echo $_SESSION["error5"]; $_SESSION["error5"] = ""; ?></h1>
											</div>
									<div class="row">
										<div class="col-sm-8">
											<div class="checkbox-custom checkbox-default">
											</div>
										</div>
										<div class="col-sm-4 text-right">
											<input class="btn btn-primary hidden-xs bk-margin-top-10" type="submit" value="<?php htmlout($button); ?>">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End Main Page -->
		
				<!-- Usage -->
				<!-- End Usage -->					
		
			</div>
		</div><!--/container-->
		
		
		<!-- start: JavaScript-->
		
		<!-- Vendor JS-->				
		<script src="assets/vendor/js/jquery.min.js"></script>
		<script src="assets/vendor/js/jquery-2.1.1.min.js"></script>
		<script src="assets/vendor/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/vendor/skycons/js/skycons.js"></script>
		
		<!-- Plugins JS-->
		
		<!-- Theme JS -->		
		<script src="assets/js/jquery.mmenu.min.js"></script>
		<script src="assets/js/core.min.js"></script>
		
		<!-- Pages JS -->
		<script src="assets/js/pages/page-register.js"></script>
		
		<!-- end: JavaScript-->
		
	</body>
	
</html>