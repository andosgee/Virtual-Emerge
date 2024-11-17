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

        <div class="carousel">
            <div class="carousel_image_container">
              <img src="Assets/Carousel/s124group.png" alt="2024 Semester One Students" class="carousel_image active">
              <div class="text_overlay">2024 Semester One Students</div>
            </div>
            <div class="carousel_image_container">
              <img src="Assets/Carousel/EmergeBanner.png" alt="Emerge Banner Image" class="carousel_image">
              <div class="text_overlay"></div>
            </div>
            <button class="carousel_button prev">⟨</button>
            <button class="carousel_button next">⟩</button>
            <script src="JavaScript/carousel.js"></script>
          </div>
        
          <div class="about">
            <h2>About</h2>
            <p>
              Emerge is a showcasing of the work produced by the final year students of the Bachelor of Information and Communication Technologies at Ara Institute of Canterbury. 
              This website is a platform for students to display their work to the public and potential employers that may have missed the physical event.
          </div>

          <div class="upcomingEvents">
            <h2>Upcoming Events</h2>
            <div class="calendar-group">
                <p>
                    The calendar shows the upcoming events for the Emerge showcase.
                </p>
                <iframe src="https://calendar.google.com/calendar/embed?src=78273d231bcb3cc114069dcee66c1962b06e64f1599bc49046f18d7d4f1d5040%40group.calendar.google.com&ctz=Pacific%2FAuckland" style="border: 0" frameborder="0" scrolling="no"></iframe>
            </div>
          </div>

          <div class="contact">
            <h2>Contact</h2>
            <p>
              If you have any questions or would like to get in touch with us about sponsoring a project or to find out more, please email us at 
              <a class="emailLink" href="mailto:email@email">email</a> or phone us on <a class="phoneLink" href="tel:123456789">123456789</a>.
          </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>