<!DOCTYPE HTML>
<html>
    <?php
        include 'includes/functions.php';
        include 'includes/head.php';
    ?>
    <body>
    <?php 
        include 'includes/header.php';
        checkAdmin();

        include_once 'Classes/Database.php';
        $db = new Database();
        $conn = $db->connect();

        $query = "SELECT * FROM admin WHERE admin_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $_SESSION['ID']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="search">
            <form method="post" class="search_form">
                <input type="text" class="search_form_input" placeholder="Search...">
                <button type="submit" class="search_form_button">
                    <img src="Assets/Icons/search-icon.svg" alt="Search">
                </button>
            </form>
        </div>
        <div class="manage-users">
            <div class="user-form">
                <form class="details" method="post" action="Includes/updateDetails.php">
                    <h2>My Details</h2>
                    <div class="form-group">
                        <label for="first-name">First Name:</label> <br>
                        <input type="text" id="first-name" name="first-name" value="<?php echo htmlspecialchars($row["FirstName"])?>" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name:</label> <br>
                        <input type="text" id="last-name" name="last-name" value="<?php echo htmlspecialchars($row["LastName"])?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label> <br>
                        <input type="email" id="email" name="email"  value="<?php echo htmlspecialchars($row["Email"])?>" required>
                    </div>
                    <div class="form-group">
                        <label for="organization">Organization:</label> <br>
                        <input type="text" id="organization" name="organization" value="<?php echo htmlspecialchars($row["Organization"])?>" required>
                    </div>
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" onclick="location.href='admin_Portal.php';" class="cancel-button">Cancel</button>
                </form>
            </div>
            <div class="user-form">
                <form class="details" method="post" action="Includes/updatePassword.php">
                    <h2>Change Password</h2>
                    <div class="form-group">
                        <label for="new-password">New Password:</label>
                        <input type="password" id="new-password" name="new-password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="confirm-password" name="confirm-password" required>
                    </div>
                    <button type="submit" class="save-button">Save</button>
                </form>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>