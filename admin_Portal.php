<!DOCTYPE HTML>
<html>
<?php
        include 'includes/functions.php';
        include 'includes/head.php';
    ?>
    <body>
    <?php 
        include 'includes/header.php';
        include_once 'Classes/Database.php';
        $db = new Database();
        $conn = $db->connect();
        ?>
        <div class="search">
            <p>Search for Students, Pathways, Projects, or Events Below.</p>
            <form method="post" action="search.html" class="search_form">
                <input type="text" class="search_form_input" placeholder="Search...">
                <button type="submit" class="search_form_button" >
                    <img src="Assets/Icons/search-icon.svg" alt="Search">
                </button>
            </form>
            <p><a href="event.html">Click Here to go to the Most Recent Event.</a></p>
        </div>
        <div class="tiles">
            <div class="tile">
                <h2>Welcome, <?php echo $_SESSION['name']; ?></h2>
                <?php 
                    // Get a count for the events
                    $query = "SELECT SQL_CALC_FOUND_ROWS * FROM event";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Get the count
                    $countQuery = "SELECT FOUND_ROWS() AS total";
                    $countStmt = $conn->prepare($countQuery);
                    $countStmt->execute();
                    $count = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];

                    if($count == 0) {
                        echo '<p>There are no events.</p>';
                    } elseif ($event == 1) {
                        echo '<p>There is ' . $count . ' event.</p>';
                    } else {
                        echo '<p>There are ' . $count . ' events.</p>';
                    }
                ?>
            </div>
            <a href="manageUsers.html" class="tile_link">
                    <h2>Manage Users </h2>
                    <div class="tile_sidebyside">
                        <div class="tile_left">
                            <p>View and edit user information.</p>
                        </div>
                        <div class="tile_right">
                            <img src="Assets/Icons/add-user.svg" alt="Add User Icon">
                        </div>
                    </div>  
            </a>
            <a href="myDetails.html" class="tile_link">
                    <h2>My Details</h2>
                    <div class="tile_sidebyside">
                        <div class="tile_left">
                            <p>View and update your personal details.</p>
                        </div>
                        <div class="tile_right">
                            <img src="Assets/Icons/my-details.svg" alt="My Details Icon">
                        </div>
                    </div>
            </a>
            <a href="manageEvents.html" class="tile_link">
                <h2>Manage Events</h2>
                <div class="tile_sidebyside">
                    <div class="tile_left">
                        <p>View and manage events.</p>
                    </div>
                    <div class="tile_right">
                        <img src="Assets/Icons/manage-event.svg" alt="Manage Event Icon">
                    </div>
                </div>
            </a>
        </div>

        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>