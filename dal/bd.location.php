<?php
function addReservation()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $jeux = getJeux();
        foreach ($jeux as $jeu) {

            if (array_keys($_POST)[0] == $jeu['id']) {

                if (isset($_SESSION['user_id']) && $jeu["disponibilite"]) {

                    $numJeuRecup = $jeu['id'];

                    $conn = connexionBDD();
                    $request = 'update-stock-' . $numJeuRecup;
                    $changeStatusRequest = "UPDATE jeu SET disponibilite = false WHERE id = $1";
                    echo $changeStatusRequest;

                    pg_prepare($conn, $request, $changeStatusRequest);
                    pg_execute($conn, $request, array($numJeuRecup));

                    $changeProfilRequest = "INSERT INTO louer (idjeu, idloueur, datedeb, datefin) VALUES ($1, $2, CURRENT_DATE, CURRENT_DATE + INTERVAL '7 day')";
                    $result = pg_query_params($conn, $changeProfilRequest, array($numJeuRecup, $_SESSION['user_id']));

                    if ($result) {
                        echo 'Location réussi';
                    } else {
                        echo 'Échec de la location';
                    }

                    header('Location: ./index.php?object=jeu&action=all');
                } else {
                    echo 'Vous devez être connecté pour pouvoir réserver';
                }
            }
        }
    }
}

function getEmprunts(): array
{

    $conn = connexionBDD();
    $req = pg_query($conn, "SELECT j.nom, j.nbpoints, j.lienimage FROM jeu j join louer l on j.id = l.idjeu join utilisateurs u on l.idloueur = u.id WHERE u.id = {$_SESSION['user_id']}");

    
    return pg_fetch_all($req);

}

function removeEmprunt($nomJeu) {
    $conn = connexionBDD();
    $recupJeu = pg_query($conn, "SELECT idjeu FROM louer l join jeu j on l.idjeu = j.id WHERE j.nom = {$nomJeu}");
    $row = pg_fetch_assoc($recupJeu);
    if (!$row) {
        echo "Jeu non trouvé.";
        return;
    }

    $idJeu = $row['id'];
    $query = "DELETE FROM louer WHERE idjeu = $1 AND idloueur = $2";
    $result = pg_query_params($conn, $query, array($idJeu, $_SESSION['user_id']));
    if (!$result) {
        echo "Echec du rendu.";
    } else {
        $query = "UPDATE jeu SET dispo = 't' WHERE id = $1";
        $res = pg_query_params($conn, $query, array($idJeu));
    }

    if ($res) {
        echo "Jeu rendu et disponibilité mise à jour.";
    } else {
        echo "Erreur lors de la mise à jour de la disponibilité.";
    }
}
