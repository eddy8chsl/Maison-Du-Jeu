<?php
global $root;
include "$root/view/header.html.php";
include "$root/dal/bd.connexion.php";
include_once "$root/dal/bd.inc.php";

connectUtilisateur()

?>
    <div id="accroche">Connexion</div>

    <form method="post" class="formulaire">
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
            <input type="submit" name="Login" value="Login" class="form-submit" />
        </div>
    </form>
    <button>
        <a href="./index.php?object=authentification&action=inscription">Inscription</a>
    </button>
    
<?php include "$root/view/footer.html.php"; ?>