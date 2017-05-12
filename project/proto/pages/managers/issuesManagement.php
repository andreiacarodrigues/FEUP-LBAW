<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");

    if (isset ($_GET['complexID'] ))
        $complexID = trim(strip_tags($_GET['complexID']));
    else
    {
        $_SESSION['error_messages'][] = "Complex id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
    if(complexExists($complexID)) {
        $smarty->assign('complexID', $complexID);

        $smarty->assign('ISSUES1', getComplexIssues($complexID));
        $smarty->assign('ISSUES2', getComplexIssuesManager($complexID));

        $smarty->display('pages/managers/issuesManagement.tpl');
    }
    else
    {
        $_SESSION['error_messages'][] = "Complex id doesnt exist.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

?>