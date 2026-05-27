<?php

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    header("Location: ../public/ex7.php?error=bad-method");
    exit();
}


if (!isset($_POST['prenom']) || !isset($_POST['nom']) || !isset($_POST['civilite']) || !isset($_FILES['file'])) {
    header("Location: ../public/ex7.php?error=missing-value");
    exit();
}

if (empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['civilite']) || empty($_FILES['file'])) {
    header("Location: ../public/ex7.php?error=value-empty");
    exit();
}

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// INPUT SANITIZATION

$prenom = htmlspecialchars(trim($_POST['prenom']));
$nom = htmlspecialchars(trim($_POST['nom']));
$civilite = htmlspecialchars(trim($_POST['civilite']));
var_dump($prenom, $nom, $civilite);

// var_dump($_FILES);
// die();

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$target_file_name = basename($_FILES["file"]["name"]);

$imageFileType0 = strtolower(pathinfo($target_file_name, PATHINFO_FILENAME));
$imageFileType = strtolower(pathinfo($target_file_name, PATHINFO_EXTENSION));
var_dump($imageFileType0, $imageFileType);

if (!file_exists($target_file)) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


require_once "../_partials/_head.php"
?>

<h1>Binvenue <?= $civilite ?> <?= $nom ?> <?= $prenom ?></h1>

<?php require_once "../_partials/_footer.php" ?>