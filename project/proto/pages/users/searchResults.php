<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/municipalities.php");
    include_once($BASE_DIR."database/sports.php");

    $municipalities = getMunicipalitiesList();

    $smarty->assign('municipalityIDs',$municipalities[0]);
    $smarty->assign('municipalityNames',$municipalities[1]);

    $sports = getAllSports();

    $smarty->assign('EQUIPMENT_INFORMATION', $parsedInformation);
    $smarty->assign('SPORTS', $sports);
    $smarty->display('pages/users/searchResults.tpl');
?>