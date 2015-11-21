<?php 
if (!isset($_POST['action']) or isset($_POST['action']) and $_POST['action'] == 'schedule')
{
	$title= "Work Schedule";
	include 'display_text.html.php';

}

if (isset($_POST['action']) and $_POST['action'] == 'request')
{
	$title= "Leaving Request";
	include 'display_text.html.php';
}

if (isset($_POST['action']) and $_POST['action'] == 'switch')
{
	$title= "Switch";
	include 'display_text.html.php';
}

?>