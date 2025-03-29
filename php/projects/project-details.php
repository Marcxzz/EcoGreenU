<?php
    session_start();
    $project_id;
    $project;
    $donations = [];
    $owner = false;

    if (isset($_GET['project-id'])) {
        $project_id = $_GET['project-id'];

        $db = new mysqli("localhost", "root", "", "dbecogreenu");
        if ($db->connect_error) {
            exit("error during db connection");
        }

        $result = $db->query("SELECT * FROM tblprojects WHERE idProject = $project_id");
        if ($result->num_rows > 0) {
            $project = $result->fetch_assoc();
            $owner = $_SESSION['user_id'] == $project['fundraiser'] ? true : false;

            $result = $db->query("SELECT tblpayments.*,
                                         tblusers.firstName,
                                         tblusers.lastName
                                    FROM tblprojects
                                INNER JOIN tblpayments ON tblprojects.idproject = tblpayments.projectid
                                INNER JOIN tblusers ON tblpayments.userid = tblusers.idUser
                                   WHERE idProject = $project_id");
            
            if ($result == false) {
                echo 'no donations for this project';
            } else {
                while ($row = $result->fetch_assoc()) {
                    array_push($donations, $row);
                }
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