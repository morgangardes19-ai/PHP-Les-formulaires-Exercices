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

    if ($imageFileType != "pdf") {
        echo "Seul le format PDF est autorisé.";
        $uploadOk = 0;
    }
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

        <hr>

        <label for="file"></label>
        <input type="file" id="file" name="file"><br>

        <hr>

        <button type="submit">Envoyer</button>

    </form>

<?php }
require_once "../_partials/_footer.php" ?>