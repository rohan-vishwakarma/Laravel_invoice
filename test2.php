<?php

function getduplicates($array){


    $uniquearray = array();

    foreach ($array as $value) {
        if(!in_array($value, $uniquearray)){

            $uniquearray[] = $value;

        }
    }

    
   for($i =0; $i<count($uniquearray); $i++){

        $count = 0;

        for($j = 0; $j <count($array); $j++){

            if($array[$i] == $array[$j]){
                $count++;
            }
        }

        echo $array[$i]. " => ".$count; 
        echo "\n";

   }
}



$array = array(12,24,9,2,0,3,6,4,6,4, 6, 12,12,12,12);

echo getduplicates($array);

