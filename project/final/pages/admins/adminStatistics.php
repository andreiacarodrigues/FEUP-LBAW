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


    $numUsers = getNumRegisteredUsers();

    $numComplexes = getNumRegisteredComplexes();

    $numReservations = getNumReservations();

    $numSpaces = getNumSpacesRegistered();

    $sport = getMostPracticedSport();

    $smarty->assign('numUsers', $numUsers);

    $smarty->assign('numComplexes', $numComplexes);

    $smarty->assign('numReservations', $numReservations);

    $smarty->assign('numSpaces', $numSpaces);

    $smarty->assign('sport', $sport);

    $smarty->display('pages/admins/adminStatistics.tpl');
?>