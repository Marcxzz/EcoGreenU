<?php
    $db = new mysqli("localhost", "root", "", "dbecogreenu");
    if ($db->connect_error) {
        exit("error during db connection");
    }

    $result = $db->query("SELECT tblprojects.*, SUM(tblpayments.amount) AS raisedAmount FROM tblprojects INNER JOIN tblpayments ON tblprojects.idProject = tblpayments.projectId WHERE status = 0 GROUP BY tblprojects.idProject LIMIT 3");
    $projects = [];
    if ($result == false) {
        echo "error";
    } else {
        while ($row = $result->fetch_assoc()) {
            // aggiunge la riga all'array di progetti
            array_push($projects, $row);
        }
    }
?>