<!-- @@@@@@@@@@@@ Close container and main div's @@@@@@@@@@@@@ -->
	</div>
</div>

<!-- @@@@@@@@@@@@@@@@@@@@@@     Footer            @@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<footer <?php 
            if ($PATH_PARTS['filename'] == 'locations') {
                print 'id="margin-top"';
            } 

            if ($PATH_PARTS['filename'] == 'index') {
                print 'id="width-100"';
            }

            ?>>
    <ul id="footer-list">
    	<!-- <li>
    		<ul>
    			<li class="footer-list-titles"><Strong>Contact Us</Strong></li>
    			<li>contact.us.ontap@gmail.com</li>
                <li><br></li>
    		</ul>
    	</li> -->
    	<li>
    		<ul>
    			<li class="footer-list-titles"><Strong>Help</Strong></li>
    			<li><a href="help.php">FAQ</a></li>
                <li><br></li>
                <li><br></li>
    		</ul>
    	</li>
    	<li>
    		<ul>
    			<li class="footer-list-titles"><Strong>Register</Strong></li>
    			<li><a href="register.php#register-steps">Form</a></li>
    			<li><a href="register.php#admin-features-section-1">Services</a></li>
                <li><br></li>
    		</ul>
    	</li>
    	<li>
    		<ul>
    			<li class="footer-list-titles"><Strong>Company</Strong></li>
    			<li><a href="about.php">About Us</a></li>
    			<li><a href="privacy-policy.php">Privacy Policy</a></li>
                <li>contact.us.ontap@gmail.com</li>
    		</ul>
    	</li>
    </ul>
    <p>© 2019 Shack Inc.</p>
</footer>
<!-- @@@@@@@@@@@@@@@@@@@@ Ends Footer             @@@@@@@@@@@@@@@@@@@@@@@@@@ -->
</body>
</html>