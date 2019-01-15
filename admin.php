<?php
/**
 * Created by PhpStorm.
 * User: leviathan36
 * Date: 2019-01-15
 * Time: 13:47
 */
require('controller/adminCtrl.php');
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


