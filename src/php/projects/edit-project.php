<?php
    session_start();

    $projectId = isset($_GET['id']) ? $_GET['id'] : null;
    $project = null;
    $errorMsg = ''; // messaggio di errore nel form
    $infoMsg = '';
    
    if (!isset($_SESSION['user_id'])) {
        header('location: ../pages/login.php');
    }

    $db = new mysqli('localhost', 'root', '', 'dbecogreenu');
    if ($db->connect_error) exit("Error during db connection.");

    if (isset($projectId)) {
        $query = $db->prepare("SELECT * FROM tblprojects WHERE idProject = ?");
        $query->bind_param("i", $projectId);

        try {
            $query->execute();
            $project = $query->get_result()->fetch_assoc();
            $query->close();
        } catch (mysqli_sql_exception $e) {
            $errorMsg = "Error during project retrieval: " . $e->getMessage();
        }
    } else die('Missing project ID');

    if (isset($_POST['editProject'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $targetAmount = $_POST['targetAmount'];
        $deadline = formatDate($_POST['deadline'], 'Y-m-d H:i:s');

        $query = $db->prepare("UPDATE tblprojects SET title = ?, description = ?, targetAmount = ?, deadline = ? WHERE idProject = ?");
        $query->bind_param("ssdsi", $title, $description, $targetAmount, $deadline, $projectId);

        try {
            $query->execute();
            $query->close();
            $db->close();
            $infoMsg = "Project edited successfully!";
            // se è stat caricata una nuova thumbnail, viene sostituita
            if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] === UPLOAD_ERR_OK) saveProjectThumbnail($projectId);
        } catch (mysqli_sql_exception $e) {
            $errorMsg = "Error during project editing: " . $e->getMessage();
        }
    }


    
                                        // ======================
                                        // DA RIVEDERE
                                        // ======================

    if (isset($_POST['deleteProject'])) {
        $query = $db->prepare("SELECT SUM(amount) AS raisedAmount FROM tblpayments WHERE projectId = ?");
        $query->bind_param("i", $projectId);

        try {
            $query->execute();
            $result = $query->get_result();

            if ($result){
                $raisedAmount = $result->fetch_assoc()['raisedAmount'];

                if ($raisedAmount <= 1000) {
                    $query = $db->prepare("DELETE FROM tblpayments WHERE projectId = ?");
                    $query->bind_param("i", $projectId);
                    
                    try {
                        $query->execute();
                        $query = $db->prepare("DELETE FROM tblprojects WHERE idproject = ?");
                        $query->bind_param("i", $projectId);
                        try {
                            $query->execute();
                            deleteProjectThumbnail();
                            header('location: ../pages/profile.php');
                        } catch (mysqli_sql_exception $e) {
                            $errorMsg = "Error during project deleting: " . $e->getMessage();
                        }
                        deleteProjectThumbnail();
                        header('location: ../pages/profile.php');
                    } catch (mysqli_sql_exception $e) {
                        $errorMsg = "Error during project deleting: " . $e->getMessage();
                    } finally {
                        $query->close();
                        $db->close();
                    }
                } else $errorMsg = "You cannot delete a project with more than $1,000 total donations.";
            }
        } catch (mysqli_sql_exception $e) {
            $errorMsg = "Error during project deleting: " . $e->getMessage();
        }
    }

    function formatDate($date, $format){
        $datetime = new DateTime($date);
        return $datetime->format($format);
    }

    function saveProjectThumbnail($projectId){
        global $infoMsg, $errorMsg;
        $targetDir = "../assets/images/projects"; // cartella di destinazione
        if (!file_exists($targetDir)) // se il percorso non esiste l crea
            mkdir($targetDir, 0777, true);
    
        if (!$projectId) // se l'id del progetto non è settato, esce
            die("Error: missing project ID.");
    
        $imageFileType = strtolower(pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION));
    
        $allowedTypes = ["jpg", "jpeg", "png"];
        if (!in_array($imageFileType, $allowedTypes)) // controlla se il formato dell'immagine inserita rientra tra quelli ammessi
            $errorMsg ="Error: only JPG, JPEG and PNG images are allowed.";
    
        $targetFile = $targetDir . "/project-" . $projectId . "." . $imageFileType; // nome file = path/project-ID.estensione
    
        $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
        if ($check === false) // verifica se il file è raelmente un'immagine (e non un altro file spacciato come foto)
            $errorMsg = "Error: uploaded file is not an image.";
    
        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFile)) // sposta il file nella cartella
            $infoMsg = $infoMsg . "Image successfully loaded for project " . $projectId;
        else
            $errorMsg = "Error: uploading failed.";
    }

    function deleteProjectThumbnail(){
        global $projectId, $project;
        $filename = $project['img'];
        $path = "../assets/images/projects/$filename";

        if (file_exists($path)){
            unlink($path);
            echo "Project thumbnail successfully deleted";
        }
    }
?>