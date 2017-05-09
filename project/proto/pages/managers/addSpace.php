<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
    include_once($BASE_DIR."database/sports.php");

    $complexID = $_GET['complexID'];

    $smarty->assign('complexID',$complexID);

    $complexName = getComplexName($complexID);

    $smarty->assign('complexName', $complexName);

    $sports = getAllSports();

    $smarty->assign('EQUIPMENT_INFORMATION', $parsedInformation);
    $smarty->assign('SPORTS', $sports);

$smarty->display('pages/managers/addSpace.tpl');
?>