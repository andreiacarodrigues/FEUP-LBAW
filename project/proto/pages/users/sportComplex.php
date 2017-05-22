<?php
    include_once('../../config/init.php');

    if (isset ($_GET["complexID"] ))
        $complexID = trim(strip_tags($_GET['complexID']));
    else
    {
        $_SESSION['error_messages'][] = "Complex id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $smarty->assign('complexID',$complexID);

    if (file_exists($BASE_DIR . 'res/img/originals/complex_' . $complexID . '.jpg')) {
       $hasPhoto = true;
    } else {
        $hasPhoto = false;
    }

    $smarty->assign('hasPhoto',$hasPhoto);

    $smarty->display('pages/users/sportComplex.tpl');
?>