<?php
    function verifyUser($username, $password)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userPassword" FROM "User" WHERE "userUsername" = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        return ($user !== false && password_verify($password, $user['userPassword']));
    }

    function verifyAdmin($username, $password)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "adminPassword" FROM "Admin" WHERE "adminUsername" = ?');
        $stmt->execute(array($username));
        $admin = $stmt->fetch();

        return ($admin !== false && password_verify($password, $admin['adminPassword']));
    }

    function adminAccepted($username, $password)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "adminPassword" FROM "Admin" WHERE "adminUsername" = ? AND "adminAccepted" = TRUE');
        $stmt->execute(array($username));
        $admin = $stmt->fetch();

        return ($admin !== false && password_verify($password, $admin['adminPassword']));
    }

    function registerUser($username, $password, $name, $email, $phone, $municipality)
    {
        global $conn;

        $defaultables = [$phone, $municipality];

        foreach($defaultables as $defaultable)
        {
            $defaultable = empty($defaultable) ? "DEFAULT" : $defaultable;
        }

        $stmt = $conn->prepare('INSERT INTO "User"("userUsername","userPassword","userName","userEmail","userPhone", "userMunicipalityID") VALUES (?,?,?,?,?,?)');

        $options = ['cost' => 10];

        return $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT, $options), $name, $email, $phone, $municipality));
    }

    function registerAdmin($username, $password)
    {
        global $conn;

        $stmt = $conn->prepare('INSERT INTO "Admin"("adminUsername","adminPassword") VALUES (?,?)');

        $options = ['cost' => 10];

        return $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT, $options)));
    }

    function userExists($userID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userID" FROM "User" WHERE "userID" = ?');
        $stmt->execute(array($userID));
        $user = $stmt->fetch();

        return $user ? true : false;
    }

    function adminExists($adminID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "adminID" FROM "Admin" WHERE "adminID" = ?');
        $stmt->execute(array($adminID));
        $admin = $stmt->fetch();

        return $admin ? true : false;
    }

    function acceptAdmin($adminID)
    {
        global $conn;

        $stmt = $conn->prepare('
        UPDATE "Admin"
        SET
        "adminAccepted" = true
        WHERE
        "adminID" = ?;');
        return $stmt->execute(array($adminID));
    }

    function removeRequest($adminID)
    {
        global $conn;

        $stmt = $conn->prepare('
            DELETE FROM "Admin"
            WHERE
            "adminID" = ?;');
        return $stmt->execute(array($adminID));
    }

    function userIsBanned($userID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userID" FROM "User" WHERE "userID" = ? AND "userIsBanned" = TRUE');
        $stmt->execute(array($userID));
        $user = $stmt->fetch();

        return $user ? true : false;
    }

    function userUsernameExists($username)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userUsername" FROM "User" WHERE "userUsername" = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        return $user ? true : false;
    }

    function adminUsernameExists($username)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "adminUsername" FROM "Admin" WHERE "adminUsername" = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        return $user ? true : false;
    }

    function editProfile($userID, $name, $username, $municipality, $email, $contact)
    {
        global $conn;

        $stmt = $conn->prepare('UPDATE "User"
        SET
        "userName" = ?,
        "userEmail" = ?,
        "userUsername" = ?,
        "userPhone" = ?,
        "userMunicipalityID" = ?
        WHERE
        "userID" = ?;');
        return $stmt->execute(array($name, $email, $username, $contact, $municipality, $userID));
    }

    function banUser($userID)
    {
        global $conn;

        $stmt = $conn->prepare('UPDATE "User"
            SET
            "userIsBanned" = TRUE
            WHERE
            "userID" = ?;');
        return $stmt->execute(array($userID));
    }

    function unblockUser($userID)
    {
        global $conn;

        $stmt = $conn->prepare('UPDATE "User"
                SET
                "userIsBanned" = FALSE
                WHERE
                "userID" = ?;');
        return $stmt->execute(array($userID));
    }

    function editPassword($userID, $password)
    {
        global $conn;

        $stmt = $conn->prepare('UPDATE "User"
            SET
            "userPassword" = ?
            WHERE
            "userID" = ?;');
        return $stmt->execute(array($password, $userID));

    }

    function emailExists($email)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userUsername" FROM "User" WHERE "userEmail" = ?');
        $stmt->execute(array($email));
        $user = $stmt->fetch();

        return $user ? true : false;
    }

    function getUserRentals($userID, $page)
    {
        global $conn;

        $stmt = $conn->prepare('
        Select "rentalID", "rentalDate", "rentalDuration", "rentalState", "spaceName", "complexName", "rentalStartTime", "rentalRating"

        From "Rental", "User", "Space", "SportsComplex"
        
        Where
        "userID" = ?
        AND "userID" = "rentalUserID"
        AND "rentalSpaceID" = "spaceID"
        AND "spaceComplexID" = "complexID"
        
        ORDER BY "rentalDate", "rentalStartTime" DESC
        LIMIT 10 OFFSET (10 * ?);
        ');

        $stmt->execute(array($userID, $page));
        return $stmt;
    }


    function addRentalRating($rentalID, $rating){
        global $conn;

        $stmt = $conn->prepare('UPDATE "Rental"
            SET
            "rentalRating" = ?
            WHERE
            "rentalID" = ?;');
        return $stmt->execute(array($rating, $rentalID));
    }

function getUserNrRentals($userID)
{
    global $conn;

    $stmt = $conn->prepare('
       Select count("rentalID")
               From "Rental", "User", "Space", "SportsComplex"
        
               Where
               "userID" = ?
                AND "userID" = "rentalUserID"
                AND "rentalSpaceID" = "spaceID"
                AND "spaceComplexID" = "complexID";
        ');

    $stmt->execute(array($userID));
    return $stmt->fetch()['count'];
}

    function getUserID($username)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userID" FROM "User" WHERE "userUsername" = ?');
        $stmt->execute(array($username));

        return $stmt->fetch()['userID'];
    }

    function getAdminID($username)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "adminID" FROM "Admin" WHERE "adminUsername" = ?');
        $stmt->execute(array($username));

        return $stmt->fetch()['adminID'];
    }

    function getUsername($userID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userUsername" FROM "User" WHERE "userID" = ?');
        $stmt->execute(array($userID));

        return $stmt->fetch()['userUsername'];
    }


    function getUserInfo($userID)
    {
        global $conn;

        $stmt = $conn->prepare('
        SELECT "userName", "userUsername","userEmail", "userPhone", "userMunicipalityID"
        FROM "User"
        WHERE "userID" = ?;');
        $stmt->execute(array($userID));

        return $stmt->fetch();
    }

    function getUserIDByEmail($userEmail)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userID" FROM "User" WHERE "userEmail" = ?');
        $stmt->execute(array($userEmail));

        return $stmt->fetch()['userID'];
    }

    function getNotifications($userID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "notificationText" FROM "Notification" WHERE "notificationUserID" = ?');
        $stmt->execute(array($userID));

        $notifications = $stmt->fetchAll();

        $stmt = $conn->prepare('DELETE FROM "Notification" WHERE "notificationUserID" = ?');
        $stmt->execute(array($userID));
        return $notifications;
    }





