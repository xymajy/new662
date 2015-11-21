<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <meta name="GENERATOR" content="Microsoft FrontPage 4.0">
  <meta name="ProgId" content="FrontPage.Editor.Document">
  <meta name="Originator" content="Microsoft Visual Studio .NET 7.1">
    <title>warden</title>
  </head>
  <body>

 <div class="panel-body text-center bk-padding-top-20 bk-wrapper bk-bg-white">
    <!-- Work schedule starts -->
    <div id="" style="height:190px;color:#484848;">
      <?php include 'display_warden.php';?>
    </div>
    <!-- Work schedule ends -->
  </div>
  <div class="panel-body bk-padding-bottom-10 text-center bk-bg-white">
  <?php include 'display_text3.php';?>
  </div>
  <div class="panel-body bk-padding-off-bottom bk-padding-off-top bk-bg-info">
    <form action="?" method="post">
    <div class="row text-center">
      <button type="submit" name="action2" value="Adding_Account" class="btn btn-primary btn-lg hidden-xs col-lg-4 col-md-4 col-sm-4 col-xs-12 bk-bg-lighten bk-padding-top-10 bk-padding-bottom-10 ">
      <h4 class="bk-margin-off-bottom"> Adding Account or Group </h4>
      <small>Adding Account or Group</small>
      </button>
      <button type="submit" name="action2" value="Work_Arrangement" class="btn btn-primary btn-lg hidden-xs col-lg-4 col-md-4 col-sm-4 col-xs-12 bk-bg-lighten bk-padding-top-10 bk-padding-bottom-10">
      <h4 class="bk-margin-off-bottom"> Work Arrangement </h4>
      <small>Work Arrangement</small>
      </button>
      <button type="submit" name="action2" value="Deleting_Account" class="btn btn-primary btn-lg hidden-xs col-lg-4 col-md-4 col-sm-4 col-xs-12 bk-bg-lighten bk-padding-top-10 bk-padding-bottom-10">
      <h4 class="bk-margin-off-bottom"> Leader Switch </h4>
      <small>From Ireland To Khitan</small>
      </button>
    </div>
    </form>
  </div>


    <!-- ------------------------------------------------------------------------------- -->
  	

  </body>

	<script language="javascript">

  	var testarray = <?php echo json_encode($results2); ?>;
  	var liandong=new CLASS_YAO(testarray)         // Set data array
  	liandong.firstSelectChange("root","s1");      // Set first SELECT column
  	liandong.subSelectChange("s1","s2");          // Set second level SELECT column
	</script>

</html>


