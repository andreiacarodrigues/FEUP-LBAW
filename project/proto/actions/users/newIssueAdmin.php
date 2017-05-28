<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/users.php");
    include_once($BASE_DIR . "database/complexes.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $userID = $_SESSION['userID'];

    if(!userExists($userID))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $condition1 = isset($_POST['subject']);
    $condition2 = isset($_POST['to']);
    $condition3= isset($_POST['category']);
    $condition4 = isset($_POST['description']);

    if(!$condition1 || !$condition2 || !$condition3 || !$condition4)
    {
        $_SESSION['error_messages'][] = "Required field is empty.";
        header("Location: " . $BASE_URL . "pages/users/home.php");
    }

    $subject = strip_tags($_POST['subject']);
    $to = strip_tags($_POST['to']);
    $category = strip_tags($_POST['category']);
    $description = strip_tags($_POST['description']);

    $required = [$subject, $to, $category, $description];

foreach ($required as $item)
{
    if (empty($item))
    {
        $_SESSION['error_messages'][] = "Required field wasn't filled.";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }
}

try
{
    if (addIssueAdmin($subject, $category, $description, $to, $userID)) {

        $admins = getAdmins();

        foreach($admins as $admin)
        {
            addNotification($admin['adminID'], "You recently received a new issue with the subject: " . $subject . ".");
        }

        $_SESSION['success_messages'][] = "Message to administration sent sucessfully.";
        header("Location: " . $BASE_URL . "pages/users/home.php");
    } else {
        $_SESSION['error_messages'][] = "Error sending message to administration;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
    }

}
catch (PDOException $e) {
    echo $e;
    $_SESSION['error_messages'][] = "Unknown error occurred;";
    header("Location: " . $BASE_URL . "pages/users/home.php");


}

