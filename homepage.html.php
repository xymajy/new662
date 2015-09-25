<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<script type="text/javascript">
function Cancle()
{
document.form.action="cancle.php";  
}
function Change()
{
document.form.action="change.php";
}

</script>
    <title>home page</title>
  </head>
  <body>
    <p>home page</p>
        <p>

<form action="/editinfo" method="post">
<button type="submit"  name="action" value="0">Edit</button>
</form>
		<?php 
      echo "<br>" . "here is home page" . "<br>";
      echo "end" . "<br>";
		?>	


<form name="form" method="post">
<input type="submit" value="Cancle" onclick="Cancle()" />
<input type="submit" value="Change" onclick="Change()" />
</form>


        </p>
  </body>
</html>


