<?php
    session_start();
    $user;
    $contibutions = [];
    $projects = [];
    
    if (isset($_POST['logout']) && $_POST['logout'] == true) {
        $_SESSION['user_id'] = null;
    }
    // $_SESSION['user_id'] = null; // DEBUG: fa il logout manuale
    // echo $_SESSION['user_id'];
    
    if (isset($_SESSION['user_id'])){ // l'utente è autenticato
        $db = new mysqli("localhost", "root", "", "dbecogreenu");
        if ($db->connect_error) {
            exit("error during db connection");
        }

        $user_id = $_SESSION['user_id'];
        
        $result = $db->query("SELECT * FROM tblusers WHERE idUser = '$user_id'");
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // print_R($row);
        
            $result = $db->query("SELECT * FROM tblprojects INNER JOIN tblpayments ON tblprojects.idproject = tblpayments.projectid WHERE tblpayments.userid = $user_id");
            if ($result == false) {
                echo 'you have not yet contibuted to any project';
            } else {
                while ($row = $result->fetch_assoc()) {
                    array_push($contibutions, $row);
                }
            }

            $result = $db->query("SELECT * FROM tblprojects INNER JOIN tblusers ON tblprojects.fundraiser = tblusers.iduser WHERE tblusers.iduser = $user_id");
            if ($result == false) {
                echo 'you have not yet contibuted to any project';
            } else {
                while ($row = $result->fetch_assoc()) {
                    array_push($projects, $row);
                }
            }
        } else {
            echo 'user not found';
            exit();
        }
    } else { // l'utente non è autenticato, redirect alla pagina login
        header("location: login.php");
    }

    function formatDate($date){
        $datetime = new DateTime($date);
        return $datetime->format('d/m/Y H:i:s');
    }
?>