<?php
include_once "bd.inc.php";

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $root="..";
}

function getHoraire() : array {

    $cnx = connexionBDD();
    $req = pg_query($cnx, "SELECT * FROM horaire");

    $resultat = pg_fetch_all($req);

    return $resultat;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getHoraire() : \n";
    print_r(getHoraire());
    
}