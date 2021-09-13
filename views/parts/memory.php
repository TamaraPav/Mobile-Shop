<?php 
    require_once 'config/connection.php';

    $upit = "SELECT * FROM `memory` ORDER BY size ASC";
    $rezultat = $konekcija->query($upit);

    if($rezultat) {
        $rez = $rezultat->fetchAll();
        //var_dump($rez);
        $ispis = "<ul>";
        foreach($rez as $red){
        $ispis .= "<li class='p-2'><a class='text-white filter' href='index.php?page=products&idMemory=".$red->idMemory."'>".$red->size."</a></li>";
        
        }
        $ispis .= "</ul>";
        echo $ispis;     
    }

?>