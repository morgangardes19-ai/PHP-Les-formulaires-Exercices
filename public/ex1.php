<?php require_once "../_partials/_head.php" ?>
    <form action="../process/ex1.php" method="get">

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>


        <button type="submit">Envoyer</button>
    </form>
<?php require_once "../_partials/_footer.php" ?>