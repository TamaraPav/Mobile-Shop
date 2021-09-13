<?php

    if(isset($_SESSION['korisnik'])){
        if($_SESSION['korisnik']->idRole != 1){
            header("Location: index.php?page=403");
        }
        else{
            echo "<script>console.log('hello')</script>";
        }
    }
    else{
        header("Location: index.php?page=403");
}
zabeleziPristupStranici();
?>
<div class="container-fluid p-0 m-0 full" id="admin">
    <div class="row p-4 m-0">
        <div class="container-fluid mx-5">
            <ul class="list-group list-group-horizontal row">
                <li class="list-group-item list-group-item-light black-text col-md-2 col-sm-12"><a href="#" id="allUsers" data-id="1" class="admin-btn black-text" name="allUsers">Show All Users</a></li>
                <li class="list-group-item list-group-item-dark black-text col-md-3 col-sm-12"><a href="#" id="addUser" class="admin-btn black-text" name="addUser">Add User</a></li>
                <li class="list-group-item list-group-item-light black-text col-md-2 col-sm-12"><a href="#" id="allProducts" data-id="3" class="admin-btn black-text" name="allProducts">Show All Products</a></li>
                <li class="list-group-item list-group-item-dark black-text col-md-3 col-sm-12"><a href="#" id="addProd" data-id="4" class="admin-btn black-text" name="addProd">Add Product</a></li>   
                <li class="list-group-item list-group-item-light black-text col-md-2 col-sm-12"><a href="#" id="allPurchases" data-id="5" class="admin-btn black-text" name="allPurchases">Show All Purchases</a></li>         
            </ul>
        </div>
    </div>
    <div class="row p-0 m-0">
        <div class="container bg-light black-text mx-auto mb-3" id="izmena"></div>
    </div>
    <div class="row p-0 m-0">
        <div class="container bg-light black-text mx-auto mb-3" id="adminIspis"></div>
    </div>
    <div class="row p-0 m-0">
        <div class="container row bg-light black-text mx-auto mb-3" id="logovi">
            <div class="col-12 col-sm-6 mb-4">
                <h4>Pristup stranicama u poslednjih 24h</h4>
                    <p>&sim;</p>
            <?php 
                include "models/admin/logs/stranice24h.php";
            ?>
            </div>

            <div class="col-12 col-sm-6 mb-4">
                <h4>Ulogovani korisnici u poslednjih 24h</h4>
                <p>&sim;</p>
            <?php 
                include "models/admin/logs/korisnici24h.php";
            ?>
            </div>
        </div>

    </div>
</div>


