<?php 
if (!isset($_POST['action2']) or isset($_POST['action2']) and $_POST['action2'] == 'Request_Control')
{
	$title= "Request Control";
	include 'display_text.html.php';
}
if (isset($_POST['action2']) and $_POST['action2'] == 'Work_Arrangement')
{
	$title= "Work Arrangement";
	include 'display_text.html.php';
}
if (isset($_POST['action2']) and $_POST['action2'] == 'Save_For_Later')
{
	$title= "Save For Late";
	include 'display_text.html.php';
}
?>