<?php
include_once "bd.inc.php";

function postUtilisateur($prenom, $nom, $email, $mdp){
    $conn = connexionBDD();

    $requestUser = "verif-doublon";
    $recupUser = pg_prepare($conn, $requestUser, "SELECT * FROM utilisateurs WHERE email = $1");
    $recupUser = pg_execute($conn, $requestUser, array($email));

    if ($recupUser && pg_num_rows($recupUser) > 0) {
        echo('Email déja utilisé');
        exit();
    };

    $query = 'INSERT INTO utilisateurs (prenom, nom, email, mdp) VALUES ($1, $2, $3, $4)';
    $result = pg_query_params($conn, $query, array($prenom, $nom, $email, $mdp));
    
    if ($result) {
        echo 'Inscription réussie';
    } else {
        echo 'Échec de l\'inscription';
    }
};

function connectUtilisateur() {
    if (isset($_POST['Login'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];

            $conn = connexionBDD();
            
            $requestUser = 'request_user';

            $recupUser = pg_prepare($conn, $requestUser, "SELECT * FROM utilisateurs WHERE email = $1");
            $recupUser = pg_execute($conn, $requestUser, array($email));
    
            if ($recupUser && pg_num_rows($recupUser) > 0) {
                $user = pg_fetch_assoc($recupUser);
                if (password_verify($_POST['password'], $user['mdp'])) {
                    $_SESSION['user_id'] = $user['id'];
                    header('Location: ./index.php?object=site&action=presentation'); 
                    exit();
                } 
                else {
                    echo "Email ou mot de passe incorrect";
                }
            } 
            else 
                echo "Email ou mot de passe incorrect";
            }
        } 
    }

