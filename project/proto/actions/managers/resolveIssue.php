<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
include_once($BASE_DIR."database/users.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $condition1 = isset($_SESSION['userID']);
    $condition2 = isset($_POST['issueID']);
    $condition3 = isset($_POST['complexID']);

    $condition4 = empty($_SESSION['userID']);
    $condition5 = empty($_POST['issueID']);
    $condition6 = empty($_POST['complexID']);

    $complexID = null;

    if($condition3)
        if(!$condition6)
              $complexID = trim(strip_tags($_POST['complexID']));

    if(!$condition1 || !$condition2 )
    {
        $_SESSION['error_messages'][] = "Required variable not set;";
        if($condition3 && !$condition6)
          header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" + $complexID);
       else  header("Location: " . $BASE_URL . "pages/users/home.php");
       die();
    }

    if($condition4 || $condition5)
    {
        $_SESSION['error_messages'][] = "Required variable is empty;";
        if($condition3 && !$condition6)
            header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" + $complexID);
        else  header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $userID = $_SESSION['userID'];
    $issueID = trim(strip_tags($_POST['issueID']));

    if(!is_numeric($issueID) || (($complexID != null) && !is_numeric($complexID)))
    {
        $_SESSION['error_messages'][] = "Invalid variables.";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    if($complexID != null) {
        if (!isComplexManager($complexID, $userID)) {
            $_SESSION['error_messages'][] = "You can't have acess to this page;";
            header("Location: " . $BASE_URL . "pages/users/home.php");
            die();
        }
    }
    else
        if(!adminExists($userID))
        {
            $_SESSION['error_messages'][] = "You can't have acess to this page;";
            header("Location: " . $BASE_URL . "pages/admins/adminIssues.php");
            die();
        }

    try{
        if(resolveIssue($issueID))
        {
            $_SESSION['success_messages'][] = "Issue resolved sucessfully.";
            if($complexID != null)
                header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" . $complexID);
            else
                header("Location: " . $BASE_URL . "pages/admins/adminIssues.php");
        }
        else
        {
            $_SESSION['error_messages'][] = "Error resolving the issue;";
            if($complexID != null)
                header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" . $complexID);
            else
                header("Location: " . $BASE_URL . "pages/admins/adminIssues.php");
            die();
        }
    }
    catch (PDOException $e)
    {
        echo $e;
        $_SESSION['error_messages'][] = "Unknown error occurred;";
        if($complexID != null)
            header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" . $complexID);
        else
            header("Location: " . $BASE_URL . "pages/admins/adminIssues.php");
        die();
    }
