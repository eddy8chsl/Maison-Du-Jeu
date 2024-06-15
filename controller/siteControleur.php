<?php
/* Script du contrôleur principal du site */

global $root;
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $root="..";
}

// création du menu burger spécifique au contrôleur
$burgerMenu = array();
$burgerMenu[] = Array("url"=>"./index.php?object=site&action=presentation","label"=>"Présentation");
$burgerMenu[] = Array("url"=>"./index.php?object=site&action=item1","label"=>"Item1");

// recuperation de l'action définie dans l'URL
if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else {
    $action = "presentation";
}

// Gestion des différentes fonctionalités du contrôleur du site
switch($action) {
    case 'presentation':
        // appel des fonctions permettant de récupérer les données utiles à l'affichage
        // affichage de la vue
        include "$root/view/site/sitePresentation.html.php";
        break;

    case 'item1':
        // appel des fonctions permettant de récupérer les données utiles à l'affichage
        // affichage de la vue
        include "$root/view/site/pageEnCoursConstruction.html.php";
        break;

    default:
        include "$root/view/error/400.html.php";
}
