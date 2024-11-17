<?php 

class Users{
    private $db;
    private $conn;
    private $id;

    public function __construct($db, $id){
        $this->db = $db;
        $this->conn = $this->db->connect();
        $this->id = $id;
    }

    public function getDetails(){
        $query = "SELECT * FROM admin WHERE admin_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function updateDetails($firstName, $lastName, $email, $organization){
        $currentData = $this->getDetails();
        $updates = [];

        if($firstName != $currentData['FirstName']){
            $updates['FirstName'] = $firstName;
        }
        if($lastName != $currentData['LastName']){
            $updates['LastName'] = $lastName;
        }
        if($email != $currentData['Email']){
            $updates['Email'] = $email;
        }
        if($organization != $currentData['Organization']){
            $updates['Organization'] = $organization;
        }

        if (!empty($updates)) {
            try {
                // Construct dynamic query
                $setClause = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($updates)));
                $query = "UPDATE admin SET $setClause WHERE admin_id = :id";
                $stmt = $this->conn->prepare($query);
    
                // Bind dynamic values
                foreach ($updates as $key => $value) {
                    $stmt->bindValue(":$key", $value);
                }
    
                // Bind admin_id
                $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
    
                // Execute query
                $stmt->execute();
            } catch (PDOException $e) {
                // Log and rethrow the exception for debugging
                error_log("Database error: " . $e->getMessage());
                throw $e;
            }
        }
    }

    public function updatePassword($newPassword){
        $query = "UPDATE admin SET Password = :password WHERE admin_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':password', $newPassword);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }
}

?>