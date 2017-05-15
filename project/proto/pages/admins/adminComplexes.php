<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/info.php");

    $complexes = getAllComplexes();

    $smarty->assign('COMPLEXES',$complexes);

    $smarty->display('pages/admins/adminComplexes.tpl');
?>