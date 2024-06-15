<?php
global $root;
include "$root/dal/bd.horaire.inc.php";
include "$root/dal/bd.information.inc.php";
include "$root/view/header.html.php"; ?>
    <div id="accroche">Information de la MaisonDuJeu'Web</div>
    
    <h2>Plan d'accès</h2>
    <img class="plan" src="public/images/plan.png" alt="plan d'accès de la maison du jeu" />

    <style>
        .plan {
            width: 600px;
            height: 500px;
            position: relative;
            left: 100px;
        }
    </style>


    <h2>Horaire</h2>
    <ul>
        <?php
        $horaires = getHoraire();
        foreach ($horaires as $horaire) {
            echo "<li>".$horaire["jour"]." : ".$horaire["horaire"]."</li>";
        }
        ?>
    </ul>

    <h2>Information Pratiques</h2>
    <?php
    $info = getInformation();
    echo "<p>Adresse: ".$info[0]["adresse"]."</p>";
    echo "<p>Contact: ".$info[0]["email"]." / ".$info[0]["numero"]."</p>";
    ?>

<?php include "$root/view/footer.html.php";
