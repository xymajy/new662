	
<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html>
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
	<div id="calendar">
	</div>
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
		<script language="javascript">
		// $('#calendar').fullCalendar({
		// height: 320,
		// header: {
		// 	left: 'title',
		// 	right: 'prev,today,next,basicDay,basicWeek,month'
		// },

		// timeFormat: 'h:mm',

		// themeButtonIcons: {
		// 	prev: 'fa fa-caret-left',
		// 	next: 'fa fa-caret-right',
		// },

		// editable: false,
		// droppable: false, // this allows things to be dropped onto the calendar !!!
	 //    eventSources: [

	 //        // your event source
	 //        {
	 //            events: [ // put the array in the `events` property

	 //                // {
	 //                //     title  : 'work',
	 //                //     start  : <?php echo json_encode($workdata1_1); ?>
	 //                //     //end    : <?php echo json_encode($workdata1_2); ?>
	 //                // },
	 //                {
	 //                    title  : 'work',
	 //                    start  : '2015-11-15'
	 //                    //end    : <?php echo json_encode($workdata2_2); ?>
	 //                }
	 //            ],
	 //            color: 'orange',     // an option!
	 //            textColor: 'purple' // an option!
	 //        }

	 //        // any other event sources...

	 //    ]

		// });	$('#calendar').fullCalendar({

$('#calendar').fullCalendar({
		height: 350,
		header: {
			left: 'title',
			right: 'prev,today,next,basicDay,basicWeek,month'
		},

		timeFormat: 'h:mm',

		themeButtonIcons: {
			prev: 'fa fa-caret-left',
			next: 'fa fa-caret-right',
		},

		editable: false,
		droppable: false, // this allows things to be dropped onto the calendar !!!
    eventSources: [

        // your event source
        {
            events: [ // put the array in the `events` property
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata1_1); ?>
                },
               {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata2_1); ?>
                },
               {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata3_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata4_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata5_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata6_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata7_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata8_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata9_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata10_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata11_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata12_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata13_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata14_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata15_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata16_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata17_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata18_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata19_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata20_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata21_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata22_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata23_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata24_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata25_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata26_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata27_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata28_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata29_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata30_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata31_1); ?>
                },
                {
                    title  : '8 hours',
                    start  : <?php echo json_encode($workdata32_1); ?>
                },



            ],
            color: 'orange',     // an option!
            textColor: 'purple' // an option!
        }

        // any other event sources...

    ]

});
		</script>
</body>
</html>