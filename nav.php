<!-- ######################     Main Navigation   ########################## -->
<nav>
    <ol>
        <?php
        
        print '<li ';
        if ($PATH_PARTS['filename'] == 'index') {
            print ' class="activePage" ';
        }
        print '><a href="index.php">Home</a></li>';
       
        print '<li ';
        if ($PATH_PARTS['filename'] == 'locations') {
            print ' class="activePage" ';
        }
        print '><a href="locations.php">Locations</a></li>';
        
        print '<li ';
        if ($PATH_PARTS['filename'] == 'about') {
            print ' class="activePage" ';
        }
        print '><a href="about.php">About</a></li>';
      
        print '<li ';
        if ($PATH_PARTS['filename'] == 'register') {
            print ' class="activePage" ';
        }
        print '><a href="register.php#center-logo">Register Your Bar</a></li>';
        
        ?>
    </ol>
</nav>
<!-- #################### Ends Main Navigation    ########################## -->
