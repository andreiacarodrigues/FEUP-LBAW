<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/users.php");

    $smarty->assign('RENTALS', getUserRentals($_SESSION['username'])->fetchAll());

    $smarty->display('pages/users/manageRentals.tpl');
?>