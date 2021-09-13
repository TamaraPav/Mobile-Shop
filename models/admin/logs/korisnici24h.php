<?php


$open = fopen(LOG_FAJL, "r");
if($open) {
    $podaci = file(LOG_FAJL);
    fclose($open);
    $k = count($podaci);
    $korLast24h = [];
    for($i = 0; $i < $k; $i++) {

        $red = explode("\t", $podaci[$i]);
        $t = $red[1];
        $pre24h = time() - DANSEKUNDE;
        $utT = strtotime($t);

        if($utT >= $pre24h) {
            $korLast24h[] = $red[0];
        }
    }

    $x = count($korLast24h);
    $korLast24hDistinct = [];

    for($i = 0; $i < $x; $i++) {

        if(!in_array($korLast24h[$i], $korLast24hDistinct )) {
            $korLast24hDistinct[] = $korLast24h[$i];
        }

    }   

    

    foreach($korLast24hDistinct as $a){
        echo "<p>";
        echo $a;
        echo "</p>";
    }
    
    echo "Ukupan broj ulogovanih korisnika u prethodnih 24h: ". count($korLast24hDistinct); 
    
}



