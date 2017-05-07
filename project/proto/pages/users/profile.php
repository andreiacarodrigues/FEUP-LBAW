<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/municipalities.php");

    $municipalities = getMunicipalitiesList();

    $smarty->assign('municipalityIDs',$municipalities[0]);
    $smarty->assign('municipalityNames',$municipalities[1]);


    $smarty->display('pages/users/profile.tpl');
?>