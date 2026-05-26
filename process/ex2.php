<?php
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("Location: ../public/ex2.php?error=bad-method");
    exit();
}

if (!isset($_POST['nom']) || !isset($_POST['prenom'])) {
    header("Location: ../public/ex2.php?error=missing-value");
    exit();
}

if (empty($_POST['nom']) || empty($_POST['prenom'])) {
    header("Location: ../public/ex2.php?error=value-empty");
    exit();
}


//  INPUT SANITIZATION

$nom = htmlspecialchars(trim($_POST['nom']));
$prenom = htmlspecialchars(trim($_POST['prenom']));

require_once "../_partials/_head.php"
?>


<h1>Voici votre nom et prénom :</h1>
<p>Nom : <?= $nom ?></p>
<p>Prénom : <?= $prenom ?></p>


<?php require_once "../_partials/_footer.php" ?>