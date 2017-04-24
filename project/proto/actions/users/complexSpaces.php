<?php
include_once('../../config/init.php');
include_once($BASE_DIR . "database/complexes.php");

if (isset ($_GET["complexID"] ))
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
    $spacesInfo = getComplexSpaces($complexID);

    if(!empty($spacesInfo))
    {
        $infoArray = array();
        foreach ($spacesInfo as $space){
            $infoArray[] = array(
                'id' => $space['spaceID'],
                'name' => $space['spaceName'],
                'isCovered' => $space['spaceIsCovered'],
                'surfaceType' => $space['spaceSurfaceType'],
                'price' => $space['spacePrice'],
                'rating' => getSpaceRating($space['spaceID'])
            );
        }
        echo json_encode($infoArray);
        $_SESSION['success_messages'] = "Complex spaces sucessfully loaded.";
    }
    else
        echo 'ERROR';
}

