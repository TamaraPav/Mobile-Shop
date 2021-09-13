<?php

session_start();
require_once "config.php";


try {
    $konekcija = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
    $konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo $ex->getMessage();
}


function zabeleziPristupStranici(){
    $open = fopen(STR_FAJL, "a");
	$url = basename($_SERVER['REQUEST_URI']);
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date("Y-m-d H:i:s");
    if($open){
        fwrite($open, "{$url}\t{$ip}\t{$date}\n");
        fclose($open);
    }
}

function zabeleziLogovanje(){
    $open = fopen(LOG_FAJL, "a");
	$user = $_SESSION['korisnik']->email;
	$date = date("Y-m-d H:i:s");
    if($open){
        fwrite($open, "{$user}\t{$date}\n");
        fclose($open);
    }
}