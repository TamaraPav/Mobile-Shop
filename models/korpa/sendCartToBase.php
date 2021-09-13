<?php
    require_once '../../config/connection.php';

    if(isset($_POST['write'])){
        $idUser = $_POST['idUser'];
        $idProduct = $_POST['idProduct'];
        $qty = $_POST['amount'];

        $upit = 'INSERT into shopping_details values(null, :idUser, :idP, :qty)';
 
        $priprema = $konekcija->prepare($upit);
        $priprema->bindParam(":idUser", $idUser);
        $priprema->bindParam(":idP", $idProduct);
        $priprema->bindParam(":qty", $qty);

        try{
            $rezultat = $priprema->execute();

            if($rezultat){
                $status = 201;
                $message = "Good job! Someone from the store will contact you soon to confirm your order!";
            }
            else{
                $status = 500;
                $message = "Error";
            }
        }
        catch(PDOException $ex){
            $message = "Base Error";
            $status = 409;
        }

        http_response_code($status);
        echo json_encode($message);
    }

    
?>