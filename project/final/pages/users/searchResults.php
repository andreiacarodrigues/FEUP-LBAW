<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/municipalities.php");
    include_once($BASE_DIR."database/sports.php");
include_once($BASE_DIR."database/complexes.php");


    $municipalities = getMunicipalitiesList();

    $smarty->assign('municipalityIDs',$municipalities[0]);
    $smarty->assign('municipalityNames',$municipalities[1]);

    $sports = getAllSports();

    if(isset($_GET['search'])) {
        $search = $_GET['search'];
        if ($search != ''){
            $complexes = getHomePageSearchComplexes($search);

            $complexesWithRating = array();

            foreach($complexes as $complex) {
                $rating = getComplexRating($complex['complexID']);
                $complex['rating'] = $rating['avg'];
                array_push($complexesWithRating, $complex);
            }
            $smarty->assign('RESULT', $complexesWithRating);
        }
    }

    $smarty->assign('SPORTS', $sports);
   $smarty->display('pages/users/searchResults.tpl');
?>