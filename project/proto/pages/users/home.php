<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/municipalities.php");
    include_once($BASE_DIR."database/sports.php");
    include_once($BASE_DIR."database/users.php");
    include_once($BASE_DIR."database/complexes.php");

    if(isset($_SESSION['userID']))
    {
        if(!userExists($_SESSION['userID']))
        {
            header("Location: " . $BASE_URL . "actions/authentication/logout.php");
            die();
        }

    }

    $suggestions = getComplexSuggestions();

    $municipalities = getMunicipalitiesList();

    $smarty->assign('municipalityIDs',$municipalities[0]);
    $smarty->assign('municipalityNames',$municipalities[1]);

    $sports = getAllSports();

    $smarty->assign('EQUIPMENT_INFORMATION', $parsedInformation);
    $smarty->assign('SPORTS', $sports);

    $smarty->assign('SUGGESTIONS', $suggestions);

$smarty->display('pages/home.tpl');
?>