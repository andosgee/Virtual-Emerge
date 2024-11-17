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
        if ($_POST['new-password'] == $_POST['confirm-password']){
            $password = password_hash(sanitizeInput($_POST['new-password']), PASSWORD_BCRYPT);
            $user->updatePassword($password);
            header('Location: ../my_Details.php');
        }
        
    }
?>