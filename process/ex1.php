<?php
// var_dump($_GET);
if ($_SERVER['REQUEST_METHOD'] !== "GET") {
    header("Location: ../public/ex1.php?error=bad-method");
    exit();
}

if (!isset($_GET['prenom']) || !isset($_GET['nom'])) {
    header("Location: ../public/ex1.php?error=missing-value");
    exit();
}

if (empty($_GET['prenom']) || empty($_GET['nom'])) {
    header("Location: ../public/ex1.php?error=value-empty");
    exit();
}


// INPUT SANITIZATION

$prenom = htmlspecialchars(trim($_GET['prenom']));
$nom = htmlspecialchars(trim($_GET['nom']));

 require_once "../_partials/_head.php" 
?>



    <h1>Voici votre Prénom et Nom :</h1>
    <p>Prénom : <?= $prenom ?></p>
    <p>Nom : <?= $nom ?></p>


<?php require_once "../_partials/_footer.php" ?>