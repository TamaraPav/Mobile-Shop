<?php 

    if(isset($_POST["userButton"])) {
        $errors = [];

        $firstName = $_POST["tbFirstName"];
        $lastName = $_POST["tbLastName"];
        $email = $_POST["tbEmailC"];
        $address = $_POST["tbAdresaC"];
        $pass = md5($_POST["tbPass"]);
        $role = $_POST["tbRole"];


        $reName = "/^[A-Z][a-z]{2,20}$/";
        $reAddress = "/^[a-zA-Z0-9\s,.]{3,}$/";
        $reEmail = "/^([a-z0-9]+\.*)+@(gmail|hotmail|yahoo|ict\.edu)\.(com|rs)$/";

        if(!preg_match($reName,$firstName)) {
            $errors[] = "First name is not valid!";
        }

        if(!preg_match($reName,$lastName)) {
            $errors[] = "Last name is not valid!";
        }

        if(!preg_match($reAddress,$address)) {
            $errors[] = "Address is not valid!";
        }

        if(!preg_match($reEmail,$email)) {
            $errors[] = "Email is not valid!";
        }

        if(count($errors) > 0) {
            echo "<script>alert('Data is not valid')</script>";
        }

        else {

            require_once '../../../config/connection.php';

            if($konekcija){

                $upit = "INSERT into users values(null, :firstName, :lastName, :email,
                :pass, :adresa, :idRole)";

                $priprema = $konekcija->prepare($upit);
                $priprema->bindParam(":firstName", $firstName);
                $priprema->bindParam(":lastName", $lastName);
                $priprema->bindParam(":email", $email);
                $priprema->bindParam(":pass", $pass);
                $priprema->bindParam(":adresa", $address);
                $priprema->bindParam(":idRole", $role);
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
