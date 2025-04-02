<?php
    $db = new mysqli("localhost", "root", "", "dbecogreenu");

    if (isset($_GET["query"])) {
        $query_str = $_GET["query"];
        $query = $db->prepare("SELECT * FROM tblprojects WHERE title LIKE ?");
        $like_str = "%$query_str%";
        $query->bind_param("s", $like_str);
        $query->execute();
        $cur = $query->get_result();
        exit(json_encode($cur->fetch_all(MYSQLI_ASSOC)));
    }
?>