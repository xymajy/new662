<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Leader</title>

  <meta name="GENERATOR" content="Microsoft FrontPage 4.0">
  <meta name="ProgId" content="FrontPage.Editor.Document">
  <meta name="Originator" content="Microsoft Visual Studio .NET 7.1">


  	</head>
  	<body>
 <div class="panel-body text-center bk-padding-top-20 bk-wrapper bk-bg-white">
    <!-- Work schedule starts -->
    <div id="" style="height:190px;color:#484848;">
      <?php include 'display_leader.php';?>
    </div>
    <!-- Work schedule ends -->
  </div>
  <div class="panel-body bk-padding-bottom-10 text-center bk-bg-white">
  <?php include 'display_text2.php';?>
  </div>
  <div class="panel-body bk-padding-off-bottom bk-padding-off-top bk-bg-info">
    <form action="?" method="post">
    <div class="row text-center">
      <button type="submit" name="action2" value="Request_Control" class="btn btn-primary btn-lg hidden-xs col-lg-4 col-md-4 col-sm-4 col-xs-12 bk-bg-lighten bk-padding-top-10 bk-padding-bottom-10 ">
      <h4 class="bk-margin-off-bottom"> Request Control </h4>
      <small>Request Control</small>
      </button>
      <button type="submit" name="action2" value="Work_Arrangement" class="btn btn-primary btn-lg hidden-xs col-lg-4 col-md-4 col-sm-4 col-xs-12 bk-bg-lighten bk-padding-top-10 bk-padding-bottom-10">
      <h4 class="bk-margin-off-bottom"> Work Arrangement </h4>
      <small>Work Arrangement</small>
      </button>
      <button type="submit" name="action2" value="Save_For_Later" class="btn btn-primary btn-lg hidden-xs col-lg-4 col-md-4 col-sm-4 col-xs-12 bk-bg-lighten bk-padding-top-10 bk-padding-bottom-10">
      <h4 class="bk-margin-off-bottom"> Save For Later </h4>
      <small>Wait! Let me think about it for a while</small>
      </button>
    </div>
    </form>
  </div>
  	</body>


</html>

