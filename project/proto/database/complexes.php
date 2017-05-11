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
            SELECT "equipmentID", "equipmentName", "equipmentQuantity", "equipmentQuantityUnavailable", "equipmentPrice", 
            sum("rentalEquipmentQuantity") AS "rentalQuantity"
            FROM "Space"
            JOIN "SportsComplex" ON "spaceComplexID" = "complexID"
            JOIN "Equipment" ON "complexID" = "equipmentComplexID"
            JOIN "EquipmentSports" ON "equipmentID" = "equipmentSportsEquipmentID"
            JOIN "Sport" ON "equipmentSportsSportID" = "sportID"
            LEFT JOIN "RentalEquipment" ON "equipmentID" = "rentalEquipmentEquipmentID"
            LEFT JOIN "Rental" ON "rentalEquipmentRentalID" = "rentalID"
            WHERE
            "spaceID" = ? AND
            "sportName" IN (SELECT "sportName"
                            FROM "SpaceSports" JOIN "Sport" ON "sportID" = "spaceSportsSportID" 
                            WHERE "spaceSportsSpaceID" = ?) AND
            "equipmentInactive" = FALSE
            AND
            ((
            NOT("rentalDate" + "rentalStartTime" = (?::date + ?::time ))
            AND NOT(
            ("rentalDate" + "rentalStartTime" < (?::date + ?::time)) AND 
            ("rentalDate" + "rentalStartTime" + "rentalDurationInMinutes" > (?::date + ?::time)))
            AND NOT(
            ("rentalDate" + "rentalStartTime" > (?::date + ?::time)) AND 
            ("rentalDate" + "rentalStartTime" < (?::date + ?::time + ?::interval)))
            /* Não - começa depois, mas antes da outra terminar */
            )
            OR ("rentalEquipmentQuantity" IS NULL)
            )
            GROUP BY "equipmentID"
            ;');
        $stmt->execute(array($spaceID, $spaceID, $date, $startTime, $date, $startTime, $date, $startTime, $date, $startTime, $date, $startTime, $duration));
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

    function addIssue($rentalID, $subject, $category, $description, $to)
    {
        global $conn;
        $stmt = $conn->beginTransaction();
        $stmt = $conn->prepare('
                 INSERT INTO "Issue"("issueRentalID", "issueSubject", "issueCategory", "issueDescription")
                VALUES(?, ?, ?, ?)
                 RETURNING "issueID";');

        if($stmt->execute(array($rentalID, $subject, $category, $description))) {
            $issueID = $stmt->fetch()['issueID'];

            if ($to == "forManager") {
                $stmt = $conn->prepare('
                UPDATE "Issue"
                SET "issueForManager" = true, "issueForAdmin" = false
                WHERE "issueID" = ?;  ');
                if(!$stmt->execute(array($issueID))) {
                    $stmt = $conn->rollBack();
                    return false;
                }

            }
            if ($to == "forManager") {
                $stmt = $conn->prepare('
                UPDATE "Issue"
                SET "issueForAdmin" = true, "issueForManager" = false
                WHERE "issueID" = ?;  ');
                if(!$stmt->execute(array($issueID))) {
                    $stmt = $conn->rollBack();
                    return false;
                }
            }
            if( $to == "forBoth") {
                $stmt = $conn->prepare('
                UPDATE "Issue"
                SET "issueForAdmin" = true, "issueForManager" = true
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