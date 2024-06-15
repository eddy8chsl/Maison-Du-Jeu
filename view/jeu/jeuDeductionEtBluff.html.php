<?php
global $root, $jeux;
include "$root/view/header.html.php"; ?>


    <h1>
        Les Jeux de Déduction et de Bluff
    </h1>

<?php
    foreach ($jeux as $jeu) {
        if ($jeu["idcatégorie"] == 5) {
            print('<img src="public/images/jeu/'.$jeu["lienimage"].'" alt="description alt." width="100" height="50">');
            if ($jeu["disponibilite"] == True) {
                print('<span id="dispo">Disponible</span>');
            } else {
                print('<span id="indispo">Indisponible</span>');
            }
            print('<p>'.$jeu["nom"]."</p><br>");
        }
    }
?>

<style>
    #dispo {
        background-color: green;
        font-family: system-ui;
        padding: 5px;
        margin: 5px;
    }

    #indispo {
        background-color: red;
        font-family: system-ui;
        padding: 5px;
        margin: 5px;
    }
</style>

<?php include "$root/view/footer.html.php";