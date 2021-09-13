<?php
    require_once '../../../config/connection.php';

    if(isset($_POST['id'])){

        $upit = "SELECT * FROM users";
        $rezultat = $konekcija->query($upit);
        $rez = $rezultat->fetchAll();

        $status = 200;
        header('Content-Type: application/json');
        echo json_encode($rez); 
    }
?>