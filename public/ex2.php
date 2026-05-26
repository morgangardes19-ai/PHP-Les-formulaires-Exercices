<?php require_once "../_partials/_head.php" ?>

<form action="../process/ex2.php" method="post">

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required>

    <button type="submit">Envoyer</button>
</form>

<?php require_once "../_partials/_footer.php" ?>