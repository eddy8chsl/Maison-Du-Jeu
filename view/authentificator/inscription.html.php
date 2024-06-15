<?php
global $root;
include "$root/view/header.html.php";
include "$root/dal/bd.connexion.php";
?>

    <div id="accroche">Inscription</div>

    <form action="./index.php?object=authentification&action=inscription" method="post" class="formulaire">
        <div class="form-field">
            <label for="prenom" class="form-label">Prénom</label>
            <br>
            <input type="text" name="prenom" id="prenom" class="form-input" required />
        </div>
        <div class="form-field">
            <label for="nom class="form-label">Nom</label>
            <br>
            <input type="text" name="nom" id="nom" class="form-input" required />
        </div>
        <div class="form-field">
            <label for="email" class="form-label">Email</label>
            <br>
            <input type="email" name="email" id="email" class="form-input" required />
        </div>
        <div class="form-field">
            <label for="password" class="form-label">Password</label>
            <br>
            <input type="password" name="password" id="password" class="form-input" required />
        </div>
        <div class="form-action">
            <input type="submit" value="Inscription" class="form-submit" />
        </div>
    </form>

    
<?php 

    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['prenom']) && isset($_POST['nom'])) {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $mdp = $_POST['password'];
        $mdpHash =  password_hash($mdp, PASSWORD_ARGON2ID);

        postUtilisateur($prenom, $nom, $email, $mdpHash);
    }

include "$root/view/footer.html.php";