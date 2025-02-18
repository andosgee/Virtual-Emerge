<?php
class Student{
    private $db;
    private $conn;

    public function __construct($db){
        $this->db = $db;
        $this->conn = $this->db->connect();
    }

    public function newStudent($firstName, $lastName, $pathway, $project, $eventID){
        $query = "INSERT INTO students (FirstName, LastName, Pathway, ProjectName, Event_ID) VALUES (:firstName, :lastName, :pathway, :projectName, :eventID)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':pathway', $pathway);
        $stmt->bindParam(':projectName', $project);
        $stmt->bindParam(':eventID', $eventID);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function addHeadshot($id, $fileTmp, $fileName){
        $targetDir = "../Assets/Uploads/Headshots/";
        $dbDir = "Assets/Uploads/Headshots/";
    
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
    
        // Get the file extension
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
    
        // Create a unique name for the file
        $newFileName = $id . '.' . $fileExt;
        $targetFile = $targetDir . $newFileName;
        $dbFile = $dbDir . $newFileName;
    
        // Validate file type
        if (!in_array(strtolower($fileExt), $allowedExtensions)) {
            throw new Exception("Invalid file type. Only JPG, PNG, and JPEG files are allowed.");
        }
    
        // Check for upload errors
        if (!move_uploaded_file($fileTmp, $targetFile)) {
            throw new Exception("Failed to upload file.");
        }
    
        // Insert the file path into the database
        $query = "INSERT INTO assets (Directory, Type, TableRelates, TableRelatesID) VALUES (:filePath, 'Image', 'students', :id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':filePath', $dbFile);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function addPoster($id, $fileTmp, $fileName) {
        $targetDir = "../Assets/Uploads/Posters/";
        $dbDir = "Assets/Uploads/Posters/";
    
        // Check if the target directory exists, create it if not
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
    
        // Get the file extension
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedExtensions = ['pdf']; // Only allow PDF files
    
        // Generate a unique file name based on the student ID and file extension
        $newFileName = $id . '.' . $fileExt;
        $targetFile = $targetDir . $newFileName;
        $dbFile = $dbDir . $newFileName;
    
        // Validate the file extension
        if (!in_array(strtolower($fileExt), $allowedExtensions)) {
            throw new Exception("Invalid file type. Only PDF files are allowed.");
        }
    
        // Check for upload errors
        if (!is_uploaded_file($fileTmp)) {
            throw new Exception("File upload error.");
        }
    
        // Move the uploaded file to the target directory
        if (!move_uploaded_file($fileTmp, $targetFile)) {
            throw new Exception("Failed to upload file.");
        }
    
        // Insert the file path into the database
        $query = "INSERT INTO assets (Directory, Type, TableRelates, TableRelatesID) VALUES (:filePath, 'PDF', 'students', :id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':filePath', $dbFile);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    

    public function addShortPaper($id, $fileTmp, $fileName) {
        $targetDir = "../Assets/Uploads/ShortPapers/";
        $dbDir = "Assets/Uploads/ShortPapers/";
    
        // Check if the target directory exists, create it if not
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
    
        // Get the file extension
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedExtensions = ['pdf']; // Only allow PDF files
    
        // Generate a unique file name based on the student ID and file extension
        $newFileName = $id . '.' . $fileExt;
        $targetFile = $targetDir . $newFileName;
        $dbFile = $dbDir . $newFileName;
    
        // Validate the file extension
        if (!in_array(strtolower($fileExt), $allowedExtensions)) {
            throw new Exception("Invalid file type. Only PDF files are allowed.");
        }
    
        // Check for upload errors
        if (!is_uploaded_file($fileTmp)) {
            throw new Exception("File upload error.");
        }
    
        // Move the uploaded file to the target directory
        if (!move_uploaded_file($fileTmp, $targetFile)) {
            throw new Exception("Failed to upload file.");
        }
    
        // Insert the file path into the database
        $query = "INSERT INTO assets (Directory, Type, TableRelates, TableRelatesID) VALUES (:filePath, 'PDF', 'students', :id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':filePath', $dbFile);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    

    public function deleteStudent($studentId) {
        $query = "DELETE FROM students WHERE student_id = :student_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $studentId);
        return $stmt->execute();
    }
}
?>