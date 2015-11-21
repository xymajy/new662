<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<script type="text/javascript">
function Application()
{
document.form.action="/application";  
}
function Switch()
{
document.form.action="/switch";
}

</script>
    <title>home page</title>
  </head>
  <body>
    <p>home page</p>
        <p>

<form action=" editinfo" method="post">
<button type="submit"  name="action" value="0">Edit</button>
</form>
		<?php 
      echo "<br>" . "here is home page" . "<br>";
      echo "end" . "<br>";
		?>	


<form name="form" method="post">
<input type="submit" value="application" onclick="Application()" />
<input type="submit" value="switch" onclick="Switch()" />
</form>


        </p>
  </body>
</html>


