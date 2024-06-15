<?php
include_once "bd.inc.php";

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $root="..";
}

function getJeux() : array {

    $cnx = connexionBDD();
    $req = pg_query($cnx, "SELECT * FROM jeu");

    $resultat = pg_fetch_all($req);

    return $resultat;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getJeux() : \n";
    print_r(getJeux());
    
}