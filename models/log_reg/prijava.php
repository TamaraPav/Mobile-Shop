<?php 
    session_start();

    if(isset($_POST["logButton"])) {
        $errors = [];

        $email = $_POST["tbEmail"];
        $pass = md5($_POST["tbPass"]);

        $reEmail = "/^([a-z0-9]+\.*)+@(gmail|hotmail|yahoo|ict\.edu)\.(com|rs)$/";

        if(!preg_match($reEmail,$email)) {
            $errors[] = "Email is not valid!";
        }

        if(count($errors) > 0) {
            echo "<script>alert('Data is not valid')</script>";
        }

        else {

            require_once '../../config/connection.php';

            if($konekcija){

                $upit = "SELECT * FROM users WHERE email = :email AND password = :pass";

                $priprema = $konekcija->prepare($upit);
                $priprema->bindParam(":email", $email);
                $priprema->bindParam(":pass", $pass);
                $rezultat = $priprema->execute();

                if($rezultat) {
                    if($priprema->rowCount() == 1){
                        $rez = $priprema->fetch();
                        $_SESSION['korisnik'] = $rez;
                        zabeleziLogovanje();
                        if($_SESSION['korisnik']->idRole == 1){
                            header("Location: ../../index.php?page=admin");
                        }
                        else{
                            header("Location: ../../index.php");
                        }
                    }
                }
                else {
                    echo "Error";
                }
            }
            else {
                echo "No connection";
            }
        }
    }
?>
