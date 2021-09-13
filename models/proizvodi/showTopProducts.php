<?php 
    require_once 'config/connection.php';

    $top = "1";
    $naStanju = "1";
    
    $upit = "SELECT products.name, products.price, images.src, images.alt, brand.name as brName FROM ((products INNER JOIN images ON products.idSlika = images.idImage) INNER JOIN brand ON products.idBrand = brand.idBrand) WHERE top = :top AND products.naStanju = :naStanju";

    $priprema = $konekcija->prepare($upit);
    $priprema->bindParam(":top", $top);
    $priprema->bindParam(":naStanju", $naStanju);
    $rezultat = $priprema->execute();
    
    $rez = $priprema->fetchAll();

    $rows = $priprema->rowCount();

    $productsPerPage = 4;

    $numberOfPages = ceil($rows/$productsPerPage);

    if(!isset($_GET["pg"])){
        $page = 1;
    }
    else{
        $page = $_GET['pg'];
    }

    $ispisNaStranici = ($page - 1)* $productsPerPage;

    $upit2 = "SELECT products.idProduct, products.name, products.price, images.src, images.alt, brand.name as brName FROM ((products INNER JOIN images ON products.idSlika = images.idImage) INNER JOIN brand ON products.idBrand = brand.idBrand) WHERE top = 1 AND products.naStanju = 1 limit ".$ispisNaStranici.",".$productsPerPage."";

    $rezultat2=$konekcija->query($upit2);
    $rez2 = $rezultat2->fetchAll();

    $ispis = "<div class='row pt-2 m-0' id='topProduct'>";
        foreach($rez2 as $red){
            $ispis .= "<div class='col-sm-12 col-md-6 col-lg-3'>
            <div class='text-center card black grow'>
                <a href='products.php?idProduct=".$red->idProduct."'><img src='".$red->src."' alt='".$red->alt."' class='card-img-top mb-3 mt-2'/></a>
                <p class='text-white'>".$red->brName." ".$red->name." ".$red->price."$</p>
            </div>
        </div>";
        
        }
    $ispis .="</div>";
    echo $ispis;
    echo "<p class='text-center'>";
    for ($page=1; $page <= $numberOfPages; $page++) {
            echo "<a class='text-white text-center p-2' href='index.php?pg=".$page."'>".$page."</a>";
        }
    echo "</p>";
?>