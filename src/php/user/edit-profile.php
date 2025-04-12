<?php
    session_start();
    $user;
    
    if ($_SESSION['user_id'] != null){ // l'utente è autenticato
        $db = new mysqli("localhost", "root", "", "dbecogreenu");
        if ($db->connect_error) {
            exit("error during db connection");
        }

        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            
            $result = $db->query("SELECT * FROM tblusers WHERE idUser = $user_id AND isDeleted = 0");
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                // print_R($row);
            
            } else {
                echo 'user not found';
            }
            // $result = $db->query("");
        }
    } else { // l'utente non è autenticato, redirect alla pagina login
        header("location: login.php");
    }

    $form_error_msg = '';
?>

<!-- CHANGE PASSWORD -->
<?php
    $pwFormMsg = '';
    $changesAppliedMsg = '';

    if (isset($_POST['changePassword'])) {
        $db = new mysqli("localhost", "root", "", "dbecogreenu");
        if ($db->connect_error) {
            exit("error during db connection");
        }

        $userId = $_SESSION['user_id'];
        $userPwHash = $user['passwordHash'];
        $oldPw = $_POST['oldPassword'];
        $newPw = $_POST['newPassword'];

        // if (strlen($newPw) < 8) {
        //     $pwFormMsg = 'Password can\'t be less than 8 characters';
        //     return;
        // }

        if (password_verify($oldPw, $userPwHash)) {
            $newPasswordHash = password_hash($newPw, PASSWORD_DEFAULT);

            $query = $db->prepare("UPDATE tblusers SET passwordhash = ? WHERE iduser = ?");
            $query->bind_param("si", $newPasswordHash, $userId);
            
            if ($query->execute()) {
                $pwFormMsg = "Password changed successfully!";
                $changesAppliedMsg = "Password changed successfully!";
            } else {
                $pwFormMsg = "Error updating password.";
            }
            $query->close();
        } else {
            $pwFormMsg = "Old password is incorrect.";
        }
    }
?>

<!-- SAVE CHANGES -->
<?php
    $changesAppliedMsg = '';

    if (isset($_POST['editProfile'])) {
        $db = new mysqli("localhost", "root", "", "dbecogreenu");
        if ($db->connect_error) {
            exit("error during db connection");
        }

        $userId = $_SESSION['user_id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'] != $user['email'] ? $_POST['email'] : $user['email'];
        $phoneNumber = !empty($_POST['phoneNumber']) ? $_POST['phoneNumber'] : NULL;

        $query = $db->prepare("UPDATE tblusers SET firstName = ?, lastName = ?, email = ?, phoneNumber = ? WHERE idUser = ?");
        $query->bind_param("ssssi", $firstName, $lastName, $email, $phoneNumber, $userId);
        $query->execute();
        $changesAppliedMsg = 'Changes applied successfully!';
        
        // header('location: edit-profile.php');
        $query->close();
    }
?>

<!-- DELETE USER -->
<?php
    if (isset($_POST['deleteUser'])) {
        $db = new mysqli("localhost", "root", "", "dbecogreenu");
        if ($db->connect_error)
            exit("error during db connection");

        $userId = $_SESSION['user_id'];
        
        $query = $db->prepare("UPDATE tblusers SET isDeleted = TRUE WHERE idUser = ?");
        $query->bind_param("i", $userId);
        $query->execute();
        
        $_SESSION['user_id'] = null;
        header('location: ../index.php');
    }
?>