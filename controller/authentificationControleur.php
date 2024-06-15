<?php 

global $root;
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $root="..";
}

// création du menu burger spécifique au contrôleur
$burgerMenu = array();
$burgerMenu[] = Array("url"=>"./index.php?object=authentification&action=presentation","label"=>"Présentation");
$burgerMenu[] = Array("url"=>"./index.php?object=authentification&action=item1","label"=>"Item1");
$burgerMenu[] = Array("url"=>"./index.php?object=authentification&action=connexion","label"=>"Connexion");

// recuperation de l'action définie dans l'URL
if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else {
    $action = "connexion";
}

switch($action) {
    case 'connexion':
        // appel des fonctions permettant de récupérer les données utiles à l'affichage
        // affichage de la vue
        include "$root/view/authentificator/authentification.html.php";
        break;
    
    case 'inscription':
        // appel des fonctions permettant de récupérer les données utiles à l'affichage
        // affichage de la vue
        include "$root/view/authentificator/inscription.html.php";
        break;
    
    case 'profil':
        include "$root/view/authentificator/profil.html.php";
        break;
    
    case 'deconnexion':
        include "$root/view/authentificator/deconnexion.html.php";
        break;
    }



