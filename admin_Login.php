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
        <div class="main">
            <div class="login_section">
            <h2>Admin Login</h2>
            <form method="post" action="includes/login_handler.php" class="login_form">
                <div class="form_group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                </div>
                <div class="form_group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                </div>
                <div class="form_group">
                <button type="submit">Login</button>
                </div>
            </form>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>