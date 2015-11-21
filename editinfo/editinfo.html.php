<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php htmlout($pageTitle); ?></title>
    <style>
    .error {color: #FF0000;}
    </style>
  </head>
  <body>
    <h1><?php htmlout($pageTitle); ?></h1>
    <?php  echo $_SESSION["firstlogin"];  $_SESSION["firstlogin"] = ""; ?>
    <?php  echo $_SESSION["states"];  $_SESSION["states"] = ""; ?>
    <form action="?<?php htmlout($action); ?>" method="post">

      <div>
        <label for="userid">userid: <input type="text" name="userid"
            id="userid" value="<?php htmlout($id); ?>"  disabled></label>
      </div>
      <div>
        <label for="username">username: <input type="text" name="username"
            id="username" value="<?php htmlout($username); ?>"></label>
        <span class="error"><?php echo $_SESSION["error1"]; $_SESSION["error1"] = ""; ?></span>
      </div>
      <div>
        <label for="userpwd">userpwd: <input  type = "password"  name="userpwd"
            id="userpwd" value="<?php htmlout($userpwd); ?>"></label>
        <span class="error"><?php echo $_SESSION["error2"]; $_SESSION["error2"] = ""; ?></span>
      </div>
      <div>
        <label for="confpwd">confirmpwd: <input  type = "password"  name="confpwd"
            id="confpwd" value="<?php htmlout($userpwd); ?>"></label>
        <span class="error"><?php echo $_SESSION["error3"]; $_SESSION["error3"] = ""; ?></span>
      </div>
      <div>
        <label for="phone">phone: <input type="text" name="phone"
            id="phone" value="<?php htmlout($phone); ?>"></label>
        <span class="error"><?php echo $_SESSION["error4"]; $_SESSION["error4"] = ""; ?></span>
      </div>
      <div>
        <label for="email">email: <input type="text" name="email"
            id="email" value="<?php htmlout($email); ?>"></label>
        <span class="error"><?php echo $_SESSION["error5"]; $_SESSION["error5"] = ""; ?></span>
      </div>
      <div>
        <label for="address">address: <input type="text" name="address"
            id="address" value="<?php htmlout($address); ?>"></label>
     </div>
      <div>
        <input type="submit" value="<?php htmlout($button); ?>">
      </div>
    </form>
  <form action=" ../dashboard " method="post">
  <button type="submit"  name="action" value="0">Back</button>
  </form>
  </body>
</html>
