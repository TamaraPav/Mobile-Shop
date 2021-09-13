<?php
    define("ABSOLUTE_PATH", $_SERVER["DOCUMENT_ROOT"]."/PHP1");   
    define("ENV_FAJL", ABSOLUTE_PATH."/config/.env");

    define("STR_FAJL", ABSOLUTE_PATH."/data/stranice.txt");
    define("LOG_FAJL", ABSOLUTE_PATH."/data/korisnici.txt");

    define("SERVER", env("SERVER"));
    define("DATABASE", env("DBNAME"));
    define("USERNAME", env("USERNAME"));
    define("PASSWORD", env("PASSWORD"));

    function env($marker){
        $niz = file(__DIR__ . "/.env");
        $trazenaVrednost = "";
    
        foreach($niz as $red){
            $red = trim($red);
    
            list($identifikator, $vrednost) = explode("=", $red);
    
            if($identifikator == $marker){
                $trazenaVrednost = $vrednost;
                break;
            }
        }
    
        return $trazenaVrednost;
    }  
