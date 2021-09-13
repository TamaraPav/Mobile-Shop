<?php
zabeleziPristupStranici();
    if(isset($_SESSION['korisnik'])){
        echo "<script>console.log('hello')</script>";
    }
    else{
        header("Location: index.php");
}

?>

<div class="container-fluid p-5 m-0 black" id="user">
<?php 
                $ime = $_SESSION['korisnik'];
                //var_dump($ime);
                echo "<h2 class='p-1 text-center'>Hello ".$ime->firstName."</h2><br/>";
                echo "<h6 class='p-2 text-center'>Here you can see your past purchases</h6>";
            ?>
    <div class="container bg-light">
        <div class="row p-4">   
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-left" scope="col">Product</th>
                        <th class="text-left" scope="col">Qty</th>
                        <th class="text-left" scope="col">Price</th>
                    </tr>
                </thead>
            <tbody>
                <?php 
                    include "models/korpa/showPastPurchases.php";
                ?>     
            </tbody>
            </table>
        </div>
    </div>
</div>
