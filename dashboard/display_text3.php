<?php 
if (!isset($_POST['action2']) or isset($_POST['action2']) and $_POST['action2'] == 'Adding_Account')
{
	$title= "Adding Account or Group";
	include 'display_text.html.php';
}
if (isset($_POST['action2']) and $_POST['action2'] == 'Work_Arrangement')
{
	$title= "Work Arrangement";
	include 'display_text.html.php';
}
if (isset($_POST['action2']) and $_POST['action2'] == 'Deleting_Account')
{
	$title= "Leader Switch";
	include 'display_text.html.php';
}
?>