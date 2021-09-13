<?php
    require_once '../../config/connection.php';

    if(isset($_POST['idPurchase'])){

        $upit = "SELECT u.firstName, u.lastName, p.name, s.amount, b.name as brName FROM ((shopping_details s inner join users u on s.idUser = u.idUser) inner join products p on s.idProduct = p.idProduct) inner join brand b on p.idBrand = b.idBrand";
        $rezultat = $konekcija->query($upit);
        $rez = $rezultat->fetchAll();

        $status = 200;
        header('Content-Type: application/json');
        echo json_encode($rez); 
    }
?>