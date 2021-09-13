<?php 
    require_once 'config/connection.php';

    $upit = "select * from operaivesistem";
    $rezultat = $konekcija->query($upit);

    if($rezultat) {
        $rez = $rezultat->fetchAll();
        //var_dump($rez);
        $ispis = "<ul>";
        foreach($rez as $red){
        $ispis .= "<li class='p-2'><a class='text-white filter' href='index.php?page=products&idOs=".$red->idOs."'>".$red->name."</a></li>";
        
        }
        $ispis .= "</ul>";
        echo $ispis;     
    }

?>