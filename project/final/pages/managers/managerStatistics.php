<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    if(!isset($_GET['complexID']))
    {
        $_SESSION['error_messages'][] = "Complex id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $complexID = trim(strip_tags($_GET['complexID']));

    if(!is_numeric($complexID))
    {
        $_SESSION['error_messages'][] = "Complex id is invalid.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $space = getSpaceWithMostReservations($complexID);

    $user = getUserWithMostRentals($complexID);

    $rentalTime = getAVGRentalTime($complexID);

    $smarty->assign('space', $space);

    $smarty->assign('user', $user);

    $smarty->assign('rentalTime', $rentalTime);

    $smarty->display('pages/managers/managerStatistics.tpl');
?>