<?php
global $root;
include "$root/view/header.html.php";
include "$root/dal/bd.connexion.php";
include "$root/dal/bd.location.php";
include_once "$root/dal/bd.jeu.inc.php";
?>

    <h1>Tout les jeux</h1>

<?php

    addReservation();

    $jeux = getJeux();
    foreach ($jeux as $jeu) {
        print('<img src="public/images/jeu/'.$jeu["lienimage"].'" alt="description alt." width="100" height="50">');

        if ($jeu["disponibilite"] === 't'){
            ?>

                <form id="reserver-jeu-<?=$jeu['id']?>" action="" method="POST">
                    <span class="dispo">Disponible</span>
                    <button type="submit" name="<?php echo $jeu['id']?>" class="reservation"/>Réserver</button>
                </form>

            <?php

        }
        
        else {
            print('<span class="indispo">Indisponible</span>');
        }

        print('<p>'.$jeu["nom"]."</p><br>");
    }

?>

<style>
    .dispo {
        background-color: green;
        font-family: system-ui;
        padding: 5px;
        margin: 5px;
    }

    .indispo {
        background-color: red;
        font-family: system-ui;
        padding: 5px;
        margin: 5px;
    }
</style>

<?php include "$root/view/footer.html.php";
