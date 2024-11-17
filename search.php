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

        $queryStudents = "SELECT * FROM students";
        $stmt = $conn->prepare($queryStudents);
        $stmt->execute();
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $queryEvents = "SELECT * FROM event";
        $stmt = $conn->prepare($queryEvents);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);



        ?>
        
        <div class="search_expanded">
            <form class="search_term">
                <input type="text" name="search" class="search_form_input" placeholder="Search...">
            </form>
            <form class="filter_sort">
                <label for="filter">Filter:</label>
                <select name="filter" id="filter">
                    <option value="none">None</option>
                    <option value="event">Event</option>
                    <option value="student">Student Name</option>
                    <option value="pathway">Pathway</option>
                </select>
                <label for="sort">Sort:</label>
                <select name="sort" id="sort">
                    <option value="relevance">Relevance</option>
                    <option value="date_n2o">Date: New to Old</option>
                    <option value="date_o2n">Date: Old to New</option>
                    <option value="alpha_a2z">Alphabetical: A to Z</option>
                    <option value="alpha_z2a">Alphabetical: Z to A</option>
                </select>
            </form>
            <script src="JavaScript/sort.js">
                
            </script>
        </div>
        <p class="searchMessage">Search and Sort for Students, Pathways, Projects, or Events.</p>
        <div class="search_results">
            <?php foreach($students as $student): 
                $dateQuery = "SELECT * FROM event WHERE event_id = :eventID";
                $stmt = $conn->prepare($dateQuery);
                $stmt->bindParam(':eventID', $student['Event_ID']);
                $stmt->execute();
                $event = $stmt->fetch(PDO::FETCH_ASSOC);
                $name = $event['EventName'];
                $date = new DateTime($event['EventDate']);
                $date = $date->format('Y');
                ?>
            <a class="result" href="search_Result.php?ID=<?php echo $student['student_id'];?>" data-date="<?php echo $date;?>" data-type="student" data-name="<?php echo $student['FirstName']. ' '. $student['LastName'];?>" data-pathway="<?php echo $student['Pathway'];?>">
                <div class="info">
                    <h2><?php echo $student['FirstName']. ' '. $student['LastName'];?></h2>
                    <h3>Pathway: <?php echo $student['Pathway'];?></h3>
                    <h3>Project: <?php echo $student['ProjectName'];?></h3>
                    <h3>Event: <?php echo $name;?></h3>
                </div>
                <div class="image">
                    <img src="Assets/Uploads/Headshots/<?php echo $student['student_id'];?>.jpg" alt="student">
                </div>
            </a>
            <?php endforeach; ?>
            <?php foreach($events as $event):
                $date = new DateTime($event['EventDate']);
                $date = $date->format('Y'); ?>
            
            <a class="result" href="event.php?event_ID=<?php echo $event['event_id'];?>" data-date="<?php echo $date;?>" data-type="Event">
                <div class="info">
                    <h2><?php echo $event['EventName'];?></h2>
                    <h3>Date: <?php echo $date;?></h3>
                    <h3>Location: Ara Institute of Canterbury</h3>
                </div>
                <div class="image">
                    <img src="Assets/Carousel/EmergeBanner.png" alt="Event Image">
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>