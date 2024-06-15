<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="fr">
<head>
    <?php $title = " Welcome to Hackat'Web"; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title><?php echo $title ?></title>
    <style type="text/css">
        @import url("public/css/base.css");
        @import url("public/css/corps.css");
    </style>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="public/images/favicon.ico">
</head>
<body>
    <nav>
        <ul id="menuGeneral">
            <li><a href="./index.php?object=site&action=presentation">Accueil</a></li>
            <li><a href="./index.php?object=jeu&action=all">Catalogue de jeux</a></li>
            <li><a href="./index.php?object=tarification&action=tarif">Tarifs adhésion</a></li>
            <li><a href="./index.php?object=tarifsjeux&action=tarifsjeux">Tarifs jeux</a></li>
            <li><a href="./index.php?object=information&action=info">Information</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="./index.php?object=authentification&action=deconnexion">Deconnexion</a></li>
                <li><a href="./index.php?object=authentification&action=profil">Profil</a></li>
            <?php else: ?>
                <li><a href="./index.php?object=authentification&action=connexion">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div id="bouton">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <ul id="menuContextuel">
        <li><img src="public/images/menu.png" alt="logo" /></li>
        <?php if (isset($burgerMenu)) { ?>
            <?php for ($i = 0; $i < count($burgerMenu); $i++) { ?>
                <li>
                    <a href="<?php echo $burgerMenu[$i]['url']; ?>">
                        <?php echo $burgerMenu[$i]['label']; ?>
                    </a>
                </li>
        <?php } ?>
    <?php } ?>
    </ul>
    <div id="corps">
    