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

        $query = $db->prepare("SELECT * FROM tblusers WHERE email = ? AND isDeleted = 0");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();
        // print_r($result);
        // return;

        if ($result) {
            if (password_verify($password, $result['passwordHash'])) {
                $_SESSION['user_id'] = $result['idUser'];
                header("location: profile.php");
            } else {
                $form_error_msg = 'Wrong password!';
            }
        } else {
            $form_error_msg = 'Email not found!';
        }
        $query->close();
    }
?>