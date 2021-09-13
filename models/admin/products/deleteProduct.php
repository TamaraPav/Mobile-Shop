<?php
    require_once '../../../config/connection.php';

    $id = $_POST['idProduct'];
    $upit = "DELETE FROM products WHERE idProduct =".$id;
    $rezultat = $konekcija->query($upit);

    if($rezultat){
        header("Location: ../../../index.php?page=admin");
    }
    else{
        echo "Error!";
    }
?>