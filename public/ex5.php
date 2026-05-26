<?php require_once "../_partials/_head.php" ?>

<form action="../process/ex5.php" method="post">
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

<?php require_once "../_partials/_footer.php" ?>