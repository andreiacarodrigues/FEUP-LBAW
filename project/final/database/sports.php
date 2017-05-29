<?php
    function getAllSports()
    {
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM "Sport"');
        $stmt->execute();
        return $stmt->fetchAll();
    }


    function getMunicipalitiesList()
    {
        $municipalityList = array(array(), array());
        $municipalityIDs = [];
        $municipalityNames = [];

        $stmt = getMunicipalities();
        while($row = $stmt->fetch())
        {
            $municipalityIDs[] = $row['municipalityID'];
            $municipalityNames[] = $row['municipalityName'];
        }

        $municipalityList[0] = $municipalityIDs;
        $municipalityList[1] = $municipalityNames;

        return $municipalityList;
    }

