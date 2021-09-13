<?php
    require_once '../../../config/connection.php';

    $id = $_POST['idUser'];
    $upit = "DELETE FROM users WHERE idUser =".$id;
    $rezultat = $konekcija->query($upit);

    if($rezultat){
        header("Location: ../../../index.php?page=admin");
    }
    else{
        echo "Can't delete user that has purchased an item!";
    }
?>