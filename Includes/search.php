<div class="search">
    <?php
    include_once 'Classes/Database.php';
    $db = new Database();
    $conn = $db->connect();
$queryID = "SELECT * FROM event WHERE Publish = 1 ORDER BY event_id DESC LIMIT 1";
$stmt = $conn->prepare($queryID);
$stmt->execute();
$event = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>
            <p><a href="search.php">Click Here to Search for Students, Pathways, Projects, or Events.</a></p>
            <p><a href="event.php?event_ID=<?php echo $event['event_id'];?>">Click Here to go to the Most Recent Event.</a></p>
        </div>