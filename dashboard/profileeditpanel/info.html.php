
<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<script src="jquery.js"></script>
	</head>
	<body>

<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	<div class="panel-body">
		<div class="text-left bk-bg-white bk-padding-top-40 bk-padding-bottom-10">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bk-vcenter text-center">
				 	<div class="panel-body " align="center">	 
		<div style="width:120px; height:120px; border-radius:50%; overflow:hidden; align: center;" align="center">
			<img src="<?php echo $icon; ?>" onload='if (this.width>120 || this.height>120) if (this.width/this.height<120/120) this.width=120; else this.height=120;'  alt = "<?php echo htmlout($id)."'s icon"; ?>"  />
		</div>
		<div class="bk-padding-top-10">
			<i class="fa fa-circle text-success"></i> <small><?php echo "$username";?></small>
		</div>
	</div>
				</div>
				<hr class="bk-margin-off" />
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
					<!-- editicon -->	
					<div class="form-group">
					<label for="file-input">Select image to change icon:</label>
					</div>							
					<form action="?<?php htmlout($changeicon); ?>" method="post" enctype="multipart/form-data" class="form-inline">
					<div class="form-group">
					    <input type="file" name="fileToUpload" id="fileToUpload"/>
					</div>
					<div class="form-group pull-right" >
					    <input type="submit" value="Upload Image" name="submit_icon"class="btn btn-primary hidden-xs">
						</form>
					</div>
					<div class="form-group pull-right">
						<?php  echo $_SESSION["states2"];  $_SESSION["states2"] = " "; ?>
					    <?php  echo $_SESSION["firstlogin"];  $_SESSION["firstlogin"] = ""; ?>
					    <?php  echo $_SESSION["states"];  $_SESSION["states"] = ""; ?>
					</div>
				</div>	
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left bk-vcenter text-center">
					<hr class="bk-margin-off" />
					<small>HTML: 60%</small>
					<div class="progress bk-margin-bottom-10" style="height: 8px;">
						<div class="progress thin progress-striped active">
							<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
								<span class="sr-only">60% Complete</span>
							</div>
						</div>
					</div>
					<small>CSS: 88%</small>
					<div class="progress bk-margin-bottom-10" style="height: 8px;">
						<div class="progress thin progress-striped active">
							<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: 88%;">
								<span class="sr-only">88% Complete</span>
							</div>
						</div>
					</div>
					<small>JS: 35%</small>
					<div class="progress bk-margin-off-bottom" style="height: 8px;">
						<div class="progress thin progress-striped active">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%;">
								<span class="sr-only">35% Complete</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr class="bk-margin-off" />
		<div class="bk-ltr bk-bg-white">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="bk-widget bk-border-off bk-webkit-fix">
						<div class="bk-bg-white text-center bk-padding-top-20 bk-padding-bottom-10">
							<div class="row">
								<div class="text-left bk-padding-left-10">
									<h4 class="bk-margin-off">General Information</h4>
								</div>                            
							</div>
						</div> 
						<div class="bs-example">
							<div id="carousel-example-generic3" class="carousel bk-carousel-fade slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="item">
										<a class="panel-body bk-bg-white bk-bg-lighten bk-padding-off-top bk-padding-off-bottom">
											<div class="pull-left bk-margin-top-10 bk-margin-right-10">
												<div class="bk-round bk-bg-darken bk-border-off bk-icon bk-icon-default bk-bg-primary">
													<i class="fa fa-thumbs-up"></i>
												</div>
											</div>
											<h5 class="bk-fg-primary bk-fg-darken bk-margin-off-bottom">Position</h5>
											<p>
												<small><?php echo "$position";?></small>
											</p>
										</a>                                   
									</div>
									<div class="item active">
										<a class="panel-body bk-bg-white bk-bg-lighten bk-padding-off-top bk-padding-off-bottom">
											<div class="pull-left bk-margin-top-10 bk-margin-right-10">
												<div class="bk-round bk-bg-darken bk-border-off bk-icon bk-icon-default bk-bg-info">
													<i class="fa fa-building-o"></i>
												</div>
											</div>
											<h5 class="bk-fg-info bk-fg-darken bk-margin-off-bottom">Group ID</h5>
											<p>
												<small><?php echo "$group";?></small>
											</p>
										</a>                                    
									</div>                               
								</div>
								<a class="left carousel-control bk-carousel-control bk-carousel-control-white bk-carousel-hide-init" href="#carousel-example-generic3" role="button" data-slide="prev">
									<span class="fa fa-angle-left icon-prev bk-bg-very-light-gray"></span>
								</a>
								<a class="right carousel-control bk-carousel-control bk-carousel-control-white bk-carousel-hide-init" href="#carousel-example-generic3" role="button" data-slide="next">
									<span class="fa fa-angle-right icon-next"></span>
								</a>
							</div>
						</div>																				
					</div>
				</div>
			</div>
		</div>
		<hr class="bk-margin-off" />
		<div class="bk-ltr bk-bg-white">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="bk-bg-white text-center bk-padding-top-20 bk-padding-bottom-10">
						<div class="row">
							<div class="text-left bk-padding-left-10">
								<h4 class="bk-margin-off">Address</h4>
							</div>                            
						</div>
					</div> 
					<div class="bk-bg-white bk-bg-lighten bk-padding-top-10 bk-padding-left-20">
						<div class="pull-left bk-margin-right-10">
							<div class="bk-round bk-bg-darken bk-border-off">
								<i class="fa fa-map-marker fa-2x bk-fg-danger"></i>
							</div>
						</div>
						<p class="text-left">
							<small><?php echo "$address";?></small>
						</p>
					</div>  
				</div>																	
			</div>
		</div>
		<div class="bk-ltr bk-padding-bottom-20 bk-padding-left-20">
			<div class="row">
				<div class="col-12-4 col-md-12 col-sm-12 col-xs-12 bk-bg-white bk-padding-top-10">
					<i class="fa fa-phone"></i><?php echo " + "." "."$phone";?>
				</div>
				<div class="col-12-4 col-md-12 col-sm-12 col-xs-12 bk-bg-white bk-padding-top-10">
					<i class="fa fa-tablet"></i><?php echo " + "." "."$phone";?>
				</div>
				<div class="col-12-4 col-md-12 col-sm-12 col-xs-12 bk-bg-white bk-padding-top-10">
					<i class="fa fa-envelope"></i><?php echo " "." "."$email";?>
				</div>
			</div>
		</div>									
	</div>
	</body>
</html>



	</body>
</html>


