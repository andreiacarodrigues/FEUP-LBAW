<?php
include_once('../../config/init.php');
include_once($BASE_DIR . "database/complexes.php");

    if (isset ($_GET["spaceID"] ))
        $spaceID = trim(strip_tags($_GET['spaceID']));
    else
    {
        $_SESSION['error_messages'][] = "Space id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    if(!is_numeric($spaceID))
    {
        $_SESSION['error_messages'][] = "Space id is invalid.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

if(!spaceExists($spaceID))
{
    $_SESSION['error_messages'][] = "Space with id sent doesn't exist.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else
{
    $spaceInfo = getSpaceInfo($spaceID);
    $spaceSportsInfo = getSpaceSports($spaceID);

    $rating = getSpaceRating($spaceID);

    if(!empty($spaceInfo))
    {
        $sports = getSpaceSports($spaceID);
        $result = "";

        foreach ($sports as $sport) {
            if($result == "")
                $result = $sport['sportName'];
            else
                $result = $result . ", " . $sport['sportName'];
        }

        $spaceInfo['spaceSports'] = $result;
        $spaceInfo['rating'] = $rating['avg'];
        $spaceInfo['ratingCount'] = $rating['count'];

        echo json_encode($spaceInfo);
    }
    else
        echo 'ERROR';
}

