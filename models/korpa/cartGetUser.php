<?php
        session_start();
        if(isset($_POST['zahtev'])){
        
        $korisnik = $_SESSION['korisnik'];
        $status = 200;

        header('Content-Type: application/json');
        echo json_encode($korisnik);
    }
?>