<?php 
   

    if(isset($_POST["productButton"])) {
        $errors = [];

        $name = $_POST["tbPrName"];
        $price = $_POST["tbPrPrice"];
        $camera = $_POST["tbPrCamera"];
        $ram = $_POST["tbPrRam"];
        $memory = $_POST["tbPrMemory"];
        $os = $_POST["tbPrOs"];
        $brand = $_POST["tbPrBrand"];
        $top = $_POST["tbPrTop"];
        $available = $_POST["tbPrAvailable"];

        $naziv = $_FILES['tbPrImage']['name'];
        $tmp = $_FILES['tbPrImage']['tmp_name'];
        $tip = $_FILES['tbPrImage']['type'];
        $size = $_FILES['tbPrImage']['size'];

        $tipoviSlika = ['image/jpg', 'image/jpeg', 'image/png'];
        
        
        $reName = "/^[A-Za-z0-9]{2,25}$/";
        $rePrice = "/^[1-9][0-9]{1,}$/";
        $reCamera = "/^([0-9]{1,3}(\s\+\s)*)*$/";
        $reRam = "/^(1|2|4|8)$/";
        $reMemory = "/^(1|2|3|4)$/";
        $reOs = "/^(1|2)$/";
        $reBrand = "/^(1|2|3|4|5)$/";
        $reTop = "/^(1|0)$/";
        $reAvailable = "/^(1|0)$/";

        define("MAX_SIZE", 3000000);   

        if(!preg_match($reName,$name)) {
            $errors[] = "First name is not valid!";
        }

        if(!preg_match($rePrice,$price)) {
            $errors[] = "Price is not valid!";
        }

        if(!preg_match($reCamera,$camera)) {
            $errors[] = "Camera is not valid!";
        }

        if(!preg_match($reRam,$ram)) {
            $errors[] = "Ram is not valid!";
        }

        if(!preg_match($reMemory,$memory)) {
            $errors[] = "Memory is not valid!";
        }

        if(!preg_match($reOs,$os)) {
            $errors[] = "Os is not valid!";
        }

        if(!preg_match($reBrand,$brand)) {
            $errors[] = "Brand is not valid!";
        }

        if(!preg_match($reTop,$top)) {
            $errors[] = "Top is not valid!";
        }

        if(!preg_match($reAvailable,$available)) {
            $errors[] = "Available is not valid!";
        }

        

        if(!in_array($tip, $tipoviSlika)){
            $errors[] = "Image is not in valid format.";
        }
        if($size > MAX_SIZE){
            $errors[] = "Image is too big.";
        }
        if(count($errors) > 0) {
            foreach($errors as $e){
                echo $e;
            }
        }

        else {
            require_once '../../../config/connection.php';
            list($sirina,$visina) = getimagesize($tmp);
            $postojeca = null;

            switch($tip) {
                case 'image/jpeg' :
                $postojeca = imagecreatefromjpeg($tmp);
                break;
                case 'image/png' :
                $postojeca = imagecreatefrompng($tmp);
                break;
            }

            $novaSirina = 200;
            $novaVisina = ($novaSirina/$sirina) * $visina;

            $novaSlika = imagecreatetruecolor($novaSirina, $novaVisina);

            imagecopyresampled($novaSlika, $postojeca, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);

            $ime = time().$naziv;
            $putanjaNS = 'assets/images/phones/mala_'.$ime;

            switch($tip) {
                case 'image/jpeg' :
                imagejpeg($novaSlika,'../../../'.$putanjaNS, 75);
                break;
                case 'image/png' :
                imagepng($novaSlika,'../../../'.$putanjaNS);
                break;
            }
            $putanjaOS = 'assets/images/phones/'.$ime;

            if(move_uploaded_file($tmp,'../../../'.$putanjaOS)){
                echo 'Slika je uploadovana na server!';
            
                try {
                    $insert = $konekcija->prepare('INSERT INTO images VALUES("", ?, ?, ?)');
                    $isInserted = $insert->execute([$putanjaOS, substr($ime,0,-4), $putanjaNS]);

                    if($isInserted){
                        echo "Putanja upisana u bazu";
                        $lastId = $konekcija->lastInsertId();

                    $upit = "INSERT into products values(null, :pName, :pPrice, :pCam,
                    :pRam, :pMemory, :pOs, :pBrand, :pSlika, :pTop, :pStanje)";

                    $priprema = $konekcija->prepare($upit);
                    $priprema->bindParam(":pName", $name);
                    $priprema->bindParam(":pPrice", $price);
                    $priprema->bindParam(":pCam", $camera);
                    $priprema->bindParam(":pRam", $ram);
                    $priprema->bindParam(":pMemory", $memory);
                    $priprema->bindParam(":pOs", $os);
                    $priprema->bindParam(":pBrand", $brand);
                    $priprema->bindParam(":pSlika", $lastId);
                    $priprema->bindParam(":pTop", $top);
                    $priprema->bindParam(":pStanje", $available);
                    $rezultat = $priprema->execute();

                    if($rezultat) {
                        header("Location: ../../../index.php?page=admin");
                    }
                    else {
                        echo "<script>alert('Can't add to base')</script>";
                    }

                    }
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }
            }

            imagedestroy($postojeca);
            imagedestroy($novaSlika);
        }
    }
?>
