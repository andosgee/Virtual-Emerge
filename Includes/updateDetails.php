<?php 
    include_once '../Classes/Database.php';
    include_once '../Classes/Users.php';
    include_once 'functions.php';

    session_start();
    checkAdmin();
    $db = new Database();
    $conn = $db->connect();
    $user = new Users($db, $_SESSION['ID']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user->updateDetails(sanitizeInput($_POST['first-name']), sanitizeInput($_POST['last-name']), sanitizeInput($_POST['email']), sanitizeInput($_POST['organization']));
        
        $query = "SELECT * FROM admin WHERE admin_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $_SESSION['ID']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['name'] = $row['FirstName'] . ' ' . $row['LastName'];

        header('Location: ../my_Details.php');
    }
?>