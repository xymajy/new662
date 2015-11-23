<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>DbManager</title>
<style type="text/css">
*{
    margin: 0;
    padding: 0;
}
body{
    font-size: 12px;
    font-family: '微软雅黑';
    color: #666;
}
.dbDebug{
}
.dbDebug .err{
    color: #f00;
    margin: 0 5px 0 0;
}
.dbDebug .ok{
    color: #06f;
    margin: 0 5px 0 0;
}
.dbDebug b{
    color: #06f;
    font-weight: normal;
}
.dbDebug .imp{
    color: #f06;
}
</style>
</head>
<body>
    <?php
    require 'DbManage.class.php';
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
    //echo "administ"."<br>";
    switch ($_SESSION["position"])
    {
    case 'admin':
    $files1 = scandir('./backup/');
    $files1 = array_diff($files1, array(".",".."));
    //print_r($files1);
    include 'form.html.php';
        // if (isset($_GET['backup']))
    $db = new DBManage ( 'mysql1.cs.clemson.edu', 'admin662', '662admin', 'My662Project', 'utf8' );
    if(isset($_POST['action']) and $_POST['action'] == 'backup')
        {
        //------1. database backup------------------------------------------------------------
        //The values below are host address, username, password, name of database, charset respectively
            $db->backup ('','','');
        }
        // if (isset($_GET['restore']))
    foreach( $files1 as &$file1)
    {
    if(isset($_POST['action']) and $_POST['action'] == $file1)
        {
        //The values below are host address, username, password, name of database, charset respectively
        //$db->backup ('','','');
        $db->restore ( './backup/'.$file1);
        }
    }
      break;  
    default:
        echo "you have no access to this page";
      break;
    }   
    /**
     * Created by yanue.
     * User: yansueh
     * Date: 12-10-27
     * Time: 上午11:24
     * To change this template use File | Settings | File Templates.
     */


?>

</body>
</html>

