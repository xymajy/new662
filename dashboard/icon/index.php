<?php
	
	session_start();
  	include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';
  	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

  	$target_dir =  "./icon";
  	$id = $_SESSION["userid"];
  	$icon = searchFile($target_dir, $_SESSION["userid"] ); 
	try{
	    $sql = 'SELECT * FROM user_info WHERE userid = :userid';
	    $s = $pdo->prepare($sql);
	    $s->bindValue(':userid', $_SESSION["userid"]);
	    $s->execute();
	}
	catch (PDOException $e){
	    $error = 'Error fetching user details.';
	    include '/includes/error.html.php';
	    exit();
	}
  	$row = $s->fetch();
	$username = $row['username'];
  	include "index.html.php";

	function searchFile($dir, $keyword) {
	  $sFile = getFile($dir);
	  if (count($sFile) <= 0) {
	    return false;
	  }
	  foreach ($sFile as $file) {
	    if(strstr($file, $keyword) !== false ){
	      $sResult = $file;
	    }
	  }
	  if (count($sResult) <= 0) {
	    return false;
	  } else {
	    return $sResult;
	  }

	}

	function getFile($dir){
	  $dp = opendir($dir);
	  $fileArr = array();
	  while (!false == $curFile = readdir($dp)) {
	    if ($curFile!="." && $curFile!=".." && $curFile!="") {
	      if (is_dir($curFile)) {
	        $fileArr = getFile($dir."/".$curFile);
	      } else {
	        $fileArr[] = $dir."/".$curFile;
	      }
	    }
	  }
	  return $fileArr;
	}


?>