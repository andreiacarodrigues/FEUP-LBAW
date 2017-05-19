<?php
    function getComplexes($username)
    {
        global $conn;

        $stmt = $conn->prepare('
        Select "complexName", "complexID"
        
        From "SportsComplex", "User", "Manager"
        
        Where
        "complexID" = "managerComplexID"
        AND "managerID" = "userID"
        AND "userUsername" = ?;
        
        ');
        $stmt->execute(array($username));
        return $stmt;
    }

    // ACABAR ESTE
    function getHomePageSearchComplexes($name, $municipality, $sport, $date, $startingTime, $duration)
    {
        global $conn;

        $stmt = $conn->prepare('
        SELECT "complexID"
        FROM "SportsComplex"
        WHERE
        ($name IS NULL OR "complexName" LIKE ‘%$name%) AND
        ($municipality IS NULL OR "complexMunicipalityID" = $municipality) AND
        ($sport IS NULL OR $sport IN
        (
        SELECT "spaceSportsSportID"
        FROM "SpaceSports"
        JOIN "Space"
        ON ("spaceID" = "spaceSportsSpaceID" AND "spaceComplexID" = "complexID");
        ))
         AND
        LIMIT 10 OFFSET (10 * $pageNumber);');
    }

    function addComplex($name, $location, $municipality, $email, $contact, $description, $openingHour, $closingHour, $openOnWeekends, $paypal)
    {
        global $conn;

        $stmt = $conn->prepare('
        INSERT INTO
        "SportsComplex"("complexName","complexLocation","complexEmail","complexPhone","complexDescription","complexOpeningHour","complexClosingHour","complexOpenOnWeekends","complexPaypal", "complexMunicipalityID")
        VALUES (?,?,?,?,?,?,?,?,?,?)
        RETURNING "complexID";');

        $stmt->execute(array($name, $location, $email, $contact, $description, $openingHour, $closingHour, $openOnWeekends, $paypal, $municipality));
        return $stmt->fetch()['complexID'];
    }

    function editComplex($complexID, $name, $location, $municipality, $email, $contact, $description, $openingHour, $closingHour, $openOnWeekends, $paypal, $inactive)
    {
        global $conn;

        $stmt = $conn->prepare('
            UPDATE "SportsComplex"
            SET
            "complexName" = ?,
            "complexLocation" = ?,
            "complexMunicipalityID" = ?,
            "complexEmail" = ?,
            "complexPhone" = ?,
            "complexDescription" = ?,
            "complexOpeningHour" = ?,
            "complexClosingHour" = ?,
            "complexOpenOnWeekends" = ?,
            "complexPaypal" = ?,
            "complexInactive"= ?
            WHERE
            "complexID" = ?;');

        return $stmt->execute(array($name, $location, $municipality, $email, $contact, $description, $openingHour, $closingHour, $openOnWeekends, $paypal, $inactive, $complexID));

       }

    function getManagersInformation($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('
            SELECT "managerID", "userName", "userEmail", "userPhone"
            FROM "Manager"
            JOIN "User"
            ON "userID" = "managerID"
            WHERE "managerComplexID" = ?
            LIMIT 10 OFFSET (10 * ?);');
        $stmt->execute(array($complexID, 0));

        return $stmt->fetchAll();
    }

    function addManager($complexID, $userID)
    {
        global $conn;

        $stmt = $conn->prepare('INSERT INTO "Manager"("managerComplexID", "managerID") VALUES (?,?)');
        return $stmt->execute(array($complexID, $userID));
    }

    function removeManager($complexID, $managerID)
    {
        global $conn;

        $stmt = $conn->prepare('
            DELETE FROM "Manager"
            WHERE "managerID" = ?
            AND "managerComplexID" = ?;');
        return $stmt->execute(array($managerID, $complexID));
    }

    function isComplexManager($complexID, $userID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT exists(SELECT FROM "Manager" WHERE "managerComplexID" = ? AND "managerID" = ?);');
        $stmt->execute(array($complexID, $userID));

        return $stmt->fetch()['exists'];
    }

    function complexExists($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "complexName" FROM "SportsComplex" WHERE "complexID" = ?');
        $stmt->execute(array($complexID));
        $complex = $stmt->fetch();

        return $complex ? true : false;
    }

    function rentalConcluded($rentalID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "rentalID" FROM "Rental" WHERE "rentalID" = ?  AND "rentalState" = \'WAITINGUSERFEEDBACK\'::"rentalState"');
        $stmt->execute(array($rentalID));
        $rental = $stmt->fetch();

        return $rental ? true : false;
    }

    function spaceExists($spaceID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "spaceName" FROM "Space" WHERE "spaceID" = ?');
        $stmt->execute(array($spaceID));
        $space = $stmt->fetch();

        return $space ? true : false;
    }

    function rentalExists($rentalID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "rentalID" FROM "Rental" WHERE "rentalID" = ?');
        $stmt->execute(array($rentalID));
        $rental = $stmt->fetch();

        return $rental ? true : false;
    }

    function getComplexRentals($complexID){
        global $conn;

        $stmt = $conn->prepare(
            'SELECT "userUsername", "userName", "userPhone", "userEmail", "rentalDate", 
             "spaceName", "rentalStartTime", "rentalDurationInMinutes", "rentalState", "rentalID"
            FROM "Rental"
            JOIN "Space"
            ON "spaceID" = "rentalSpaceID"
            JOIN "SportsComplex"
            ON "complexID" = "spaceComplexID"
            JOIN "User"
            ON "userID" = "rentalUserID"
            WHERE "complexID" = ?;');
        $stmt->execute(array($complexID));
        return $stmt->fetchAll();
    }

    function getRentalIssue($rentalID){
        global $conn;

        $stmt = $conn->prepare(
            'SELECT "issueSubject", "issueDescription", "issueCategory"
                FROM "Issue"
                WHERE "issueRentalID" = ?;');
        $stmt->execute(array($rentalID));
        return $stmt->fetch();
    }

    function getComplexName($complexID){
        global $conn;

        $stmt = $conn->prepare('SELECT "complexName" FROM "SportsComplex" WHERE "complexID" = ?');
        $stmt->execute(array($complexID));
        $complex = $stmt->fetch();
        return $complex['complexName'];
    }

    function getComplexInfo($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM "SportsComplex" WHERE "complexID" = ?');
        $stmt->execute(array($complexID));
        return $complex = $stmt->fetch();
    }

    function getSpaceRating($spaceID){
        global $conn;

        $stmt = $conn->prepare('
        SELECT AVG("rentalRating")
        FROM "Rental" 
        WHERE "rentalSpaceID" = ?');
        $stmt->execute(array($spaceID));
        return $stmt->fetch();
    }

    function getComplexRating($complexID){
        global $conn;

        $stmt = $conn->prepare('
           SELECT AVG("rentalRating")
           FROM "Rental"
           JOIN "Space"
           ON "rentalSpaceID" = "spaceID"
           WHERE
           "spaceComplexID" = ?');
        $stmt->execute(array($complexID));
        return $stmt->fetch();
    }

    function getComplexSpaces($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('
        SELECT "spaceID", "spaceName", "spaceIsCovered", "spaceSurfaceType", "spacePrice" FROM "Space" 
        WHERE "spaceComplexID" = ? AND "spaceIsAvailable" = true;');
        $stmt->execute(array($complexID));
        return $stmt->fetchAll();
    }

    function getComplexSpacesInfo($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('
        SELECT "spaceID", "spaceName", "spaceIsCovered", "spaceSurfaceType", "spacePrice", "spaceIsAvailable" 
        FROM "Space" 
        WHERE "spaceComplexID" = ?');
        $stmt->execute(array($complexID));
        return $stmt->fetchAll();
    }

    function getEquipment($spaceID, $date, $startTime, $duration)
    {
        global $conn;

        $stmt = $conn->prepare('
        SELECT
        "equipmentID"
        ,"equipmentName"
        ,"equipmentQuantity"
        ,"equipmentQuantityUnavailable"
        ,"equipmentPrice"
        , SUM(CASE WHEN "rentalEquipmentQuantity" IS NULL THEN 0 ELSE "rentalEquipmentQuantity" END) As "rentalQuantity"
        
        FROM "Space"
        JOIN "SportsComplex" ON "spaceComplexID" = "complexID"
        JOIN "Equipment" ON "complexID" = "equipmentComplexID"
        JOIN "EquipmentSports" ON "equipmentID" = "equipmentSportsEquipmentID"
        JOIN "Sport" ON "equipmentSportsSportID" = "sportID"
        
        LEFT JOIN
        (
        SELECT "equipmentID" as "cenas"
            ,"rentalEquipmentQuantity"
        FROM "Space"
        JOIN "SportsComplex" ON "spaceComplexID" = "complexID"
        JOIN "Equipment" ON "complexID" = "equipmentComplexID"
        JOIN "EquipmentSports" ON "equipmentID" = "equipmentSportsEquipmentID"
        JOIN "Sport" ON "equipmentSportsSportID" = "sportID"
        LEFT JOIN "RentalEquipment" ON "equipmentID" = "rentalEquipmentEquipmentID"
        LEFT JOIN "Rental" ON "rentalEquipmentRentalID" = "rentalID"
        WHERE "spaceID" = ?
            AND "sportName" IN (
                SELECT "sportName"
                FROM "SpaceSports"
                JOIN "Sport" ON "sportID" = "spaceSportsSportID"
                WHERE "spaceSportsSpaceID" = ?
                )
            AND "equipmentInactive" = FALSE
                AND "rentalState" = \'RESERVED\'::"rentalState"
            AND (
                (
                    ("rentalDate" + "rentalStartTime" = (?::DATE + ?::TIME))
                    OR (
                        ("rentalDate" + "rentalStartTime" < (?::DATE + ?::TIME))
                        AND ("rentalDate" + "rentalStartTime" + "rentalDurationInMinutes" > (?::DATE + ?::TIME))
                        )
                    OR (
                        ("rentalDate" + "rentalStartTime" > (?::DATE + ?::TIME))
                        AND ("rentalDate" + "rentalStartTime" < (?::DATE + ?::TIME + ?::TIME))
                        )
                )
                OR ("rentalEquipmentQuantity" IS NULL)
                )
        ) As "xxx"
        ON "equipmentID" = "cenas"
        
        WHERE "spaceID" = ?
            AND "sportName" IN (
                SELECT "sportName"
                FROM "SpaceSports"
                JOIN "Sport" ON "sportID" = "spaceSportsSportID"
                WHERE "spaceSportsSpaceID" = ?
                )
            AND "equipmentInactive" = FALSE
            
            GROUP BY "equipmentID"
        ;');
        $stmt->execute(array($spaceID, $spaceID, $date, $startTime, $date, $startTime,  $date, $startTime, $date, $startTime, $date, $startTime, $duration, $spaceID, $spaceID));
        return $stmt->fetchAll();
    }

    function getSpaceSports($spaceID)
    {
        global $conn;

        $stmt = $conn->prepare('
        SELECT "sportName"
        FROM "SpaceSports" JOIN "Sport" ON "sportID" = "spaceSportsSportID" 
        WHERE "spaceSportsSpaceID" = ?');
        $stmt->execute(array($spaceID));
        return $stmt->fetchAll();
    }

    function getSpaceSportsID($spaceID)
    {
        global $conn;

        $stmt = $conn->prepare('
            SELECT "sportID"
            FROM "SpaceSports" JOIN "Sport" ON "sportID" = "spaceSportsSportID" 
            WHERE "spaceSportsSpaceID" = ?');
        $stmt->execute(array($spaceID));
        return $stmt->fetchAll();
    }

    function getSpaceInfo($spaceID){
        global $conn;

        $stmt = $conn->prepare('
        SELECT "spaceName", "spaceIsCovered", "spaceSurfaceType", "spacePrice", "spaceComplexID", "complexName", "complexLocation", "complexEmail", "complexPhone", "complexOpeningHour",
        "complexClosingHour", "complexOpenOnWeekends"
        FROM "Space"
        JOIN "SportsComplex" ON "spaceComplexID" = "complexID"
        WHERE "spaceID" = ?;');
        $stmt->execute(array($spaceID));
        return $stmt->fetch();
    }

    function addSpace($complexID, $name, $surface, $coverage, $price, $sports)
    {
         global $conn;

        if(!$conn->beginTransaction())
        {
            return false;
        }

          $stmt = $conn->prepare('
              INSERT INTO
              "Space"("spaceName","spaceSurfaceType","spaceIsCovered", "spaceIsAvailable", "spacePrice", "spaceComplexID")
              VALUES (?,?,?,?,?,?)
              RETURNING "spaceID";');

        if(!$stmt->execute(array($name, $surface, $coverage, "true", $price, $complexID))) {
            $stmt = $conn->rollBack();
            return false;
        }
          $spaceID = $stmt->fetch()['spaceID'];

          foreach ($sports as $sport)
          {
              $stmt = $conn->prepare('
              INSERT INTO
              "SpaceSports"("spaceSportsSpaceID","spaceSportsSportID")
              VALUES (?,?);');

              if(!$stmt->execute(array($spaceID, $sport))) {
                  $stmt = $conn->rollBack();
                  return false;
              }

          }

          $stmt = $conn->commit();
          return $spaceID;
    }

    // rentalID pode ser null caso seja um manager a colocar uma issue
    function addIssue($rentalID, $subject, $category, $description, $to, $complexID)
    {
        global $conn;
        $stmt = $conn->beginTransaction();
        $stmt = $conn->prepare('
                 INSERT INTO "Issue"("issueRentalID", "issueSubject", "issueCategory", "issueDescription", "issueComplexID")
                VALUES(?, ?, ?, ?, ?)
                 RETURNING "issueID";');

        if($stmt->execute(array($rentalID, $subject, $category, $description, $complexID))) {
            $issueID = $stmt->fetch()['issueID'];

            if ($to == "forManager") {
                $stmt = $conn->prepare('
                UPDATE "Issue"
                SET "issueForManager" = TRUE, "issueForAdmin" = FALSE
                WHERE "issueID" = ?;  ');
                if(!$stmt->execute(array($issueID))) {
                    $stmt = $conn->rollBack();
                    return false;
                }

            }
            if ($to == "forAdmin") {
                $stmt = $conn->prepare('
                UPDATE "Issue"
                SET "issueForAdmin" = TRUE, "issueForManager" = FALSE
                WHERE "issueID" = ?;  ');
                if(!$stmt->execute(array($issueID))) {
                    $stmt = $conn->rollBack();
                    return false;
                }
            }
            if( $to == "forBoth") {
                $stmt = $conn->prepare('
                UPDATE "Issue"
                SET "issueForAdmin" = TRUE, "issueForManager" = TRUE
                WHERE "issueID" = ?;  ');
                if(!$stmt->execute(array($issueID))) {
                    $stmt = $conn->rollBack();
                    return false;
                }
            }

            $stmt = $conn->prepare('
                UPDATE "Rental"
                SET "rentalState" = \'CONCLUDED\'::"rentalState"
                WHERE "rentalID" = ?;');
            if(!$stmt->execute(array($rentalID))) {
                $stmt = $conn->rollBack();
                return false;
            }
        }
        $stmt = $conn->commit();
        return true;
    }

    function addIssueAdmin($subject, $category, $description, $to, $userID)
    {
        global $conn;

        $stmt = $conn->prepare('
                     INSERT INTO "Issue"("issueUserID", "issueSubject", "issueCategory", "issueDescription", "issueForAdmin")
                    VALUES(?, ?, ?, ?, true);');

        return $stmt->execute(array($userID, $subject, $category, $description));
    }

    function cancelRentalByUser($rentalID)
    {
        global $conn;
        $stmt = $conn->prepare('
                UPDATE "Rental"
                SET "rentalState" = \'CANCELEDBYUSER\'::"rentalState"
                WHERE "rentalID" = ?;');
        if(!$stmt->execute(array($rentalID))) {
            return false;
        }
        return true;
    }

    function cancelRentalByManager($rentalID)
    {
        global $conn;
        $stmt = $conn->prepare('
                    UPDATE "Rental"
                    SET "rentalState" = \'CANCELEDBYMANAGER\'::"rentalState"
                    WHERE "rentalID" = ?;');
        if(!$stmt->execute(array($rentalID))) {
            return false;
        }
        return true;
    }

    function adminSuspendRental($rentalID)
    {
        global $conn;
        $stmt = $conn->prepare('
                        UPDATE "Rental"
                        SET "rentalState" = \'SUSPENDEDBYADMIN\'::"rentalState"
                        WHERE "rentalID" = ?;');
        if(!$stmt->execute(array($rentalID))) {
            return false;
        }
        return true;
    }

    function concludeRental($rentalID)
    {
        global $conn;
        $stmt = $conn->prepare('
                            UPDATE "Rental"
                            SET "rentalState" = \'CONCLUDED\'::"rentalState"
                            WHERE "rentalID" = ?;');
        if(!$stmt->execute(array($rentalID))) {
            return false;
        }
        return true;
    }

    function adminCancelRental($rentalID)
    {
        global $conn;
        $stmt = $conn->prepare('
                                UPDATE "Rental"
                                SET "rentalState" = \'CANCELEDBYADMIN\'::"rentalState"
                                WHERE "rentalID" = ?;');
        if(!$stmt->execute(array($rentalID))) {
            return false;
        }
        return true;
    }

    function getComplexEquipmentInfo($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('
            SELECT "equipmentID", "equipmentName", "equipmentQuantity", "equipmentPrice", 
            "equipmentDetails", "equipmentQuantityUnavailable", "equipmentInactive", "equipmentSportsSportID"
            FROM "Equipment"
            JOIN "EquipmentSports"
            ON "equipmentSportsEquipmentID" = "equipmentID"
            WHERE "equipmentComplexID" = ?
            LIMIT 10 OFFSET (10 * ?);');
        $stmt->execute(array($complexID, 0)); //TODO set pagenumber
        return $stmt->fetchAll();
    }

    function getEquipmentSports($equipmentID)
    {
        global $conn;

        $stmt = $conn->prepare('
                SELECT "equipmentSportsSportID"
                FROM "EquipmentSports"
                WHERE "equipmentSportsEquipmentID" = ?;');
        $stmt->execute(array($equipmentID));
        return $stmt->fetchAll();
    }


function editEquipment($equipmentID, $name, $quantity, $details, $quantityUnavailable, $price, $sports, $available)
{
    global $conn;

    $isAvailable = TRUE;

    if($available == "false")
    {
        $isAvailable = FALSE;
    }

    if(!$conn->beginTransaction())
    {
        return false;
    }
    $stmt = $conn->prepare('
             UPDATE "Equipment"
             SET
             "equipmentName" = ?,
             "equipmentQuantity" = ?,
             "equipmentDetails" = ?,
              "equipmentPrice" = ?,
             "equipmentQuantityUnavailable" = ?,
             "equipmentInactive" = ?
             WHERE
             "equipmentID" = ?;');

    if(!$stmt->execute(array($name, $quantity, $details, $price, $quantityUnavailable, $available, $equipmentID)))
    {
        $conn->rollBack();
        return false;
    }

    $spaceOldSports = getEquipmentSports($equipmentID);
    $newSpaceOldSports = array();

    foreach ($spaceOldSports as $sport)
    {
        $newSpaceOldSports[] = $sport['equipmentSportsSportID'] . '';
        if(!in_array($sport['equipmentSportsSportID'] . '', $sports)) /* for each sport to delete */
        {
            $stmt = $conn->prepare('
                DELETE
                FROM "EquipmentSports"
                WHERE "equipmentSportsEquipmentID" = ? AND
                "equipmentSportsSportID" = ?;');

            if(!$stmt->execute(array($equipmentID, $sport['equipmentSportsSportID']))) {
                $stmt = $conn->rollBack();
                return false;
            }
        }
    }


    foreach ($sports as $sport)
    {
        if(!in_array($sport, $newSpaceOldSports)) /* for each sport to delete */
        {
            $stmt = $conn->prepare('
               INSERT INTO "EquipmentSports" VALUES(?, ?);');

            if(!$stmt->execute(array($equipmentID, $sport))) {
                $stmt = $conn->rollBack();
                return false;
            }
        }
    }

    if(!$conn->commit())
    {
        $conn->rollBack();
        return false;
    }

    return true;
}

    function editSpace($spaceID, $name, $surface, $coverage, $isAvailable, $price, $sports){

         global $conn;

        if(!$conn->beginTransaction())
         {
             return false;
         }
         $stmt = $conn->prepare('
             UPDATE "Space"
             SET
             "spaceName" = ?,
             "spaceSurfaceType" = ?,
             "spaceIsCovered" = ?,
             "spaceIsAvailable" = ?,
             "spacePrice" = ?
             WHERE
             "spaceID" = ?;');

         if(!$stmt->execute(array($name, $surface, $coverage, $isAvailable, $price, $spaceID)))
         {
             $conn->rollBack();
             return false;
         }

         $spaceOldSports = getSpaceSportsID($spaceID);
        $newSpaceOldSports = array();

         foreach ($spaceOldSports as $sport)
         {
             $newSpaceOldSports[] = $sport['sportID'] . '';
             if(!in_array($sport['sportID'] . '', $sports)) /* for each sport to delete */
            {
                $stmt = $conn->prepare('
                DELETE
                FROM "SpaceSports"
                WHERE "spaceSportsSpaceID" = ? AND
                "spaceSportsSportID" = ?;');

                if(!$stmt->execute(array($spaceID, $sport['sportID']))) {
                    $stmt = $conn->rollBack();
                    return false;
                }
            }
        }



       foreach ($sports as $sport)
        {
            if(!in_array($sport, $newSpaceOldSports)) /* for each sport to delete */
            {
                $stmt = $conn->prepare('
               INSERT INTO "SpaceSports" VALUES(?, ?);');

                if(!$stmt->execute(array($spaceID, $sport))) {
                    $stmt = $conn->rollBack();
                    return false;
                }
            }
        }

        if(!$conn->commit())
        {
            $conn->rollBack();
            return false;
        }

        return true;
    }

    function addEquipment($complexID, $name, $quantity, $details, $price, $sports)
    {
        global $conn;

        if(!$conn->beginTransaction())
        {
            return false;
        }

        if(!$conn->query('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;'))
        {
            $conn->rollBack();
            return false;
        }

        $stmt = $conn->prepare('
            INSERT INTO "Equipment" ("equipmentComplexID", "equipmentName", "equipmentQuantity", "equipmentDetails", "equipmentPrice")
            VALUES (?,?,?,?,?)
            RETURNING "equipmentID";
        ');
        if(!$stmt->execute(array($complexID, $name, $quantity, $details, $price)))
        {
            $conn->rollBack();
            return false;
        }

        $equipmentID = $stmt->fetch()['equipmentID'];

        foreach($sports as $sport)
        {
            $stmt = $conn->prepare('
                INSERT INTO "EquipmentSports" ("equipmentSportsEquipmentID", "equipmentSportsSportID") 
                VALUES (?, ?);');
            if(!$stmt->execute(array($equipmentID, $sport)))
            {
                $conn->rollBack();
                return false;
            }
        }

        if(!$conn->commit())
        {
            $conn->rollBack();
            return false;
        }

        return true;
    }

    function makeRental($spaceID, $userID, $date, $startTime, $duration, $equipmentArray){
        global $conn;

        if(!$conn->beginTransaction())
        {
            return false;
        }

        if(!$conn->query('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;'))
        {
            $conn->rollBack();
            return false;
        }

        $stmt = $conn->prepare('
           INSERT INTO "Rental" ("rentalUserID", "rentalSpaceID", "rentalDate", "rentalStartTime", "rentalDurationInMinutes", "rentalState") 
          VALUES (?, ?, ?, ?, ?,?)
          RETURNING "rentalID";
        ');
        if(!$stmt->execute(array($userID, $spaceID, $date, $startTime, $duration, "RESERVED")))
        {
            $conn->rollBack();
            return false;
        }

        $rentalID = $stmt->fetch()['rentalID'];

        foreach($equipmentArray as $equipment)
        {
            $stmt = $conn->prepare('
               INSERT INTO "RentalEquipment" 
                VALUES (?, ?, ?);');
            if(!$stmt->execute(array($rentalID, intval($equipment['equipmentID']), intval($equipment['equipmentQuantity']))))
            {
                $conn->rollBack();
                return false;
            }
        }

        if(!$conn->commit())
        {
            $conn->rollBack();
            return false;
        }

        return true;
    }

    function getComplexIssues($complexID, $page) // PARA O MANAGER
    {
        global $conn;

        $stmt = $conn->prepare('
            SELECT "userName", "userPhone", "userEmail", "rentalDate", "rentalState", "issueID", "issueSubject", "issueCategory", "issueDescription", "issueResolved", "spaceName", "rentalStartTime"
            FROM "Issue"
            JOIN "Rental"
            ON "rentalID" = "issueRentalID"
            JOIN "User"
            ON "rentalUserID" = "userID"
            JOIN "Space"
            ON "spaceID" = "rentalSpaceID"
            WHERE 
            "spaceComplexID" = ?
            AND "issueForManager" = TRUE
            LIMIT 10 OFFSET (10 * ?);');
        $stmt->execute(array($complexID, $page));
        return $stmt->fetchAll();
    }

function getAllComplexIssues($complexID, $page) // PARA O MANAGER
{
    global $conn;

    $stmt = $conn->prepare('
           
            SELECT "userName", "userPhone", "userEmail", "rentalDate", "rentalState", "issueID", "issueSubject", "issueCategory", "issueDescription", "issueResolved", "spaceName", "rentalStartTime"
            FROM "Issue"
            JOIN "Rental"
            ON "rentalID" = "issueRentalID"
            JOIN "User"
            ON "rentalUserID" = "userID"
            JOIN "Space"
            ON "spaceID" = "rentalSpaceID"
            WHERE 
            "spaceComplexID" = ?
            AND "issueForManager" = TRUE
            UNION
            SELECT null AS "userName", null AS "userPhone", null AS "userEmail",null AS "rentalDate", null AS "rentalState", "issueID", "issueSubject", "issueCategory", "issueDescription", "issueResolved",null AS "spaceName", null AS"rentalStartTime"
             FROM "Issue"
                WHERE 
                "issueComplexID" = ?
                AND "issueForManager" = TRUE
            ORDER BY "issueID"
            LIMIT 10 OFFSET (10 * ?);');
    $stmt->execute(array($complexID, $complexID, $page));
    return $stmt->fetchAll();
}

function getNrAllComplexIssues($complexID) // PARA O MANAGER
{
    global $conn;

    $stmt = $conn->prepare('
           SELECT count("issues")
           FROM
           (
            SELECT "userName", "userPhone", "userEmail", "rentalDate", "rentalState", "issueID", "issueSubject", "issueCategory", "issueDescription", "issueResolved", "spaceName", "rentalStartTime"
            FROM "Issue"
            JOIN "Rental"
            ON "rentalID" = "issueRentalID"
            JOIN "User"
            ON "rentalUserID" = "userID"
            JOIN "Space"
            ON "spaceID" = "rentalSpaceID"
            WHERE 
            "spaceComplexID" = ?
            AND "issueForManager" = TRUE
            UNION
            SELECT null AS "userName", null AS "userPhone", null AS "userEmail",null AS "rentalDate", null AS "rentalState", "issueID", "issueSubject", "issueCategory", "issueDescription", "issueResolved",null AS "spaceName", null AS"rentalStartTime"
             FROM "Issue"
                WHERE 
                "issueComplexID" = ?
                AND "issueForManager" = TRUE
          ) AS "issues";');
    $stmt->execute(array($complexID, $complexID));
    return $stmt->fetch()['count'];
}

function getComplexIssuesNr($complexID)
{
    global $conn;

    $stmt = $conn->prepare('
            SELECT count("issueID")
            FROM "Issue"
            JOIN "Rental"
            ON "rentalID" = "issueRentalID"
            JOIN "User"
            ON "rentalUserID" = "userID"
            JOIN "Space"
            ON "spaceID" = "rentalSpaceID"
            WHERE 
            "spaceComplexID" = ?
            AND "issueForManager" = TRUE;');
    $stmt->execute(array($complexID));
    return $stmt->fetch()['count'];
}

    function getComplexIssuesManager($complexID, $page) // PARA O MANAGER
    {
        global $conn;

        $stmt = $conn->prepare('
                SELECT "issueID", "issueSubject", "issueCategory", "issueDescription", "issueResolved"
                FROM "Issue"
                WHERE 
                "issueComplexID" = ?
                AND "issueForManager" = TRUE
                LIMIT 10 OFFSET (10 * ?);');
        $stmt->execute(array($complexID, $page));
        return $stmt->fetchAll();
    }

function getComplexIssuesManagerNr($complexID) // PARA O MANAGER
{
    global $conn;

    $stmt = $conn->prepare('
                SELECT count("issueID")
                FROM "Issue"
                WHERE 
                "issueComplexID" = ?
                AND "issueForManager" = TRUE;');
    $stmt->execute(array($complexID));
    return $stmt->fetch()['count'];
}

    function getRentalEquipment($rentalID)
    {
        global $conn;

        $stmt = $conn->prepare('
            SELECT "equipmentName", "rentalEquipmentQuantity"
            FROM "Rental"
			JOIN "RentalEquipment"
            ON "rentalEquipmentRentalID" = "rentalID"
			JOIN "Equipment"
			ON "equipmentID" = "rentalEquipmentEquipmentID"
            WHERE "rentalID" = ?;');
        $stmt->execute(array($rentalID));
        return $stmt->fetchAll();
    }

    function resolveIssue($issueID)
    {
        global $conn;
        $stmt = $conn->prepare('
                        UPDATE "Issue"
                        SET "issueResolved" = TRUE
                        WHERE "issueID" = ?;');
        if(!$stmt->execute(array($issueID))) {
            return false;
        }
        return true;
    }

    function updateRentalsState()
    {
        global $conn;

        $stmt = $conn->prepare('
          UPDATE "Rental"
            SET "rentalState" = \'WAITINGUSERFEEDBACK\'::"rentalState"
            WHERE "rentalState" = \'RESERVED\'::"rentalState"
            AND ((now() - (("rentalStartTime" + "rentalDate"))) < \'24 hours\'::interval)
            AND ((now() - (("rentalStartTime" + "rentalDate"))) > \'0\'::interval);');
        return $stmt->execute(array());
    }

    function setComplexInactive($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('UPDATE "SportsComplex"
                SET
                "complexInactive" = TRUE
                WHERE
                "complexID" = ?;');
        return $stmt->execute(array($complexID));
    }

    function setComplexActive($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('UPDATE "SportsComplex"
                SET
                "complexInactive" = FALSE
                WHERE
                "complexID" = ?;');
        return $stmt->execute(array($complexID));
    }
