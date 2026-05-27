<?php
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("Location: ../public/ex5.php?error=bad-method");
    exit();
}

if (!isset($_POST['prenom']) || !isset($_POST['nom']) || !isset($_POST['civilite'])) {
    header("Location: ../public/ex5.php?error=missing-value");
    exit();
}

if (empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['civilite'])) {
    header("Location: ../public/ex5.php?error=value-empty");
    exit();
}


// INPUT SANITIZATION

$prenom = htmlspecialchars(trim($_POST['prenom']));
$nom = htmlspecialchars(trim($_POST['nom']));
$civilite = htmlspecialchars(trim($_POST['civilite']));

require_once "../_partials/_head.php"
?>

<h1>Binvenue <?= $civilite ?> <?= $nom ?> <?= $prenom ?></h1>

<?php require_once "../_partials/_footer.php" ?>