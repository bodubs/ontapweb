<!DOCTYPE html>
<html lang="en">
    <head>
        <title>On Tap</title>
        <meta charset="utf-8">
        <meta name="author" content="Shack Inc.">
        <meta name="description" content="OnTap">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="custom.css" type="text/css" media="screen">

        <?php
 
        // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
        print '<!-- begin including libraries -->';
        
        include 'lib/constants.php';
        
        include 'lib/security.php';
        
        include 'lib/validation-functions.php';

        //include LIB_PATH . '/Connect-With-Database.php';
        
        include 'lib/mail-message.php';

        print '<!-- libraries complete-->';
        
        ?>	

    </head>

    <!-- **********************     Body section      ********************** -->
    <?php
    print '<body id="' . $PATH_PARTS['filename'] . '">';
    
    include 'header.php';
    
    ?>
