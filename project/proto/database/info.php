<?php
    function getUsers()
    {
        global $conn;

        $stmt = $conn->prepare(
            'SELECT "userID", "userName", "userUsername", "userEmail", "userPhone", "userIsBanned"
            FROM "User";');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getAllComplexes()
    {
        global $conn;

        $stmt = $conn->prepare(
            'SELECT "complexID", "complexName", "complexEmail", "complexPhone", "complexInactive"
            FROM "SportsComplex";');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getRentals()
    {
        global $conn;

        $stmt = $conn->prepare(
            'SELECT "rentalID","userName", "userPhone", "userEmail", "rentalDate", 
            "complexName", "complexPhone", "complexEmail", "spaceName", 
            "rentalStartTime", "rentalDurationInMinutes", "rentalState"
            FROM "Rental"
            JOIN "Space"
            ON "spaceID" = "rentalSpaceID"
            JOIN "SportsComplex"
            ON "complexID" = "spaceComplexID"
            JOIN "User"
            ON "userID" = "rentalUserID"
              ORDER BY "rentalDate", "rentalStartTime" DESC
            /*LIMIT 10 OFFSET (10 * ?)*/;');
        $stmt->execute(/*array(0)*/);
        return $stmt->fetchAll();
    }
