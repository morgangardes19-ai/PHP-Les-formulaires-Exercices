<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (!isset($_POST['prenom']) || !isset($_POST['nom']) || !isset($_POST['civilite'])) {
        echo "Il manque une donnée.";
        die();
    }

    if (empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['civilite'])) {
        echo "Champ vide.";
        die();
    }


    // INPUT SANITIZATION

    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $nom = htmlspecialchars(trim($_POST['nom']));
    $civilite = htmlspecialchars(trim($_POST['civilite']));
    var_dump($prenom, $nom, $civilite);
} else {


?>

    <?php require_once "../_partials/_head.php" ?>

    <form action="" method="post">
        <p>
            <label for="civilite">Quelle est votre civilité ?</label><br>
            <select name="civilite" id="civilite">
                <option value="Monsieur">Mr</option>
                <option value="Madame">Mme</option>
            </select>
        </p>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <button type="submit">Envoyer</button>

    </form>

<?php }
require_once "../_partials/_footer.php" ?>