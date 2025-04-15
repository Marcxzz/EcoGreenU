<?php
    session_start();
    $project_id;
    $project;
    $donations = [];
    $owner = false;
    $raisedAmount;

    if (isset($_GET['id'])) {
        $project_id = $_GET['id'];
        if (!is_numeric($project_id)) {
            exit("Invalid project ID");
        }

        $db = new mysqli("localhost", "root", "", "dbecogreenu");
        if ($db->connect_error) {
            exit("error during db connection");
        }

        $result = $db->query("SELECT * FROM tblprojects WHERE idProject = $project_id");

        if ($result->num_rows > 0) {
            $project = $result->fetch_assoc();
            $owner = isset($_SESSION['user_id']) && $_SESSION['user_id'] == $project['fundraiser'] ? true : false;
    
            $result = $db->query("SELECT tblpayments.*,
                                         tblusers.firstName,
                                         tblusers.lastName
                                    FROM tblprojects
                                INNER JOIN tblpayments ON tblprojects.idproject = tblpayments.projectid
                                INNER JOIN tblusers ON tblpayments.userid = tblusers.idUser
                                   WHERE idProject = $project_id
                                ORDER BY tblpayments.date DESC
                                   LIMIT 5");
            
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    array_push($donations, $row);
                }
            } else {
                echo 'no donations for this project';
            }


            $result = $db->query("SELECT SUM(tblpayments.amount) AS raisedAmount FROM tblpayments WHERE projectId = $project_id");
            if ($result) {
                $raisedAmount = $result->fetch_assoc()['raisedAmount'];
            } else {
                echo 'no donations for this project';
            }
        } else {
            echo 'no project found with this ID';
        }
    } else {
        echo 'no id provided';
    }

    function formatDate($date, $format){
        $datetime = new DateTime($date);
        return $datetime->format($format);
    }
?>