<?php
/**
 * Created by PhpStorm.
 * User: leviathan36
 * Date: 2019-01-15
 * Time: 13:49
 */
function index()
{
    if (isset($_SESSION['user']) && ($_SESSION['user']['rights_id']==1))
    {
     $showLoginForm = false;
    }
    else
        {
            $showLoginForm = true;
        }
    require("View/admin.php");
}


