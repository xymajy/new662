
<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php htmlout($pageTitle); ?></title>
		<style type="text/css">
		textarea {
		display: block;
		width: 100%;
		}
		</style>
	</head>
	<body>
 	<div class="panel-body " align="center">								
		<!-- <div class="bk-avatar"> -->
		<div style="width:120px; height:120px; border-radius:50%; overflow:hidden; align: center;" align="center">
			<img src="<?php echo $icon; ?>" onload='if (this.width>120 || this.height>120) if (this.width/this.height<120/120) this.width=120; else this.height=120;'  alt = "<?php echo htmlout($id)."'s icon"; ?>"  />
		</div>
		<div class="bk-padding-top-10">
			<i class="fa fa-circle text-success"></i> <small><?php echo "$username";?></small>
		</div>
	</div> 

<!--  		<div style="width:120px; height:120px; border-radius:50%; overflow:hidden;">
		<img src="<?php echo $icon; ?>" onload='if (this.width>140 || this.height>226) if (this.width/this.height>140/226) this.width=140; else this.height=226;' alt = "<?php echo htmlout($id)."'s icon"; ?>"  />
class="img-circle bk-img-60"
		</div> -->
	</body>
</html>
