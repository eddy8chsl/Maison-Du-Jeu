<?php
/* Script du contrôleur responsable de la gestion des jeux */

global $root;
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $root="..";
}

require_once("$root/dal/bd.jeu.inc.php");
require_once("$root/dal/bd.categorie.inc.php");

$lacategorie = getCategorie();
$burgerMenu = array();
$verif = array();
$burgerMenu[] = Array("url"=>"./index.php?object=jeu&action=all","label"=>"Les Jeux");

foreach ($lacategorie as $categorie) {
    if (!in_array($categorie['type_de_catégorie'], $verif)) {
        $burgerMenu[] = array("url"=> "./index.php?object=jeu&action=".$categorie['type_de_catégorie'], "label"=>$categorie['type_de_catégorie']);
        $verif[] = $categorie['type_de_catégorie'];
    }
}


// Récupération de l'action définie dans l'URL
if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else {
    $action = "all";
}

// Gestion des différentes fonctionalités du contrôleur des jeux
switch($action) {
    case 'all':
        include "$root/view/jeu/allJeu.html.php";
        break;

    case 'Jeu de stratégie':
        $jeux = getJeux();
        include "$root/view/jeu/jeuDeStrategie.html.php";
        break;
    
    case "Jeu de société traditionnel":
        $jeux = getJeux();
        include "$root/view/jeu/jeuDeSocieteTraditionnel.html.php";
        break;
    
    case "Jeu coopératif":
        $jeux = getJeux();
        include "$root/view/jeu/jeuCooperatif.html.php";
        break;

    case "Jeu de plateau familial":
        $jeux = getJeux();
        include "$root/view/jeu/jeuDePlateauFamilial.html.php";
        break;
    
    case "Jeu de déduction et de bluff":
        $jeux = getJeux();
        include "$root/view/jeu/jeuDeductionEtBluff.html.php";
        break;

    case "Jeu de rapidité et de réflexes":
        $jeux = getJeux();
        include "$root/view/jeu/jeuRapiditeEtReflexes.html.php";
        break;

    case "Jeu de dés":
        $jeux = getJeux();
        include "$root/view/jeu/jeuDeDes.html.php";
        break;

    case "Jeu de cartes":
        $jeux = getJeux();
        include "$root/view/jeu/jeuDeCartes.html.php";
        break;
        
    default:
        include "$root/view/error/400.html.php";
}
