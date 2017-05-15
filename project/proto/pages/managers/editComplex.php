<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
include_once($BASE_DIR."database/municipalities.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You dont't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    if (isset ($_GET['complexID'] ))
        $complexID = trim(strip_tags($_GET['complexID']));
    else
    {
        $_SESSION['error_messages'][] = "Complex id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    if(!complexExists($complexID))
    {
        $_SESSION['error_messages'][] = "Complex with id sent doesn't exist.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else
    {
        $complexInfo = getComplexInfo($complexID);

        if(!empty($complexInfo))
        {

            $openOnWeekends = "Yes";
            if($complexInfo['complexOpenOnWeekends'] == "false")
                $openOnWeekends = "No";

            $active = "Yes";
            if($complexInfo['complexInactive'] == "true")
                $active = "No";

            $infoArray = array(
                'complexName' => $complexInfo['complexName'],
                'complexLocation' => $complexInfo['complexLocation'],
                'complexMunicipality' => $complexInfo['complexMunicipalityID'],
                'complexOpenOnWeekends' => $openOnWeekends,
                'complexEmail' => $complexInfo['complexEmail'],
                'complexPhone' => $complexInfo['complexPhone'],
                'complexDescription' => $complexInfo['complexDescription'],
                'complexOpeningHour' => substr ( $complexInfo['complexOpeningHour'] , 0 , 5 ) ,
                'complexClosingHour' => substr ( $complexInfo['complexClosingHour'] , 0 , 5 ),
                'complexPaypal' => $complexInfo['complexPaypal'],
                'complexActive' => $active
            );
        }
        else
        {
            $_SESSION['error_messages'][] = "Error getting the complex information.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }


    $municipalities = getMunicipalitiesList();

    $smarty->assign('municipalityIDs',$municipalities[0]);
    $smarty->assign('municipalityNames',$municipalities[1]);

    $smarty->assign('complexID',$complexID);
    $smarty->assign('COMPLEX',$infoArray);

    $smarty->display('pages/managers/editComplex.tpl');
?>