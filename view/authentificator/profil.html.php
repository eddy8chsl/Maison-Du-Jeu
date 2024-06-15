<?php
global $root;
include "$root/view/header.html.php";
include "$root/dal/bd.connexion.php";
include "$root/dal/bd.location.php";

$conn = connexionBDD();
$recupEmail = pg_prepare($conn, '', "SELECT email FROM utilisateurs WHERE id = $1");
$recupEmail = pg_execute($conn, '', array($_SESSION['user_id']));

$row = pg_fetch_assoc($recupEmail);
$recupEmail = $row['email'];

$recupJeu = getEmprunts()
?>

<h2>Mise à jour de votre profil</h2>

<p>Connecté en tant que : <?php echo($recupEmail) ?> </p>

</ul>
<form method="POST">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>
    
    <label for="password">Mot de passe:</label><br>
    <input type="password" id="password" name="password"><br>
    
    <input type="submit" value="Mettre à jour">
</form>

<h2>Vos emprunts :</h2>
<ul>
<?php foreach ($recupJeu as $jeu) {
    echo '<li>' . $jeu['nom'] . '</li><br>';
} ?>

<?php

if (!isset($_SESSION['user_id'])) {
    exit("Vous devez être connecté pour accéder à cette page.");
}

if($conn) {
    $userId = $_SESSION['user_id'];
    if(isset($_POST['email']) && $_POST['email']!=null) {
        $emailModif = $_POST['email'];
        $requestUser = 'update_email';
        $updateEmail = "UPDATE utilisateurs SET email = $1 WHERE id = $2";
        pg_prepare($conn, $requestUser, $updateEmail);
        pg_execute($conn, $requestUser, array($emailModif, $userId));

    };

    if (isset($_POST['password']) && $_POST['password']!=null){
        $mdpModif = $_POST['password'];
        $resquestUser = "update_mdp";
        $updatePassword= "UPDATE utilisateurs SET mdp = $1 WHERE id = $2";
        pg_prepare($conn, $resquestUser, $updatePassword);
        pg_execute($conn, $resquestUser, array(password_hash($mdpModif, PASSWORD_ARGON2ID), $userId));
    };

    if (!empty($emailModif) || !empty($mdpModif)) {
        echo "Mise à jour réussie.";
    }
    
};