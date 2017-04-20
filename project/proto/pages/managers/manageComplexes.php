<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");

    $smarty->assign('COMPLEXES', getComplexes($_SESSION['username'])->fetchAll());

    $smarty->display('pages/managers/manageComplexes.tpl');
?>