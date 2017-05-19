<?php
    function getUsers($page)
    {
        global $conn;

        $stmt = $conn->prepare(
            'SELECT "userID", "userName", "userUsername", "userEmail", "userPhone", "userIsBanned"
            FROM "User"
             LIMIT 10 OFFSET (10 * ?);');
        $stmt->execute(array($page));
        return $stmt->fetchAll();
    }

    function getNrUsers()
    {
        global $conn;

        $stmt = $conn->prepare(
            'SELECT count("userID")
                FROM "User";');
        $stmt->execute();
        return $stmt->fetch()['count'];
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

    function getAdminIssues()
    {
        global $conn;

        $stmt = $conn->prepare(
            'SELECT "userName", "userUsername", "userEmail", "userPhone", "issueSubject", "issueID", "issueCategory", "issueDescription", "issueResolved"
                FROM "Issue"
                    JOIN  "User" ON "userID" = "issueUserID"
                    WHERE "issueUserID" IS NOT NULL 
                    AND "issueForAdmin" = true;
                ');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getRentals($page)
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
            LIMIT 10 OFFSET (10 * ?);');
        $stmt->execute(array($page));
        return $stmt->fetchAll();
    }

    function getNrRentals()
    {
        global $conn;

        $stmt = $conn->prepare(
            'SELECT count("rentalID")
                FROM "Rental"
                JOIN "Space"
                ON "spaceID" = "rentalSpaceID"
                JOIN "SportsComplex"
                ON "complexID" = "spaceComplexID"
                JOIN "User"
                ON "userID" = "rentalUserID";');
        $stmt->execute();
        return $stmt->fetch()['count'];
    }

    function pagination($data, $limit = null, $current = null, $adjacents = null)
    {
        $result = array();

        if (isset($data, $limit) === true)
        {
            $result = range(1, ceil($data / $limit));

            if (isset($current, $adjacents) === true)
            {
                if (($adjacents = floor($adjacents / 2) * 2 + 1) >= 1)
                {
                    $result = array_slice($result, max(0, min(count($result) - $adjacents, intval($current) - ceil($adjacents / 2))), $adjacents);
                }
            }
        }

        return $result;
    }
