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
            <p>Search for Students, Pathways, Projects, or Events Below.</p>
            <form method="post" action="search.html" class="search_form">
                <input type="text" class="search_form_input" placeholder="Search...">
                <button type="submit" class="search_form_button" >
                    <img src="Assets/Icons/search-icon.svg" alt="Search">
                </button>
            </form>
            <p><a href="event.html">Click Here to go to the Most Recent Event.</a></p>
        </div>
        <div class="search_result">
            <div class="bio">
                <div class="bio_image">
                    <img src="Assets/Uploads/Headshots/Jacob Klemick.jpg" alt="student">
                </div>
                <div class="bio_words">
                    <h2>Student Name</h2>
                    <h3>Pathway: Software</h3>
                    <h3>Project: Example</h3>
                    <h3>Event: 2024 Semester 1</h3>
                </div>
            </div>
            
            <div class="file">
                <h2>Poster</h2>
                <iframe src="Assets/Uploads/Posters/BCIS309 - Emerge Poster Klemick,Jacob - Sem 1 2024_V3.pdf">
                    This browser does not support PDFs. Please download the PDF to view it: 
                    <a href="Assets/Uploads/Posters/BCIS309 - Emerge Poster Klemick,Jacob - Sem 1 2024_V3.pdf">Download PDF</a>
                </iframe>
                Not Displaying? <a href="Assets/Uploads/Posters/BCIS309 - Emerge Poster Klemick,Jacob - Sem 1 2024_V3.pdf" target="_blank">Download PDF</a>.
            </div>
            <div class="file">
                <h2>Short Paper</h2>
                <iframe src="Assets/Uploads/ShortPapers/BCIS309 - Short Paper - Klemick,Jacob - Sem 1 2024.pdf">
                    This browser does not support PDFs. Please download the PDF to view it: 
                    <a href="Assets/Uploads/ShortPapers/BCIS309 - Short Paper - Klemick,Jacob - Sem 1 2024.pdf">Download PDF</a>
                </iframe>
                Not Displaying? <a href="Assets/Uploads/ShortPapers/BCIS309 - Short Paper - Klemick,Jacob - Sem 1 2024.pdf" target="_blank">Download PDF</a>.
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>