<?php
    require_once '../Classes/Database.php';
    require_once 'functions.php';

    $db = new Database();
    $conn = $db->connect();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = sanitizeInput($_POST['username']);
        $password = sanitizeInput($_POST['password']);

        $query = "SELECT * FROM admin WHERE Email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['Password'])) {
                session_start();
                $_SESSION['ID'] = $user['admin_id'];
                $_SESSION['name'] = $user['FirstName']. ' ' . $user['LastName'];
                header('Location: ../admin_portal.php');
            } else {
                echo 'Invalid password';
            }
        } else {
            echo 'Invalid email';
        }


    }
?>