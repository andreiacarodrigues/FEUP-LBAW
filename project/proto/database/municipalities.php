<?php
    function getMunicipalities()
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "municipalityID","municipalityName" FROM "Municipality";');
        $stmt->execute();

        return $stmt;
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

