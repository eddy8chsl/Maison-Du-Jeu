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
    $action = "tarifsjeux";
}

switch($action) {
    case 'tarifsjeux':
        include "$root/view/tarification/tarifs_jeux/tarifs_jeux.html.php";
        break;
    }