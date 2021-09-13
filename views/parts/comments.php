<?php 
    require_once 'config/connection.php';

    $upit = "select * from comments";
    $rezultat = $konekcija->query($upit);

    if($rezultat) {
        $rez = $rezultat->fetchAll();
        //var_dump($rez);
        $ispis = "";
            foreach($rez as $red){
            $ispis .="<div class='col-sm-12 col-md-6 col-lg-3 card-panel bg-dark'>                      
            <p class='text-left p-2'>".$red->Text."</p>
            <p class='text-right p-2'>".$red->Name."</p>
            </div>";
        }
        echo $ispis;     
    }
?>