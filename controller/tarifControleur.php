<?php 

global $root;
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $root="..";
}

// recuperation de l'action définie dans l'URL
if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else {
    $action = "tarif";
}

switch($action) {
    case 'tarif':
        include "$root/view/tarification/tarif/tarif.html.php";
        break;
    }
