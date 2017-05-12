<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");


    $condition1 = isset($_SESSION['userID']);
    $condition2 = isset($_POST['issueID']);
    $condition3 = isset($_POST['complexID']);

    $condition4 = empty($_SESSION['userID']);
    $condition5 = empty($_POST['issueID']);
    $condition6 = empty($_POST['complexID']);

    if(!$condition1 || !$condition2 || !$condition3)
    {
        $_SESSION['error_messages'][] = "Required variable not set;";
        if($condition3 && !$condition6)
          header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" + $complexID);
       else  header("Location: " . $BASE_URL . "pages/users/home.php");
       die();
    }

    if($condition4 || $condition5 || $condition6)
    {
        $_SESSION['error_messages'][] = "Required variable is empty;";
        if($condition3 && !$condition6)
            header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" + $complexID);
        else  header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $userID = $_SESSION['userID'];
    $issueID = $_POST['issueID'];
    $complexID = $_POST['complexID'];

    if(!isComplexManager($complexID, $userID))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    try{
        if(resolveIssue($issueID))
        {
            $_SESSION['success_messages'][] = "Issue resolved sucessfully.";
            header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" . $complexID);
        }
        else
        {
            $_SESSION['error_messages'][] = "Error resolving the issue;";
            header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" . $complexID);
            die();
        }
    }
    catch (PDOException $e)
    {
        echo $e;
        $_SESSION['error_messages'][] = "Unknown error occurred;";
        header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" + $complexID);
    }
