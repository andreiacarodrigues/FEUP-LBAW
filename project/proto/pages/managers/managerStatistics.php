<?php
    include_once('../../config/init.php');

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You dont't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $smarty->display('pages/managers/managerStatistics.tpl');
?>