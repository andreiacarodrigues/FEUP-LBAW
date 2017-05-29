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

    if(isset($_SESSION['userID']))
    {
        $userMunicipality = getUserInfo($_SESSION['userID'])['userMunicipalityID'];

        $suggestionsWithRating = array();

        $suggestions = getComplexUserSuggestions($userMunicipality);

        if(count($suggestions) < 4) {
            $otherSuggestions = getOtherComplexSuggestions($userMunicipality, (4 - count($suggestions)));
            $suggestions = array_merge($suggestions, $otherSuggestions);
        }

        $suggestionsWithRating = array();

        foreach($suggestions as $suggestion) {
            $rating = getComplexRating($suggestion['complexID']);
            $suggestion['rating'] = $rating['avg'];
            array_push($suggestionsWithRating, $suggestion);
        }
    }
    else
    {
        $suggestions = getComplexSuggestions();

        $suggestionsWithRating = array();

        foreach($suggestions as $suggestion) {
            $rating = getComplexRating($suggestion['complexID']);
            $suggestion['rating'] = $rating['avg'];
            array_push($suggestionsWithRating, $suggestion);
        }
    }


    $municipalities = getMunicipalitiesList();

    $smarty->assign('municipalityIDs',$municipalities[0]);
    $smarty->assign('municipalityNames',$municipalities[1]);

    $sports = getAllSports();

    $smarty->assign('EQUIPMENT_INFORMATION', $parsedInformation);
    $smarty->assign('SPORTS', $sports);

    $smarty->assign('SUGGESTIONS', $suggestionsWithRating);

$smarty->display('pages/home.tpl');
?>