<?php
try
{
  $pdo = new PDO('mysql:host=mysql1.cs.clemson.edu;dbname=jingyamdatabase', 'jingyam', '19910429Mjy@');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server.';
  include 'error.html.php';
  exit();
}

//try
//{

//  $sql = 'SELECT * FROM info';
//  $result = $pdo->query($sql);

//}
//catch (PDOException $e)
//{
//  $error = 'Error fetching info: ' . $e->getMessage();
//  include 'error.html.php';
//  exit();
//}

//while ($row = $result->fetch())
//{
//  $infos[] = $row['name'];
//}
//echo $infos;
echo "haha" . "<br>";
echo $_POST['my_login_name'];
$name = $_POST['my_login_name'];
$age = "28"
$insert = "INSERT INTO 'info' . 'comments' ('name','age') VALUES('$name','$age'); ";
if($pdo->exec($insert)){
  ehco "New user created successfully";
}else{
  echo "Error: " . $insert . "<br>" . $pdo->error;
}
//include 'login.html.php';
