<!DOCTYPE HTML>
<html>
    <?php
        include 'includes/functions.php';
        include 'includes/head.php';
    ?>
    <body>
    <?php 
        include 'includes/header.php';
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
                <form class="details">
                    <h2>My Details</h2>
                    <div class="form-group">
                        <label for="first-name">First Name:</label> <br>
                        <input type="text" id="first-name" name="first-name" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name:</label> <br>
                        <input type="text" id="last-name" name="last-name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label> <br>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="organization">Organization:</label> <br>
                        <input type="text" id="organization" name="organization" required>
                    </div>
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" onclick="location.href='adminPortal.html';" class="cancel-button">Cancel</button>
                </form>
            </div>
            <div class="user-form">
                <form class="details">
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
        <script src="JavaScript/mydetails.js"></script>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>