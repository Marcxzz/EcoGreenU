<?php
    session_start();
    // ini_set("display_errors", 0);
    $form_error_msg = '';

    $db = new mysqli("localhost", "root", "", "dbecogreenu");
    if ($db->connect_error) {
        exit("error during db connection");
    }

    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST['email'];
        $password = $_POST["password"];
        
        $result = $db->query("SELECT * FROM tblusers WHERE email = '$email';");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verifica la password
            if (password_verify($password, $row['passwordHash'])) {
                // Autenticazione riuscita
                $_SESSION['user_id'] = $row['idUser'];
                // $form_error_msg = $row['idUser'];
                header("location: profile.php");
            } else {
                // echo "Password errata!";
                $form_error_msg = 'Wrong password!';
            }
        } else {
            // echo "Email non trovata!";
            $form_error_msg = 'Email not found!';
        }
    }
?>