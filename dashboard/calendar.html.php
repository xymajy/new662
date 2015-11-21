<!DOCTYPE html>
<html lang="en">

	<head>
	
		<!-- Basic -->
    	<meta charset="UTF-8" />

		<title>Calendar | Nadhif - Responsive Admin Template</title>
		
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
		<link href="assets/plugins/bootkit/css/bootkit.css" rel="stylesheet" />
		<link href="assets/plugins/fullcalendar/css/fullcalendar.css" rel="stylesheet" />
		<link href="assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet" />					
		
		<!-- Theme CSS -->
		<link href="assets/css/jquery.mmenu.css" rel="stylesheet" />
		
		<!-- Page CSS -->		
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href="assets/css/add-ons.min.css" rel="stylesheet" />
		
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
	












					<div class="panel bk-bg-white bk-margin-bottom-20">
						<div class="panel-heading bk-bg-primary">
							<h6><i class="fa fa-calendar"></i>Calendar</h6>
							<div class="panel-actions">
								<a href="calendar.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
								<a href="calendar.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="calendar.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div class="panel-heading bk-bg-white">
										<h3 class="panel-title bk-fg-primary">Create Quick Event</h3>
									</div>
									<div class="panel-body">
										<input type="text" class="form-control" id="quick-event-name" placeholder="new event title"></input><br>
										<button type="button" id="btn-quick-event" class="btn btn-primary pull-right"><i class="fa fa-plus-square"></i> Create</button>
									</div>
								</div>
								<div class="col-md-6">
									<div class="panel-heading">
										<h3 class="panel-title bk-fg-primary bk-border-primary bk-padding-left-10">Draggable Events</h3>
									</div>
									<div class="panel-body">
										<div id="external-events">			
											<div class="external-event label label-default" data-event-class="fc-event-default">Default Event</div>
											<div class="external-event label label-primary" data-event-class="fc-event-primary">Primary Event</div>
											<div class="external-event label label-success" data-event-class="fc-event-success">Success Event</div>
											<div class="external-event label label-warning" data-event-class="fc-event-warning">Warning Event</div>
											<div class="external-event label label-info" data-event-class="fc-event-info">Info Event</div>
											<div class="external-event label label-danger" data-event-class="fc-event-danger">Danger Event</div>
											<div class="external-event label label-dark" data-event-class="fc-event-dark">Dark Event</div>
											<br /><br />
											<div class="checkbox-custom checkbox-default bk-margin-5">
												<input id="RemoveAfterDrop" type="checkbox" />
												<label for="RemoveAfterDrop">remove after drop</label>
											</div>
										</div>
									</div>								
								</div>
							</div>
							<hr>							
					<div class="row">
						<div class="col-sm-12">
							<div class="panel">
								<div class="panel-body">							
									<div id="calendar"></div>								
								</div>
							</div>
						</div>
					</div>
						</div>
					</div>			
				</div>
				<!-- End Main Page -->
				


		
		
		<!-- Modal Dialog -->
		<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title bk-fg-primary">Modal title</h4>
					</div>
					<div class="modal-body">
						<p class="bk-fg-danger">Here settings can be configured...</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div><!-- End Modal Dialog -->		
		
		<div class="clearfix"></div>		
		
		
		<!-- start: JavaScript-->
		
		<!-- Vendor JS-->				
		<script src="assets/vendor/js/jquery.min.js"></script>
		<script src="assets/vendor/js/jquery-2.1.1.min.js"></script>
		<script src="assets/vendor/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/vendor/skycons/js/skycons.js"></script>
		
		<!-- Plugins JS-->
		<script src="assets/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js"></script>
		<script src="assets/plugins/moment/js/moment.min.js"></script>	
		<script src="assets/plugins/fullcalendar/js/fullcalendar.min.js"></script>			
		
		<!-- Theme JS -->		
		<script src="assets/js/jquery.mmenu.min.js"></script>
		<script src="assets/js/core.min.js"></script>
		
		<!-- Pages JS -->
		<script src="assets/js/pages/calendar.js"></script>
		
		<!-- end: JavaScript-->
		
	</body>
	
</html>