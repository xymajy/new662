<?php

session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

	$UID = $_SESSION["userid"];

 	echo $UID;
 	
 	include 'change.html.php';
?>