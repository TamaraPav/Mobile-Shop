<?php 
    session_start();

    if(isset($_POST["productUpButton"])) {

        $errors = [];

        $id = $_POST["productId"];
        $name = $_POST["tbPrName"];
        $price = $_POST["tbPrPrice"];
        $top = $_POST["tbPrTop"];
        $available = $_POST["tbPrAvailable"];


        $reName = "/^[a-zA-Z0-9\s,.]{3,}$/";
        $rePrice = "/^[1-9][0-9]{1,}$/";
        $reCamera = "/^([0-9]{1,3}(\s\+\s)*)*$/";
        $reTop = "/^(1|0)$/";
        $reAvailable = "/^(1|0)$/";

        if(!preg_match($reName,$name)) {
            $errors[] = "First name is not valid!";
        }

        if(!preg_match($rePrice,$price)) {
            $errors[] = "Price is not valid!";
        }

        if(!preg_match($reCamera,$camera)) {
            $errors[] = "Camera is not valid!";
        }

        if(!preg_match($reTop,$top)) {
            $errors[] = "Top is not valid!";
        }

        if(!preg_match($reAvailable,$available)) {
            $errors[] = "Available is not valid!";
        }

        if(count($errors) > 0) {
            echo "<script>alert('Data is not valid')</script>";
        }

        else {

            require_once '../../../config/connection.php';

            if($konekcija){

                $upit = "UPDATE products SET name = :prName, price = :prPrice, camera = :prCamera, top = :prTop, naStanju = :prStanje where idProduct =".$id;

                $priprema = $konekcija->prepare($upit);
                $priprema->bindParam(":prName", $name);
                $priprema->bindParam(":prPrice", $price);
                $priprema->bindParam(":prCamera", $camera);
                $priprema->bindParam(":prTop", $top);
                $priprema->bindParam(":prStanje", $available);
                $rezultat = $priprema->execute();


                if($rezultat) {
                    header("Location: ../../../index.php?page=admin");                    
                }   
                else {
                    echo "<script>alert('Can't add to base')</script>";
                }
            }
            else {
                echo "<script>alert('No connection')</script>";
            }
        }
    }
?>
