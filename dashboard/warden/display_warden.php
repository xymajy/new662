
<p>
<?php 
if (!isset($_POST['action2']) or isset($_POST['action2']) and $_POST['action2'] == 'Adding_Account')
{

include "adding_account.html.php";
include "adding_group.html.php";
}
if (isset($_POST['action2']) and $_POST['action2'] == 'Work_Arrangement')
{
include "warden_admin.html.php";
}

if (isset($_POST['action2']) and $_POST['action2'] == 'Deleting_Account')
{
include "warden_admin2.html.php";
}

?>
</p>
