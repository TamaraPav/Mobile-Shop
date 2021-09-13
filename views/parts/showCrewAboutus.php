<?php 
    require_once 'config/connection.php';

    $upit = "select * from crew";
    $rezultat = $konekcija->query($upit);

    if($rezultat) {
        $rez = $rezultat->fetchAll();
        //var_dump($rez);
        $ispis = "";
            foreach($rez as $red){
            $ispis .="<div class='col-sm-12 col-md-6 col-lg-4'>
            <h4 class='text-center'>".$red->Name."</h4>
            <img class='rounded-circle' src='".$red->image."'/>
            <p class='p-4'>".$red->Text."</p>
        </div>";
        }
        echo $ispis;     
    }
?>