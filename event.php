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
        include_once 'Classes/Database.php';
        $db = new Database();
        $conn = $db->connect();

        $eventID = $_GET['event_ID'];
        $query = "SELECT * FROM event WHERE event_id = :eventID";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':eventID', $eventID);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="event">
            <h2><?php echo $event["EventName"];?></h2>
            <iframe src="<?php echo $event['TourLink'];?>" frameborder="0" scrolling="no" allow="vr,gyroscope,accelerometer" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true" msallowfullscreen="true"></iframe>
            <h3>Instructions</h3>
            Click and drag to look around the room. Use the mouse wheel to zoom or pinch to zoom. 
            <br>
            Click the orange targets to navigate the rooms. Hover over the orange speech bubbles
            to see the file name, click it to expand it and view the file. 
            <br>
            On the pop-up, use the PDF viewer to view the file or view it larger.
        </div>

        <div class="gallery">
            <?php 
                $query = "SELECT Directory FROM assets WHERE TableRelatesID = :eventID AND Type = 'Image' AND TableRelates = 'event'";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':eventID', $eventID);
                $stmt->execute();
                $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <h3>Image Gallery</h3>
            <div class="main-image">
                <img id="bigImage" src="<?php echo $images[0]['Directory'];?>" alt="Main Image">
            </div>
            <div class="thumbnails">
            <?php foreach($images as $image):?>
                <img class="thumbnail" src="<?php echo $image['Directory'];?>" alt="Thumbnail 1" onclick="updateMainImage('<?php echo $image['Directory'];?>')">
            <?php endforeach;?>
            </div>
        </div>

        <script src="JavaScript/gallery.js"></script>

        <div class="event_brochure">
            <h3>Event Brochure</h3>
            <?php 
            $pdfQuery = "SELECT Directory FROM assets WHERE TableRelatesID = :eventID AND Type = 'PDF' AND TableRelates = 'event'";
            $stmt = $conn->prepare($pdfQuery);
            $stmt->bindParam(':eventID', $eventID);
            $stmt->execute();
            $pdf = $stmt->fetch(PDO::FETCH_ASSOC);

            ?>
            <iframe src="<?php echo $pdf['Directory']?>" frameborder="0" scrolling="no" width="100%" height="600px"></iframe>
            Not Displaying? <a href="<?php echo $pdf['Directory']?>" target="_blank">Download PDF.</a>
        </div>
        
        <div class="event_students">
            Event not loading? Look at the students' work below:
            <ul>
                <?php 
                $studentQuery = "SELECT * FROM students WHERE Event_ID = :eventID";
                $stmt = $conn->prepare($studentQuery);
                $stmt->bindParam(':eventID', $eventID);
                $stmt->execute();
                $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($students as $student):?>
                <li><a href="search_Result.php?ID=<?php echo $student['student_id']?>"><?php echo $student['FirstName']. ' '.$student['LastName'];?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>