<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $complexID = $_GET['complexID'];
    $userID = $_SESSION['userID'];

    if(!isComplexManager($complexID, $userID))
    {
        header("Location: ".$BASE_URL."pages/users/home.php");
        die();
    }

    $managerInformation = getManagersInformation($complexID);

    $smarty->assign('MANAGER_INFORMATION', $managerInformation);
    $smarty->assign('COMPLEX_ID', $complexID);

    $smarty->display('pages/managers/complexManagers.tpl');
?>