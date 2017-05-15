<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/info.php");
include_once($BASE_DIR."database/users.php");


    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'] = "You need to be logged in to acess this page";
        header("Location: " . $BASE_URL . "pages/admins/admin.php");
        die();
    }

    if(!adminExists($_SESSION['userID']))
    {
        $_SESSION['error_messages'] = "You need to be an admin to acess this page";
        header("Location: " . $BASE_URL . "pages/admins/admin.php");
        die();
    }


$users = getUsers();

    $smarty->assign('USERS',$users);



$smarty->display('pages/admins/adminUsers.tpl');
?>