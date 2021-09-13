<?php
    require_once '../../../config/connection.php';

    if(isset($_POST['idProduct'])){

        $upit = "SELECT p.idProduct, p.name, p.price, p.camera, ram.size AS ram, i.src, i.srcMala, i.alt, m.size, b.name AS brName, os.name AS osName, p.top, p.naStanju
        FROM ((((products p INNER JOIN images i ON p.idSlika = i.idImage) INNER JOIN brand b ON p.idBrand = b.idBrand) INNER JOIN memory m ON p.idMemory = m.idMemory) INNER JOIN operaivesistem os ON p.idOs = os.idOs) INNER JOIN ram ON p.ram = ram.idRam";
        $rezultat = $konekcija->query($upit);
        $rez = $rezultat->fetchAll();

        $status = 200;
        header('Content-Type: application/json');
        echo json_encode($rez); 
    }
?>