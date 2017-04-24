<?php
    include_once('../../config/init.php');
    $complexID = $_GET['complexID'];

    $smarty->assign('complexID',$complexID);
    $smarty->display('pages/managers/addSpace.tpl');
?>