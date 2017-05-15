<?php
    include_once('../../config/init.php');
include_once($BASE_DIR."database/users.php");

    if(isset($_SESSION['userID']))
    {
        if(!adminExists($_SESSION['userID']))
        {
            header("Location: " . $BASE_URL . "actions/admin/logout.php");
            die();
        }

    }


    $smarty->display('pages/admins/admin.tpl');
?>