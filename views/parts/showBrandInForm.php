<?php 
    require_once 'config/connection.php';

    $upit = "select * from brand";
    $rezultat = $konekcija->query($upit);

    if($rezultat) {
        $rez = $rezultat->fetchAll();
        //var_dump($rez);
        $ispis = "<select id='fBrend' name='fBrend' class='custom-select custom-select-sm mt-3'><option value='0'>Choose</option>";
            foreach($rez as $red){
            $ispis .= "<option value=".$red->idBrand.">".$red->name."</option>";
        
        }
        $ispis .= "</select>";
        echo $ispis;     
    }
?>