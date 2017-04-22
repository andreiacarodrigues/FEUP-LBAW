<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/municipalities.php");

    $municipalityIDs = [];
    $municipalityNames = [];

    $stmt = getMunicipalities();
    while($row = $stmt->fetch())
    {
        $municipalityIDs[] = $row['municipalityID'];
        $municipalityNames[] = $row['municipalityName'];
    }

    $smarty->assign('municipalityIDs',$municipalityIDs);
    $smarty->assign('municipalityNames',$municipalityNames);

    $smarty->display('pages/managers/addComplex.tpl');
?>