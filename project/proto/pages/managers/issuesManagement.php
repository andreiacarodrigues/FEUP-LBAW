<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
include_once($BASE_DIR."database/info.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
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

    if(complexExists($complexID)) {

        $page = 0;

        if(isset($_GET['page']))
        {
            $page = trim(strip_tags($_GET['page']));
            if(!is_numeric($page))
            {
                $_SESSION['error_messages'][] = "Invalid page parameter";
                header("Location: " . $BASE_URL . "pages/users/manageRentals.php?page=0");
                die();
            }
        }

        $smarty->assign('complexID', $complexID);

        $issuesType1 = getComplexIssues($complexID, $page);
        $issuesType2 = getComplexIssuesManager($complexID, $page);

        $smarty->assign('ISSUES1', $issuesType1);
        $smarty->assign('ISSUES2', $issuesType2);

        $totalIssues = getComplexIssuesManagerNr($complexID) + getComplexIssuesNr($complexID);
        $pagination = pagination($totalIssues, 10, ($page+1), 6);

        $smarty->assign('PAGINATION', $pagination);

        $smarty->assign('PAGE', $page);

        $smarty->display('pages/managers/issuesManagement.tpl');
    }
    else
    {
        $_SESSION['error_messages'][] = "Complex id doesnt exist.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

?>