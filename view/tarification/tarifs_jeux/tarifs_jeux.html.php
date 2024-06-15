<?php
global $root;
include "$root/dal/bd.tarif.inc.php";
include "$root/view/header.html.php"; ?>
    <div id="accroche">Tarif des jeux</div>
    
    <img src="./public/images/jeu/tarifs_jeux.png" alt="tarif des jeux"/>
    <style>
        img {
            width: 600px;
            height: 500px;
            position: relative;
            left: 150px;
        }
    </style>

<?php include "$root/view/footer.html.php";