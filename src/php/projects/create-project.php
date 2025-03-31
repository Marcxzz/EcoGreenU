<?php
    ini_set('display_errors', 0);

    // Directory dove salvare le immagini
    $targetDir = "../assets/images/projects/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true); // Crea la cartella se non esiste
    }

    $targetFile = $targetDir . basename($_FILES["thumbnail"]["name"]); // Percorso completo del file
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // Estensione file
    $uploadOk = 1;

    // Controlla se il file è un'immagine reale
    if (isset($_POST["createProject"])) {
        $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
        if ($check !== false) {
            echo "Il file è un'immagine - " . $check["mime"] . ".";
        } else {
            echo "Il file non è un'immagine.";
            $uploadOk = 0;
        }
    }

    // Controlla la dimensione del file (max 5MB)
    if ($_FILES["thumbnail"]["size"] > (5 * 1024 * 1024)) {
        echo "Il file è troppo grande (max 5MB).";
        $uploadOk = 0;
    }

    // Consenti solo JPG e PNG
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        echo "Sono ammessi solo file JPG, JPEG, PNG.";
        $uploadOk = 0;
    }

    // Verifica se il file esiste già e rinomina se necessario
    $counter = 1;
    while (file_exists($targetFile)) {
        $targetFile = $targetDir . pathinfo($_FILES["thumbnail"]["name"], PATHINFO_FILENAME) . "_$counter." . $imageFileType;
        $counter++;
    }

    // Se tutto è ok, sposta il file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFile)) {
            echo "L'immagine " . htmlspecialchars(basename($targetFile)) . " è stata caricata con successo.";
        } else {
            echo "Errore nel caricamento del file.";
        }
    }
?>
