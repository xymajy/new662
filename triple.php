二级联动下拉列表（select）,都是从数据库中取值，其中第二级为可多选列表（multiple）.若要实现二级也是下拉菜单，可以将multiple改了即可。

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>全动态二级联动下拉列表</title>
</head>
<body>
<?
/***********************************************
** 功   能：PHP+mysql实现二级级联下拉框 
** 数据库：数据库名（db_city）、数据表（t_province、t_city）
** 表t_province中字段：id（id编号）、provinceName（省份名）
** 表t_city中的字段：id（id编号）、provinceId（省份ID）、cityName（城市名）
***********************************************/

//****************** 连接选择数据库 ***************
// $link = mysql_connect("localhost", "root", "123")
//    or die("Could not connect : " . mysql_error()); 
// mysql_select_db("db_city") or die("Could not select database");

include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

//******************提取省份信息******************
$sqlSel = "select * from t_province order by id ";
$result = mysql_query($sqlSel) or die("Query failed : " . mysql_error()); 

$forum_data = array();
while( $row = mysql_fetch_array($result) )
{
   $forum_data[] = $row;
}
//print_r ($forum_data);
mysql_free_result($result);

//**************获取城市信息**************       
$sqlSel2 = "select * from t_city order by provinceId desc";

if( !($result2 = mysql_query($sqlSel2)) )
{
   die('Could not query t_city list');
}

$forum_data2 = array();
while( $row2 = mysql_fetch_array($result2) )
{
   $forum_data2[] = $row2;
}

mysql_free_result($result2);
?>

<!--************ JavaScript处理province--onChange *************-->
<script language = "JavaScript"> 
var onecount2; 
subcat2 = new Array(); 
<?php 
$num2 = count($forum_data2);
?>
onecount2=<?echo $num2;?>;
<?
for($j=0;$j<$num2;$j++)
{
?>
subcat2[<?echo $j;?>] = new Array("<?echo $forum_data2[$j]['id'];?>","<?echo $forum_data2[$j]['provinceId'];?>","<?echo $forum_data2[$j]['cityName'];?>");
<?}?> 
function changelocation(id) 
{ 
document.myform.city.length = 0; 
var id=id; 
var j; 
document.myform.city.options[0] = new Option('==选择城市==',''); 
for (j=0;j < onecount2; j++) 
{ 
if (subcat2[j][1] == id) 
   { 
   document.myform.city.options[document.myform.city.length] = new Option(subcat2[j][2], subcat2[j][0]); 
   } 
} 
}
</script> 

<!--********************页面表单*************************-->
<form name="myform" method="post"> 
地址：<select name="bigClass" onChange="changelocation(document.myform.bigClass.options[document.myform.bigClass.selectedIndex].value)" size="1"> 
<option selected>请选择省份</option> 
   
<?php 
$num = count($forum_data);

for($i=0;$i<$num;$i++)
{
?>
<option value="<?echo $forum_data[$i]['id'];?>"><?echo $forum_data[$i]['provinceName'];?></option> 
<? 
}
?>
</select>
<select name="city" multiple> 
<SELECT name=city size=1 id="city">
<option selected value="">==选择城市==</option> 
</select>
</form> 
</body>
</html>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>switch page</title>
  </head>
  <body>
    <p>This is switch page</p>
<?php  echo $_SESSION["states"]; $_SESSION["states"] = ""; ?>
  <form action="/homepage.php" method="post">
  <button type="submit"  name="action" value="0">Back</button>
  </form>
  

  <form action="" method="post">
  <select  style="height:40px;width:300px" name = "timeid", id = "timeid">
    <?php foreach ($rows as $row): ?>
    <option value="<?=$row[timeid]?>"><?=$row[timedate]," ",$row[starttime]," - ",$row[endtime]?></option>
    <?php endforeach; ?>
  </select>

  <form action="" method="post">
  <select  style="height:40px;width:300px" name = "timeid", id = "timeid">
    <?php foreach ($rows2 as $row2): ?>
    <option value="<?=$row2[timeid]?>"><?=$row2[timedate]," ",$row2[starttime]," - ",$row2[endtime]?></option>
    <?php endforeach; ?>
  </select>
  </form>

  <form action="" method="post">
  <select  style="height:40px;width:300px" name = "timeid", id = "timeid">
    <?php foreach ($rows as $row): ?>
    <option value="<?=$row[timeid]?>"><?=$row[timedate]," ",$row[starttime]," - ",$row[endtime]?></option>
    <?php endforeach; ?>
  </select>
  </form>

  <input type="text" name="reason">
  <button type="submit"  name="action" value="Submit">Submit</button>
  </form>



  </body>
</html>




<?php

session_start();

  include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';


	$UID = $_SESSION["userid"];


	try
	{
	$sql = 'SELECT work_info.timeid, timedate, starttime, endtime FROM work_info INNER JOIN time_info on work_info.timeid = time_info.timeid 
	WHERE userid = :userid AND NOT EXISTS ( SELECT 1 FROM   switch WHERE  switch.userid1 = work_info.userid AND work_info.timeid=switch.usertime1)
	AND NOT EXISTS ( SELECT 1 FROM   application WHERE  application.userid = work_info.userid AND work_info.timeid=application.timeid)';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location:http://localhost/error.html.php");
	exit(); 
	}
	$rows = $row = array();
	while(	$row = $s->fetch() ){	
		$rows[] = $row;
	}

	try
	{
	$sql = 'SELECT work_info.timeid, timedate, starttime, endtime FROM work_info INNER JOIN time_info on work_info.timeid = time_info.timeid 
    WHERE userid != :userid  AND work_info.timeid not in ( SELECT work_info.timeid FROM  work_info WHERE userid = :userid )
	';
	$s = $pdo->prepare($sql);
	$s->bindValue(':userid',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location:http://localhost/error.html.php");
	exit(); 
	}
	$rows2 = $row = array();
	while(	$row = $s->fetch() ){	
		$rows2[] = $row;
	}



 	include 'switch.html.php';


	if(isset($_POST['action']) and $_POST['action'] == 'Submit')
	{
	  	$_SESSION["states"] = "Application submitted!!!!" ;
		try
		{
			$sql = 'INSERT INTO application SET
			timeid = :timeid,
			userid = :userid,
			reason = :reason';
			$s = $pdo->prepare($sql);
			$s->bindValue(':timeid',$_POST['timeid']);
			$s->bindValue(':userid',$UID);	
			$s->bindValue(':reason',$_POST['reason']);	
			$s->execute();
		}
		catch (PDOException $e){
		$error = 'Error select.';
		header("Location:http://localhost/error.html.php");
		exit(); 
		}

	  header('Location: /switch');
	}

?>

