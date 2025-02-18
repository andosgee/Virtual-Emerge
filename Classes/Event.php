<?php 

    class Event{
        private $db;
        private $conn;

        public function __construct($db){
            $this->db = $db;
            $this->conn = $this->db->connect();
        }

        public function newEvent($eventName, $eventDate, $eventLink, $published){
            $query = "INSERT INTO event (EventName, EventDate, TourLink, Publish) VALUES (:name, :date, :link, :published)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $eventName);
            $stmt->bindParam(':date', $eventDate);
            $stmt->bindParam(':link', $eventLink);
            $stmt->bindParam(':published', $published);
            $stmt->execute();
            return $this->conn->lastInsertId();
        }
        public function uploadBrochure($id, $file) {
            $targetDir = "../Assets/Uploads/Brochures/";
            $dbDir = "Assets/Uploads/Brochures/";
        
            // Ensure the upload directory exists
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
        
            // Extract file information
            $fileName = basename($file['name']);
            $fileTmp = $file['tmp_name'];
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowedExtensions = ['pdf']; // List of allowed file extensions
        
            // Generate the new file name
            $newFileName = $id . '_brochure.' . $fileExt;
            $targetFile = $targetDir . $newFileName;
            $dbFile = $dbDir . $newFileName;
        
            // Validate file type
            if (!in_array(strtolower($fileExt), $allowedExtensions)) {
                throw new Exception("Invalid file type. Only PDF files are allowed.");
            }
        
            // Check for upload errors
            if ($file['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("File upload error: " . $file['error']);
            }
        
            // Move the uploaded file to the target directory
            if (!move_uploaded_file($fileTmp, $targetFile)) {
                throw new Exception("Failed to upload file.");
            }
        
            // Insert the file path into the database
            $query = "INSERT INTO assets (Directory, Type, TableRelates, TableRelatesID) VALUES (:filePath, 'PDF', 'event', :id)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':filePath', $dbFile);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        
            // Return success
            return ['uploadedFile' => $dbFile];
        }
        

    public function uploadImages($id, $files){
        $targetDir = "../Assets/Uploads/Gallery/";
        $dbDir = "Assets/Uploads/Gallery/";

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $uploadedFiles = []; // Store successful uploads
        $errors = []; // Store errors

        foreach ($files['name'] as $key => $fileName) {
            $fileTmp = $files['tmp_name'][$key];
            $fileSize = $files['size'][$key];
            $fileError = $files['error'][$key];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
            // Generate a unique name for the file
            $newFileName = $id . '_' . uniqid() . '.' . $fileExt;
            $targetFile = $targetDir . $newFileName;
            $dbFile = $dbDir . $newFileName;
    
            // Validate file type
            if (!in_array($fileExt, $allowedExtensions)) {
                $errors[] = "$fileName: Invalid file type.";
                continue;
            }
    
            // Check for upload errors
            if ($fileError !== UPLOAD_ERR_OK) {
                $errors[] = "$fileName: Upload error (code $fileError).";
                continue;
            }
    
            // Move the uploaded file to the target directory
            if (move_uploaded_file($fileTmp, $targetFile)) {
                $uploadedFiles[] = $dbFile;
    
                // Insert into the database
                $query = "INSERT INTO assets (Directory, Type, TableRelates, TableRelatesID) VALUES (:directory, 'Image', 'event', :id)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':directory', $dbFile);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            } else {
                $errors[] = "$fileName: Failed to move file.";
            }
        }
    }


    }
?>