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
            <a class="result" href="searchResult.html" data-date="2024" data-type="student" data-name="Jacob" data-pathway="software">
                <div class="info">
                    <h2>Example Student</h2>
                    <h3>Pathway: Software</h3>
                    <h3>Project: Example</h3>
                    <h3>Event: 2024 Semester 1</h3>
                </div>
                <div class="image">
                    <img src="Assets/Uploads/Headshots/Jacob Klemick.jpg" alt="student">
                </div>
            </a>
            <a class="result" href="event.html" data-date="2024" data-type="Event">
                <div class="info">
                    <h2>Example Event</h2>
                    <h3>Date: 2024</h3>
                    <h3>Semester: 1</h3>
                    <h3>Location: Ara Institute of Canterbury</h3>
                </div>
                <div class="image">
                    <img src="Assets/Carousel/EmergeBanner.png" alt="Event Image">
                </div>
            </a>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>