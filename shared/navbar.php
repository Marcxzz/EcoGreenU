<?php
    function checkIfActive($requestUri)
    {
        $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

        if ($current_file_name == $requestUri) echo 'active';
        else echo 'text-opacity-75';
    }
?>