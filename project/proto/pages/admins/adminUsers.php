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


    $page = 0;

    if(isset($_GET['page']))
    {
        $page = trim(strip_tags($_GET['page']));
        if(!is_numeric($page))
        {
            $_SESSION['error_messages'][] = "Invalid page parameter";
            header("Location: " . $BASE_URL . "pages/users/manageRentals.php?page=0");
            die();
        }
    }


    $pagination = pagination(getNrUsers(), 10, ($page+1), 6);

    $users = getUsers($page);

    $smarty->assign('USERS',$users);

    $smarty->assign('PAGINATION', $pagination);

    $smarty->assign('PAGE', $page);



$smarty->display('pages/admins/adminUsers.tpl');
?>