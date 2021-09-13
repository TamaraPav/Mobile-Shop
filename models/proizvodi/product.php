<?php

    $upit = "SELECT p.idProduct, p.name, p.price, p.camera, ram.size AS ram, i.src, i.alt, m.size, b.name AS brName, os.name AS osName
    FROM ((((products p INNER JOIN images i ON p.idSlika = i.idImage) INNER JOIN brand b ON p.idBrand = b.idBrand) INNER JOIN memory m ON p.idMemory = m.idMemory) INNER JOIN operaivesistem os ON p.idOs = os.idOs) INNER JOIN ram ON p.ram = ram.idRam WHERE p.naStanju = 1 ";

    if(isset($_GET['idBrend'])) {
        $id = $_GET['idBrend'];

        $upit .= " AND b.idBrand =".$id;
    }
    if(isset($_GET['idOs'])) {
        $id = $_GET['idOs'];

        $upit .= " AND os.idOs =".$id;
    }
    if(isset($_GET['idMemory'])) {
        $id = $_GET['idMemory'];

        $upit .= " AND m.idMemory =".$id;
    }

        require_once 'config/connection.php';

        $rezultat = $konekcija->query($upit);

        $ispis = "";
        foreach($rezultat as $red){
            $ispis .= "<div class='col-lg-3 col-md-6 col-sm-12 p-2'>
            <img class='card-img-top mb-3 mt-2' src='".$red->src."' alt='".$red->alt."'/>
            <p class='text-center'>".$red->brName."</p>
            <p class='text-center'>".$red->name."</p>               
            <p class='text-center'>".$red->price."$</p>
            <p class='text-center'>
                <a class='btn btn-dark m-1' data-toggle='collapse' href='#collapse".$red->idProduct."' role='button' aria-expanded='false' aria-controls='collapse".$red->idProduct."'>Specification</a>";
            if (!isset($_SESSION['korisnik'])){
                $ispis .= "<a class='btn btn-dark m-1' role='button' href='index.php?page=login'>Buy</a>";
            } else {
                $ispis .= "<a class='btn btn-dark storage m-1' data-id='".$red->idProduct."' role='button' href='#'>Buy</a>"; 
            }
        $ispis .="</p>
            <div class='collapse' id='collapse".$red->idProduct."'>
                    <p class='text-center p-0'>OS: ".$red->osName."</p>
                    <p class='text-center p-0'>Camera: ".$red->camera." MP</p>
                    <p class='text-center p-0'>Memory: ".$red->size." GB</p>
                    <p class='text-center p-0'>Ram: ".$red->ram." GB</p>
            </div>
            </div>";
        }
        echo $ispis;

?>