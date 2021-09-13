<?php 
require_once 'config/connection.php';

$idKor = $_SESSION['korisnik']->idUser;
$upit = "SELECT p.name, p.price, amount FROM shopping_details s INNER JOIN products p on s.idProduct = p.idProduct WHERE s.idUser = ".$idKor;

$rezultat = $konekcija->query($upit);

foreach($rezultat as $red){
    $ispis = "<tr>";
    $ispis .= "<td>".$red->name."</td><td>".$red->amount."</td><td>".$red->price."$</td>";
    $ispis .= "</tr>";
    echo $ispis;
}
                    
                    
?>   