<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");

    if (isset ($_GET["complexID"] ))
        $complexID = trim(strip_tags($_GET['complexID']));
    else
    {
        $_SESSION['error_messages'][] = "Complex id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $smarty->assign('complexID',$complexID);

    $spaces = getComplexSpacesInfo($complexID);

    $resultSpaces = array();

    foreach ($spaces as $space) {
        $sports = getSpaceSports($space['spaceID']);
        $result = "";

        foreach ($sports as $sport) {
        if($result == "")
            $result = $sport['sportName'];
        else
            $result = $result . ", " . $sport['sportName'];
        }

        $space['sports'] = $result;

        if ($space['spaceIsCovered'] == false)
            $space['spaceIsCovered'] = "No";
        else
            $space['spaceIsCovered'] = "Yes";


        if ($space['spaceIsAvailable'] == false)
            $space['spaceIsAvailable'] = "No";
        else
            $space['spaceIsAvailable'] = "Yes";

        array_push($resultSpaces,$space);
    }

    $smarty->assign('SPACES', $resultSpaces);
    $smarty->display('pages/managers/manageSpaces.tpl');
?>

