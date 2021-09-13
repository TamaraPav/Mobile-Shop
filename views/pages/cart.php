<?php
    if(!isset($_SESSION['korisnik'])){
        header("Location: index.php?page=login");
    }
    zabeleziPristupStranici();
?>

<div class="container-fluid pt-5 m-0 black" id="cart">
    <div class="container bg-light">
        <div class="row">
            <table class="table table-striped" id="tabelaKorpa">
                <thead>
                    <tr>
                        <th class="text-left" scope="col">#</th>
                        <th class="text-left" scope="col">Product</th>
                        <th class="text-left" scope="col">Price</th>
                        <th class="text-left" scope="col">Qty</th>
                        <th class="text-left" scope="col">Total</th>
                        <th class="text-left" scope="col">Remove</th>
                    </tr>
                </thead>
            <tbody id="itemsInCart">
                          
            </tbody>
            </table>
            <div class="ml-auto">
                <button id="sendToBase" class="btn bg-dark text-light m-3" value="Buy">Buy</button>
            </div>
        </div>
    </div>
</div>

