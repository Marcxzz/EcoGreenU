<?php
    session_start();
    $projectId = null;

    $db = new mysqli("localhost", "root", "", "dbecogreenu");
    if ($db->connect_error) {
        exit("error during db connection");
    }

    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) {
        header('location: ../pages/login.php');
    }

    if (isset($_POST['createProject'])) {
        if (!empty($_FILES['thumbnail']) && isset($_POST["title"]) && isset($_POST['description']) && isset($_POST['targetAmount']) && isset($_POST['deadline'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $targetAmount = $_POST['targetAmount'];
            $deadline = formatDate($_POST['deadline'], 'Y-m-d H:i:s');

            $query = $db->prepare("INSERT INTO tblprojects (title, description, targetAmount, deadline, fundraiser, status) VALUES (?, ?, ?, ?, ?, 0)");
            $query->bind_param("ssdsi", $title, $description, $targetAmount, $deadline, $_SESSION['user_id']);
            $query->execute();
            
            $projectId = $query->insert_id;
            $query->close();
            $db->close();
        } else echo 'error: some fields are not compiled';
    }

    function formatDate($date, $format){
        $datetime = new DateTime($date);
        return $datetime->format($format);
    }
?>

<?php
    // ini_set('display_errors', 0);

    // Configurazione: cartella di destinazione
    $targetDir = "../assets/images/projects/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Recupera l'ID del progetto
    if (!isset($_POST["project_id"]) || empty($_POST["project_id"])) {
        die("Errore: missing project ID.");
    }

    $projectId = preg_replace("/[^0-9]/", "", $_POST["project_id"]); // Sanitizza l'ID
    $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

    $allowedTypes = ["jpg", "jpeg", "png"];
    if (!in_array($imageFileType, $allowedTypes)) {
        die("Error: only JPG, JPEG and PNG images are allowed.");
    }

    // Imposta il nome del file come "IDprogetto.estensione"
    $targetFile = $targetDir . $projectId . "." . $imageFileType;

    // Controlla se esiste già un'immagine per il progetto
    if (file_exists($targetFile)) {
        die("Error: an image already exists for this project.");
    }

    // Verifica se il file è effettivamente un'immagine
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        die("Error: uploaded file is not an image.");
    }

    // Sposta il file nella cartella
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "Image successfully loaded for project " . $projectId;
    } else {
        echo "Error: uploading failed.";
    }
?>
