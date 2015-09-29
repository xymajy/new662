

<?php
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

//******************提取timeid信息******************
$sql = 'SELECT * FROM work_info order by timeid';
$s = $pdo->prepare($sql);
$s->execute();
$forum_timeid = $s->fetch();


//******************提取userid信息******************
$sql2 = 'SELECT * FROM work_info order by timeid desc';
$s2 = $pdo->prepare($sql2);
$s2->execute();
$forum_userid = $s2->fetch();

echo "1";
include 'triple.html.php';

?>



