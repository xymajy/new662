
<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>

<!DOCTYPE HTML> 
<html>
    <head>
    <style>
    .error {color: #FF0000;}
    </style>
    </head>

<body> 

<h2>PHP Form Validation Example</h2>
<form action="?<?php htmlout($createaccount); ?>" class="form-horizontal" method="post" >
  <span class="error"> </span>
   Userid: <input type="text" name="userid" id="userid" value="<?php htmlout($highestid); ?>" disabled>
   <span class="error"> <?php if($warning) echo "* required field" . "<br>"; ?></span>
   Username: <input type="text" name="username" id="userid">
   <span class="error">* <?php echo $nameErr;?></span>
   <input type="submit" name="createaccount" class="btn btn-primary hidden-xs"  value="createaccount"> 

</form>
</body>
</html>
