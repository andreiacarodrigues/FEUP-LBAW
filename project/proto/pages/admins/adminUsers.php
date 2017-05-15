<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/info.php");

    $users = getUsers();

    $smarty->assign('USERS',$users);



$smarty->display('pages/admins/adminUsers.tpl');
?>