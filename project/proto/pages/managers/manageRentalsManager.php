<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");

    if (isset ($_GET['complexID'] ))
        $complexID = trim(strip_tags($_GET['complexID']));
    else
    {
        $_SESSION['error_messages'][] = "Complex id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $rentals = getComplexRentals($complexID);

    $smarty->assign('RENTALS', $rentals);
    $smarty->assign('complexID', $complexID);

    $smarty->display('pages/managers/manageRentalsManager.tpl');
?>