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
        <div class="event">
            <h2>Virtual &lt;EMERGE&gt; Event for 2024, Semester 1</h2>
            <iframe src="https://app.lapentor.com/sphere/example-project-1730172235" frameborder="0" scrolling="no" allow="vr,gyroscope,accelerometer" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true" msallowfullscreen="true"></iframe>
            <h3>Instructions</h3>
            Click and drag to look around the room. Use the mouse wheel to zoom or pinch to zoom. 
            <br>
            Click the orange targets to navigate the rooms. Hover over the orange speech bubbles
            to see the file name, click it to expand it and view the file. 
            <br>
            On the pop-up, use the PDF viewer to view the file or view it larger.
        </div>

        <div class="gallery">
            <h3>Image Gallery</h3>
            <div class="main-image">
                <img id="bigImage" src="Assets/Uploads/Gallery/IMG_1908.jpg" alt="Main Image">
            </div>
            <div class="thumbnails">
                <img class="thumbnail" src="Assets/Uploads/Gallery/IMG_1908.jpg" alt="Thumbnail 1" onclick="updateMainImage('Assets/Uploads/Gallery/IMG_1908.jpg')">
                <img class="thumbnail" src="Assets/Uploads/Gallery/IMG_1909.jpg" alt="Thumbnail 2" onclick="updateMainImage('Assets/Uploads/Gallery/IMG_1909.jpg')">
                <img class="thumbnail" src="Assets/Uploads/Gallery/IMG_1938.jpg" alt="Thumbnail 3" onclick="updateMainImage('Assets/Uploads/Gallery/IMG_1938.jpg')">
                <img class="thumbnail" src="Assets/Uploads/Gallery/IMG_1940.jpg" alt="Thumbnail 4" onclick="updateMainImage('Assets/Uploads/Gallery/IMG_1940.jpg')">
            </div>
        </div>

        <script src="JavaScript/gallery.js"></script>

        <div class="event_brochure">
            <h3>Event Brochure</h3>
            <iframe src="Assets/Uploads/Brochures/2024 Sem 1.pdf" frameborder="0" scrolling="no" width="100%" height="600px"></iframe>
            Not Displaying? <a href="Assets/Uploads/Brochures/2024 Sem 1.pdf" target="_blank">Download PDF.</a>
        </div>
        
        <div class="event_students">
            Event not loading? Look at the students' work below:
            <ul>
                <li><a href="searchResult.html">Example Student 1</a></li>
                <li><a href="searchResult.html">Example Student 2</a></li>
                <li><a href="searchResult.html">Example Student 3</a></li>
                <li><a href="searchResult.html">Example Student 4</a></li>
                <li><a href="searchResult.html">Example Student 5</a></li>
                <li><a href="searchResult.html">Example Student 6</a></li>
            </ul>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>