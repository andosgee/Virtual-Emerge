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

        $id = $_GET['ID'];
        $queryStudents = "SELECT * FROM students WHERE Student_ID = :id";
        $stmt = $conn->prepare($queryStudents);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        $queryEvents = "SELECT * FROM event WHERE event_id = :eventID";
        $stmt = $conn->prepare($queryEvents);
        $stmt->bindParam(':eventID', $student['Event_ID']);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        $queryAssetsHead = "SELECT * FROM assets WHERE TableRelatesID = :id AND TableRelates = 'students' AND Type = 'Image'";
        $stmt = $conn->prepare($queryAssetsHead);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $headshot = $stmt->fetch(PDO::FETCH_ASSOC);

        $queryAssetsPDF = "SELECT * FROM assets WHERE TableRelatesID = :id AND TableRelates = 'students' AND Type = 'PDF'";
        $stmt = $conn->prepare($queryAssetsPDF);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $pdf = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>
        
        <div class="search_result">
            <div class="bio">
                <div class="bio_image">
                    <img src="<?php echo $headshot['Directory']?>" alt="<?php echo $student['FirstName']. ' '. $student['LastName'];?> Headshot">
                </div>
                <div class="bio_words">
                    <h2><?php echo $student['FirstName']. ' '. $student['LastName'];?></h2>
                    <h3>Pathway: <?php echo $student['Pathway'];?></h3>
                    <h3>Project: <?php echo $student['ProjectName'];?></h3>
                    <h3>Event: <?php echo $event['EventName'];?></h3>
                </div>
            </div>
            
            <div class="file">
                <h2>Poster</h2>
                <iframe src="<?php echo $pdf[0]['Directory'];?>">
                    This browser does not support PDFs. Please download the PDF to view it: 
                    <a href="<?php echo $pdf[0]['Directory'];?>">Download PDF</a>
                </iframe>
                Not Displaying? <a href="<?php echo $pdf[0]['Directory'];?>" target="_blank">Download PDF</a>.
            </div>
            <div class="file">
                <h2>Short Paper</h2>
                <iframe src="<?php echo $pdf[1]['Directory'];?>">
                    This browser does not support PDFs. Please download the PDF to view it: 
                    <a href="<?php echo $pdf[1]['Directory'];?>">Download PDF</a>
                </iframe>
                Not Displaying? <a href="<?php echo $pdf[1]['Directory'];?>" target="_blank">Download PDF</a>.
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>