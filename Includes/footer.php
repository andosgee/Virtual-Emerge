<footer>
            <div class="footer_section">
                <h3>Contact Information &amp; Socials</h3>
                <p>Email: <a href="mailto:email@email">email@email</a></p>
                <p>Phone: <a href="tel:123456789">123456789</a></p>
                <div class="socials">
                    <a href="https://www.facebook.com/AraCanterbury/" target="_blank">
                        <img src="Assets/Icons/facebook.svg" alt="Facebook">
                    </a>
                    <a href="https://www.linkedin.com/ara-institute-of-canterbury" target="_blank">
                        <img src="Assets/Icons/linkedin.svg" alt="LinkedIn">
                    </a>
                    <a href="https://www.ara.ac.nz" target="_blank">
                        <img src="Assets/Icons/website.svg" alt="Website">
                    </a>
                </div>
            </div>
            <div class="footer_section">
                <h3>Admin Area</h3>
                <?php 
                    if (get_active_page() == "Admin Login") {
                        echo "<p><a href='index.php'>Not an admin? Return Home</a></p>";
                    }elseif (isset($_SESSION['ID'])) {
                        echo "<p><a href='admin_portal.php'>Admin Dashboard</a></p>
                            <p><a href='admin_logout.php'>Admin Logout</a></p>";

                    } else {
                        echo "<p><a href='admin_Login.php'>Admin Login</a></p>";
                    }
                ?>
            </div>
            <div class="footer_section">
                <p>&copy; 2024 Ara Institute of Canterbury. All rights reserved.</p>
                <p><a href="terms.html">Terms of Service</a> | <a href="privacy.html">Privacy Policy</a></p>
            </div>
        </footer>