<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
    $complexID = $_GET['complexID'];

    $smarty->assign('complexID',$complexID);

    $complexName = getComplexName($complexID);

    $smarty->assign('complexName', $complexName);

    $smarty->display('pages/managers/addSpace.tpl');
?>