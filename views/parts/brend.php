<?php 
    require_once 'config/connection.php';

    $upit = "select * from brand";
    $rezultat = $konekcija->query($upit);

    if($rezultat) {
        $rez = $rezultat->fetchAll();
        //var_dump($rez);
        $ispis = "";
        foreach($rez as $red){
        $ispis .= "<li class='p-2'><a class='text-white filter' href='index.php?page=products&idBrend=".$red->idBrand."'>".$red->name."</a></li>";
        
        }
        $ispis .= "";
        echo $ispis;     
    }

?>