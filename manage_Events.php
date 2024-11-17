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
        <div class="manage-users">
            <div class="user-list">
                <h2>Manage Events</h2>
                <button class="create-user-button">Create New Event</button>
                <ul>
                    <!-- Example user list item -->
                    <li>
                        <span>Emerge 2024, Semester One</span>
                        <button class="edit-user-button">Edit</button>
                        <button class="delete-user-button">Delete</button>
                    </li>
                </ul>
            </div>
            <div class="user-form">
                <h2>Event Details</h2>
                <form class="details">
                    <div class="form-group">
                        <label for="first-name">Event Name:</label>
                        <input type="text" id="event-name" name="event-name" required>
                    </div>
                    <div class="form-group">
                        <label for="event-date">Date:</label>
                        <input type="date" id="event-date" name="event-date">
                    </div>
                    <div class="form-group">
                        <label for="email">Tour Link:</label>
                        <input type="text" id="event-link" name="event-link" required>
                    </div>
                    <div class="form-group">
                        <label for="brochure-pdf">Brochure:</label>
                        <input type="file" id="brochure-pdf" name="brochure-pdf" accept="application/pdf" required>
                    </div>
                    <div class="form-group">
                        <label for="gallery">Gallery:</label>
                        <input type="file" id="gallery" name="gallery" accept="image/*" multiple required>
                    </div>
                    <div class="form-group">
                        <button type="button" class="add-student-button" id="add-student-button">Add Student</button>
                        <button type="button" class="remove-student-button" id="remove-student-button">Remove Student</button>
                    </div>
                    <script src="JavaScript/manageEvents.js"></script>
                    <div class="form-group">
                        <label for="publish">Publish:</label>
                        <input type="checkbox" id="publish" name="publish">
                    </div>
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" onclick="location.href='adminPortal.html';" class="cancel-button">Cancel</button>
                </form>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>