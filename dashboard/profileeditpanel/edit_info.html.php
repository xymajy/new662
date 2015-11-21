
<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<div class="panel">
			<div class="panel-body">
				<div class="tabs">
					<ul class="nav nav-tabs">
						<li >
							<a href="#overview" data-toggle="tab">Overview</a>
						</li>
						<li class="active">
							<a href="#edit" data-toggle="tab">Edit</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="overview" class="tab-pane">										
							<div class="bk-bg-white bk-padding-top-10 bk-padding-bottom-10">
								<h4>Update Status</h4>
								<div class="bk-bg-white">
									<form role="form" action="javascript:">                           
										<input type="email" class="form-control" placeholder="What's on your mind?" />
									</form>
								</div>					  	
								<div class="bk-bg-white bk-margin-15">
									<div class="btn-group">
										<button type="button" class="btn btn-link"><i class="fa fa-map-marker"></i></button>
										<button type="button" class="btn btn-link"><i class="fa fa-camera"></i></button>
										<button type="button" class="btn btn-link"><i class="fa fa-video-camera"></i></button>						
									</div>									
									<div class="pull-right">
										<button type="button" class="btn btn-primary"><i class="fa fa-lightbulb-o"></i> Post</button>
									</div>							
								</div>
							</div>
							<h5>Timeline</h5>
							<div class="timelineProfile timeline-profile">
								<div class="timeline-body">
									<div class="timeline-title">
										<h5 class="text-uppercase">September 2014</h5>
									</div>
									<ol class="timeline-items">
										<li>
											<div class="timeline-box">
												<p class="text-muted">5 months ago.</p>
												<p>
													It's awesome when we find a good solution for our projects, Nadhif Admin is <span class="text-primary">#awesome</span>
												</p>
											</div>
										</li>
										<li>
											<div class="timeline-box">
												<p class="text-muted">5 months ago.</p>
												<p>
													What is your greatest projects for your Administrator?
												</p>
											</div>
										</li>
										<li>
											<div class="timeline-box">
												<p class="text-muted">5 months ago.</p>
												<p>
													Checkout! How cool is that!
												</p>
												<div class="img-timeline">
													<a class="img-thumbnail lightbox" href="assets/img/gallery/photo5.jpg" data-plugin-options='{ "type":"image" }'>
														<img class="img-responsive" width="215" src="assets/img/gallery/photo5.jpg">
														<span class="zoom">
															<i class="fa fa-search"></i>
														</span>
													</a>
												</div>
											</div>
										</li>
									</ol>
								</div>
							</div>
						</div>
						<div id="edit" class="tab-pane updateProfile active">
							<form action="?<?php htmlout($editform); ?>" class="form-horizontal" method="post" >
								<div class="bk-bg-white bk-padding-top-10 bk-padding-bottom-10">
									<h4>Personal Information</h4>
									<fieldset>
										<div class="form-group">
											<label for="userid">User ID</label>
											<input type="text" class="form-control" name="userid" id="userid" value="<?php htmlout($id); ?>"  disabled placeholder="Enter your user ID" />
										</div>
										<div class="form-group">
											<label for="username">User name</label>
											<input type="text" class="form-control" name="username" id="username" value="<?php htmlout($username); ?>" placeholder="Enter your usesr name" />
											<span class="error"><?php echo $_SESSION["error1"]; $_SESSION["error1"] = ""; ?></span>
										</div>
										<div class="form-group">
											<label for="phone">Phone Number</label>
											<input type="text" class="form-control" name="phone" id="phone" value="<?php htmlout($phone); ?>" placeholder="Enter your phone number" />
											<span class="error"><?php echo $_SESSION["error4"]; $_SESSION["error4"] = ""; ?></span>
										</div>
										<div class="form-group">
											<label for="email">E-mail</label>
											<input type="text" class="form-control" name="email" id="email" value="<?php htmlout($email); ?>" placeholder="Enter your E-mail" />
											<span class="error"><?php echo $_SESSION["error5"]; $_SESSION["error5"] = ""; ?></span>
										</div>
										<div class="form-group">
											<label for="address">Address</label>
											<input type="text" class="form-control" name="address" id="address" value="<?php htmlout($address); ?>" placeholder="Enter your address" />
										</div>
<!-- 										<div class="form-group">
											<label for="profileCompany">Company</label>
											<input type="text" class="form-control" id="profileCompany" placeholder="Enter your company name" />
										</div> -->
									</fieldset>
									<hr />
									<h4>About Yourself</h4>
									<fieldset>
										<div class="form-group">
											<label for="profileBio">Biographical Info</label>
											<textarea class="form-control" rows="5" id="profileBio" placeholder="Start typing"></textarea>
										</div>
										<div class="form-group">
											<div class="checkbox-custom checkbox-default bk-margin-bottom-10">
												<input type="checkbox" id="profilePublish" name="profilePublish" value="profilePublish"/>
												<label for="profilePublish"> Publish</label>
											</div>
										</div>
									</fieldset>
									<hr />
									<h4>Change Password</h4>
									<fieldset>
										<div class="form-group">
											<label for="profileNewPassword">New Password</label>
											<input type="password" class="form-control" name="userpwd" id="userpwd" value="<?php htmlout($userpwd); ?>" placeholder="Type New Password" />
											<span class="error"><?php echo $_SESSION["error2"]; $_SESSION["error2"] = ""; ?></span>														
										</div>
										<div class="form-group">
											<label for="profileNewPasswordRepeat">Repeat New Password</label>														
											<input type="password" class="form-control" name="confpwd" id="confpwd" value="<?php htmlout($userpwd); ?>" placeholder="Retype New Password" />
											<span class="error"><?php echo $_SESSION["error3"]; $_SESSION["error3"] = ""; ?></span>														
										</div>
									</fieldset>
									<div class="bk-bg-white">
										<div class="row">
											<div class="col-md-12">
											<div class="pull-right">
												<button type="submit" value="<?php htmlout($button); ?>" class="btn btn-primary">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>											
											</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>


