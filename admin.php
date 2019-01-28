<?php
require('controller/adminCtrl.php');
//require('Model/user.php');
//test condition avec session
//$_SESSION['user']['rights_id'] = 1;
if (isset($_GET["action"]))
{
    call_user_func($_GET["action"]);
}
else
{
    index();
}


