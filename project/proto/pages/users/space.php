<?php
    include_once('../../config/init.php');

    if (isset ($_GET["spaceID"] ))
        $spaceID = trim(strip_tags($_GET['spaceID']));
    else
    {
        $_SESSION['error_messages'][] = "Space id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $smarty->assign('spaceID',$spaceID);

    $smarty->display('pages/users/space.tpl');
?>