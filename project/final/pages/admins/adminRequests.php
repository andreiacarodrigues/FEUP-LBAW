<?php
    include_once('../../config/init.php');
include_once($BASE_DIR."database/users.php");
include_once($BASE_DIR."database/info.php");

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

    $requests = getAdminRequests();

    $smarty->assign('REQUESTS', $requests);

    $smarty->display('pages/admins/adminRequests.tpl');
?>