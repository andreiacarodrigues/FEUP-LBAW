<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You dont't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $smarty->assign('COMPLEXES', getComplexes($_SESSION['username'])->fetchAll());

    $smarty->display('pages/managers/manageComplexes.tpl');
?>