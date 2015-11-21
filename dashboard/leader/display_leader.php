
<p>
<?php 
if (!isset($_POST['action2']) or isset($_POST['action2']) and $_POST['action2'] == 'Request_Control')
{

include "leaving_request.html.php";
}
if (isset($_POST['action2']) and $_POST['action2'] == 'Work_Arrangement')
{
include "work_arrangement.html.php";
}

if (isset($_POST['action2']) and $_POST['action2'] == 'Save_For_Later')
{
	echo "still working on it";
}

?>
</p>
