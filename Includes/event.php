<?php 
    include_once '../Classes/Database.php';
    include_once '../Classes/Event.php';
    include_once '../Classes/Student.php';
    include_once 'functions.php';
    session_start();
    checkAdmin();

    $db = new Database();
    $conn = $db->connect();
    $event = new Event($db);
    $student = new Student($db);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Event handling
        $eventID = $event->newEvent(
            sanitizeInput($_POST['event-name']), 
            sanitizeInput($_POST['event-date']), 
            sanitizeInput($_POST['event-link']), 
            sanitizeInput($_POST['publish']));
        $event -> uploadBrochure($eventID, $_FILES['brochure-pdf']);
        $event -> uploadImages($eventID, $_FILES['gallery']);

        //Student Handling
        $numberOfStudents = count($_POST['first-name']);
        for ($i = 0; $i < $numberOfStudents; $i++) {
            $studentID = $student->newStudent(
                sanitizeInput($_POST['first-name'][$i]),
                sanitizeInput($_POST['last-name'][$i]),
                sanitizeInput($_POST['pathway'][$i]),
                sanitizeInput($_POST['project-name'][$i]),
                $eventID
            );
            echo $studentID;
            // print_r($_FILES['headshot'][0]);
            if (isset($_FILES['headshot']) && isset($_FILES['headshot']['name'][$i])) {
                $headshotFile = $_FILES['headshot']['tmp_name'][$i];
                $headshotFileName = $_FILES['headshot']['name'][$i];
                $student->addHeadshot($studentID, $headshotFile, $headshotFileName);
            }
            if (isset($_FILES['poster']) && isset($_FILES['poster']['name'][$i])) {
                $posterFile = $_FILES['poster']['tmp_name'][$i];
                $posterFileName = $_FILES['poster']['name'][$i];
                $student->addPoster($studentID, $posterFile, $posterFileName);
            }
            if (isset($_FILES['short-paper']) && isset($_FILES['short-paper']['name'][$i])) {
                $shortPaperFile = $_FILES['short-paper']['tmp_name'][$i];
                $shortPaperFileName = $_FILES['short-paper']['name'][$i];
                $student->addShortPaper($studentID, $shortPaperFile, $shortPaperFileName);
            }
            // $student -> addHeadshot($studentID, $_FILES['headshot']);
            // $student -> addPoster($studentID, $_FILES['poster'][$i]);
            // $student -> addShortPaper($studentID, $_FILES['short-paper'][$i]);
        }

        header('Location: ../manage_Events.php');
    }
?>