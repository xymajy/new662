<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My login page</title>
  </head>
  <body>
<!--     <p>Now it is my login page</p> -->
    <h4 style="font-family:verdana">Now it is my login page
    <?php echo $loginfo; $loginfo = ""; ?>
    <form action="" method="post">
      <blockquote>
        <p>
          <div><input name="login_name" id="login_name" value=""/> </div>
	
          <div><input type = "password"  name="login_psw" id="login_psw" value=""/></div>
          <input type="submit" name="action" value="Signin">
        </p>
      </blockquote>
    </form>
  </body>
</html>
