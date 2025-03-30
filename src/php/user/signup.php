<?php
    $formMsg = '';
    $db = new mysqli("localhost", "root", "", "dbecogreenu");
    if ($db->connect_error) {
        exit("error during db connection");
    }

    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST["email"]) && isset($_POST["password"])) {
        // Prendi email e password dalla form
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];

        if (strlen($password) > 8) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
            $result = $db->query("INSERT INTO tblusers (firstName, lastName, email, passwordHash) VALUES ('$firstName', '$lastName', '$email', '$password_hash')");
            
            if ($result) {
                header('location: profile.php');
            } else {
                echo "Error";
            }
        } else {
            $formMsg = 'Password must be at least 8 characters long.';
        }
    }
?>