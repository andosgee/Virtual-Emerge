<!DOCTYPE HTML>
<html>
    <?php
        include 'includes/functions.php';
        include 'includes/head.php';
    ?>
    <body>
    <?php 
        include 'includes/header.php';
        include 'includes/search.php';
        ?>
        
        <div class="manage-users">
            <div class="user-list">
                <h2>Manage Users</h2>
                <button class="create-user-button">Create New User</button>
                <ul>
                    <!-- Example user list item -->
                    <li>
                        <span>John Doe</span>
                        <button class="edit-user-button">Edit</button>
                        <button class="delete-user-button">Delete</button>
                    </li>
                </ul>
            </div>
            <div class="user-form">
                <h2>User Details</h2>
                <form class="details">
                    <div class="desktop-form">
                        <div class="form-group">
                            <label for="first-name">First Name:</label>
                            <input type="text" id="first-name" name="first-name" required>
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name:</label>
                            <input type="text" id="last-name" name="last-name" required>
                        </div>
                    </div>
                    <div class="desktop-form">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="organization">Organization:</label>
                        <input type="text" id="organization" name="organization" required>
                    </div>
                    </div>
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="reset-password-button">Reset Password</button>
                    <button type="button" onclick="location.href='adminPortal.html';" class="cancel-button">Cancel</button>
                </form>
            </div>
        </div>
        <script src="JavaScript/manageUsers.js"></script>

        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>