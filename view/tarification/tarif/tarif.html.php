<?php
global $root;
include "$root/dal/bd.tarif.inc.php";
include "$root/view/header.html.php"; ?>
    <div id="accroche">Tarifs des adhésions</div>

    <h2>adhésion individuelle :</h2>
    <ul>
        <?php
        $tarif = getTarif();
        $ind = $tarif[0]["individuelle"];
        echo "<li>".$ind."€/an</li>";
        echo "<li>tarif réduit : ".$ind - 10 ."€/an (étudiant.e, sans emploi, retraité.e...)</li>";
        ?>
    </ul>
    
    <h2>adhésion familiale :</h2>
    <ul>
        <?php
        $tarif = getTarif();
        $fam = $tarif[0]["familial"];
        echo "<li>".$fam."€/an s'il y a 2 salaires au sein du foyer</li>";
        echo "<li>".$fam - 10 ."€/an s'il y a 1 salaire au sein du foyer</li>";
        echo "<li>".$fam - 20 ."€/an s'il n'a a pas de salaire au sein du foyer<br><em>Une ashésion Famille prend en compte 2 adultes et les enfants du foyer</em></li>";
        ?>
    </ul>


    <h2>adhésion assistant.e maternel.le :</h2>
    <ul>
        <?php
        $tarif = getTarif();
        $ass_mat = $tarif[0]["assist_mater"];
        echo "<li>".$ass_mat."€/an<br><em>Cette adhésion permet à un.e assistant.e maternel.le de venir gratuitement, accompagné.e de enfants maximun</em></li>";
        ?>
    </ul>

    <h2>adhésion structure :</h2>

    <ul>
        <?php
        $tarif = getTarif();
        $struc = $tarif[0]["structure"];
        echo "<li>".$struc."€/an</li>";
        ?>
    </ul>
        

<?php include "$root/view/footer.html.php";