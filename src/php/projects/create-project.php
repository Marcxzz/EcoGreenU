<?php
    session_start();

    $projectId = null;
    $errorMsg = ''; // messaggio di errore nel form
    $infoMsg = '';

    $db = new mysqli("localhost", "root", "", "dbecogreenu");
    if ($db->connect_error) {
        exit("Error during db connection.");
    }

    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) {
        header('location: ../pages/login.php');
    }

    if (isset($_POST['createProject'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $targetAmount = $_POST['targetAmount'];
        $deadline = formatDate($_POST['deadline'], 'Y-m-d H:i');

        $query = $db->prepare("INSERT INTO tblprojects (title, description, targetAmount, deadline, fundraiser, status) VALUES (?, ?, ?, ?, ?, 0)");
        $query->bind_param("ssdsi", $title, $description, $targetAmount, $deadline, $_SESSION['user_id']);

        try {
            $query->execute();
            $projectId = $query->insert_id;
            $query->close();
            $db->close();
            $infoMsg = "Project added successfully! with ID $projectId";
            saveProjectThumbnail($projectId);
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { // codice errore per violazionw del vincolo UNIQUe
                $errorMsg = "Error: a project already exists with this title.";
            } else {
                $errorMsg = "Error during project creation: " . $e->getMessage();
            }
        }
    }

    function formatDate($date, $format){
        $datetime = new DateTime($date);
        return $datetime->format($format);
    }

    function isRealDate($date) { 
        return strtotime($date) === false ? false : true;
    }

    // ini_set('display_errors', 0);
    function saveProjectThumbnail($projectId){
        global $infoMsg, $errorMsg;
        // $infoMsg = $infoMsg . "\r\nmiao";
        $targetDir = "../assets/images/projects"; // cartella di destinazione
        if (!file_exists($targetDir)) // se il percorso non esiste l crea
            mkdir($targetDir, 0777, true);
    
        if (!$projectId) // se l'id del progetto non è settato esce
            die("Error: missing project ID.");
    
        $imageFileType = strtolower(pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION));
    
        $allowedTypes = ["jpg", "jpeg", "png"];
        if (!in_array($imageFileType, $allowedTypes)) // controlla se il formato dell'immagine inserita rientra tra quelli ammessi
            $errorMsg ="Error: only JPG, JPEG and PNG images are allowed.";
    
        $targetFile = $targetDir . "/project-" . $projectId . "." . $imageFileType; // nome file = path/project-ID.estensione
    
        if (file_exists($targetFile)) // controlla se esiste già un'immagine per il progetto
            $errorMsg = "Error: an image already exists for this project.";
    
        $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
        if ($check === false) // verifica se il file è realmente un'immagine (e non un altro file spacciato come foto)
            $errorMsg = "Error: uploaded file is not an image.";
    
        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFile)) // sposta il file nella cartella
            $infoMsg = $infoMsg . "Image successfully loaded for project " . $projectId;
        else
            $errorMsg = "Error: uploading failed.";
    }
?>