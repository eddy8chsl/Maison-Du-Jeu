<?php

global $root;
include "getRoot.php";

// Liste des fichiers controleurs responsables de la gestion des URLS

$objects = array();
$objects["default"] = "siteControleur.php"; // définition d'un controleur par défaut
$objects["site"] = "siteControleur.php";
$objects["jeu"] = "jeuControleur.php";
$objects["authentification"] = "authentificationControleur.php";
$objects["information"] = "informationControleur.php";
$objects["tarification"] = "tarifControleur.php";
$objects["tarifsjeux"] = "tarifJeuxControleur.php";

// Analyse de l'URL : identificaiton du contrôleur
if (isset($_GET["object"]) and array_key_exists($_GET["object"] , $objects )){
    $controller = $objects[$_GET["object"]];
}
else{
    $controller = $objects["default"];
}

// Appel du contrôleur
include "$root/controller/$controller";