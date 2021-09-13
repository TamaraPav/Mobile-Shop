<?php 
    require_once 'config/connection.php';

    $upit = "select * from crew";
    $rezultat = $konekcija->query($upit);

    if($rezultat) {
        $rez = $rezultat->fetchAll();
        //var_dump($rez);
        $ispis = "";
        foreach($rez as $red){
            if($red->Name == "Tamara") {
                $ispis .= "<li class='list-inline-item p-2'><p class='text-center'><a class='white-text' href='index.php?page=autor'>".$red->Name."</a></p><img class='rounded-circle' src='".$red->image."'/></li>";
            }
            else {
                $ispis .= "<li class='list-inline-item p-2'><p class='text-center'>".$red->Name."</p><img class='rounded-circle' src='".$red->image."'/></li>";
            }
        }
        echo $ispis;     
    }
?>