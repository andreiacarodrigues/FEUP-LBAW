<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");
include_once($BASE_DIR . "database/info.php");

       $name = $_GET['name'];
       $municipality = $_GET['municipality'];
       $sport = $_GET['sport'];
       $date = $_GET['date'];
       $startingTime = $_GET['startingTime'];
       $duration = $_GET['duration'];
       $surface = $_GET['surface'];
       $coverage = $_GET['coverage'];

       if($name == '')
           $name = null;
        if($municipality == '')
         $municipality = null;
         if($sport == '')
          $sport = null;
        if($date == '')
            $date = null;
        if($startingTime == '')
            $startingTime = null;
        if($duration == '')
            $duration = null;
        if($surface == '')
            $surface = null;

        if($coverage == 'null')
        {
            $coverage = null;
        }

       // validações php


        $complexes = getSearchComplexes($name, $municipality, $sport, $date, $startingTime, $duration, $surface, $coverage);


        $complexesWithRating = array();

        foreach($complexes as $complex) {
            $rating = getComplexRating($complex['complexID']);
            $complex['rating'] = $rating;
            array_push($complexesWithRating, $complex);
        }

        echo json_encode($complexesWithRating);






