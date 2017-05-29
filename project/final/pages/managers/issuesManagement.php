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

    $userID = $_SESSION['userID'];

    if(!isComplexManager($complexID, $userID))
    {
        $_SESSION['error_messages'][] = "You cannot access this page.";
        header("Location: ".$BASE_URL."pages/users/home.php");
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

        $issues = getAllComplexIssues($complexID, $page);

        $totalIssues = getNrAllComplexIssues($complexID);

        $pagination = pagination($totalIssues, 10, ($page+1), 6);

        $smarty->assign('PAGINATION', $pagination);
        $smarty->assign('ISSUES', $issues);

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