<?php
    session_start();
    $formMsg = '';
    $db = new mysqli("localhost", "root", "", "dbecogreenu");
    if ($db->connect_error) {
        exit("error during db connection");
    }

    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        
        
        if (strlen($password) >= 8) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            
            $query = $db->prepare("INSERT INTO tblusers (firstName, lastName, email, passwordHash) VALUES (?, ?, ?, ?)");
            $query->bind_param("ssss", $firstName, $lastName, $email, $password_hash);
            $query->execute();
            $result = $query->get_result();
            // $result = $db->query("INSERT INTO tblusers (firstName, lastName, email, passwordHash) VALUES ('$firstName', '$lastName', '$email', '$password_hash')");
            
            if (!$result) {
                $_SESSION['user_id'] = $query->insert_id;
                header('location: profile.php');
            } else {
                echo "Error";
            }
            $query->close();
        } else {
            $formMsg = 'Password must be at least 8 characters long.';
        }
    }
?>