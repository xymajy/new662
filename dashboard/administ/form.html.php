<!DOCTYPE html>
<html lang="en">

  <head>
  
    <!-- Basic -->
      <meta charset="UTF-8" />

    <title>Login | Nadhif - Responsive Admin Template</title>
    
    <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    
    <!-- Import google fonts -->
        <link href="http://fonts.useso.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css" />
        
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="assets/ico/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/ico/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/ico/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/ico/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/ico/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/ico/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/ico/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="../ssets/ico/apple-touch-icon-152x152.png" />
    
      <!-- start: CSS file-->
    
    <!-- Vendor CSS-->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/vendor/skycons/css/skycons.css" rel="stylesheet" />
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    
    <!-- Plugins CSS-->   
    
    <!-- Theme CSS -->
    <link href="../assets/css/jquery.mmenu.css" rel="stylesheet" />
    
    <!-- Page CSS -->   
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/add-ons.min.css" rel="stylesheet" />
    
    <style>
      footer {
        display: none;
      }
    </style>
    
    <!-- end: CSS file--> 
      
    
    <!-- Head Libs -->
    <script src="../assets/plugins/modernizr/js/modernizr.js"></script>
    
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
        <div class="body-login">
          <div class="center-login">
            <a href="#" class="logo pull-left hidden-xs">
              <img src="assets/img/logo.png" height="45" alt="Clemson Jail" />
            </a>

            <div class="panel panel-login">
              <div class="panel-title-login text-right">
                <h2 class="title"><i class="fa fa-user"></i> Admin Panel</h2>
              </div>
              <div class="panel-body">
                <form action="" method="post">
                  <div class="form-group">
                    <label> Instruction:<br/>Press backup button to backup database <br/>Press file name to choose file to restore</label>
                    <div class="input-group input-group-icon">
                        <button type="submit"  name="action" value="backup" class='btn btn-primary hidden-xs'>Backup</button>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Restore</label>                 
                    <div class="input-group input-group-icon">
                      <?php
                      foreach( $files1 as &$file1)
                      {
                        //print($file1);
                        echo "<button type='submit'  name='action' value='$file1' class='btn btn-primary hidden-xs'>".$file1."</button>"."<br/>";
                      }
                      ?>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-8">
                    </div>
                  </div>
                  <br />
                  <br />
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Main Page -->
            
    
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
    <script src="assets/js/pages/page-login.js"></script>
    
    <!-- end: JavaScript-->
    
    
  </body>
  
</html>
