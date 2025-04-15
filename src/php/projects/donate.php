<?php
    session_start();

    $projectId = isset($_GET['id']) ? $_GET['id'] : null;
    $userId;
    $errorMsg = ''; // messaggio di errore nel form
    $infoMsg = '';

    if (isset($_SESSION['user_id']))
        $userId = $_SESSION['user_id'];
    else
        header('location: ../pages/login.php');

    $db = new mysqli('localhost', 'root', '', 'dbecogreenu');
    if ($db->connect_error) exit("Error during db connection.");

    if (!isset($projectId)) die('Missing project ID');

    if (isset($_POST['donate'])) {
        $amount = $_POST['amount'];
        if ($amount <= 0){
            $errorMsg = 'You cannot donate $0 or less. Please type at least $0.01';
            return;
        }

        $description = $_POST['description'];
        if (strlen($description) > 150) {
            $errorMsg = 'Description should be max 150 characters long.';
            return;
        }
        if (strlen($description) == 0) $description = null;

        $date = date('Y/m/d H:i:s');
        if (isset($_POST['paymentMethod'])) {
            $paymentMethod = $_POST['paymentMethod'];
            if (!in_array($paymentMethod, [1, 2, 3, 4])){
                $errorMsg = 'Please select a valid payment method from those proposed';
                return;
            }
        } else {
            $errorMsg = 'Please select a payment method';
            return;
        }
        $public = isset($_POST['public']) ? 1 : 0;

        $query = $db->prepare("INSERT INTO tblpayments (amount, description, date, projectId, paymentMethod, userId, public) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param("dssiiii", $amount, $description, $date, $projectId, $paymentMethod, $userId, $public);

        try {
            $query->execute();
            $infoMsg = 'Donation confirmed successfully';
            header("refresh:1;url=../pages/project.php?id=$projectId"); // reindirizza l'utente dopo 3 secondi}
            $query->close();
        } catch (mysqli_sql_exception $e) {
            $errorMsg = "Error during the payment processing: " . $e->getMessage();
        }
    };
?>