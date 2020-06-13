<?php

// Include top
include 'top.php';

$thisURL = DOMAIN . PHP_SELF;

// ****************** initialize variables ****************** //
$firstName = '';
$lastName = '';
$email = '';
$phone = '';
$areaCode = '';
$exchangeCode = '';
$lineNumber = '';
$chkEmail = '';
$chkPhone = '';
$barName = '';
$barAddress = '';
$barCity = '';
$barState = '';
$barZip = '';
$callTime = '';



// ****************** initialize error variables ****************** //
$firstNameError = false;
$lastNameError = false;
$emailError = false;
$phoneError = false;
$barNameError = false;
$barAddressError = false;
$barStateError = false;
$barZipError = false;

// ****************** initialize misc variables and arrays ****************** //
$dataEntered = false;
$records = false;
$createAccountResults = false;
$errorMsg = array();
$prefContactData = array();
$mailedToUs = false;



// OPEN AND READ STATE ABBREVIATIONS CSV FILE //
$debug = false;
if(isset($_GET["debug"])){
     $debug = true; 
}

$myFolder = '';

$myFileName = 'state-abbreviations';

$fileExt = '.csv';

$filename = $myFolder . $myFileName . $fileExt;

if ($debug) print '<p>filename is ' . $filename;

$file=fopen($filename, "r");

if($debug){
    if($file){
       print '<p>File Opened Succesful.</p>';
    }else{
       print '<p>File Open Failed.</p>';
     }
}

if($file) {

    // read all the data
    while(!feof($file)){
        $stateDetails[] = fgetcsv($file);
    }

    fclose($file);
}

?>






<div id="center-logo">
    <img src="whatsontapadmin-logo.png" alt="ontapadmin logo" id="ontapadmin-logo"><br>
    <ul id="admin-nav">
        <li><a href="#register-steps">Register</a></li>
        <li><a href="#admin-features-section-1">Features</a></li>
        <li>Download</li>
    </ul>
</div>
<!-- <div id="about-admin-section" name="register-steps">
    <h2>What is OnTap Admin?</h2>
    <h4>OnTap Admin is the counterpart to OnTap for bar owners and managers. Bars will register with OnTap (for free!), and be able to control what content goes on your bars unique OnTap page!</h4>
</div> -->
<div id="register-steps">
    <h2>Want to Get Your Bar on WhatsOnTap?</h2>

<?php

// ***************** PROCESS FOR CREATING ACCOUNT ****************** //

if (isset($_POST['btnSubmit'])) {
    
    // ******************* initialize data array ******************** //
    $data = array();
    
    // ****************** sanitize data ****************** //
    
    $firstName = htmlentities($_POST["txtFirstName"], ENT_QUOTES, "UTF-8");
    
    $lastName = htmlentities($_POST["txtLastName"], ENT_QUOTES, "UTF-8");
    
    $email = htmlentities($_POST["txtEmail"], ENT_QUOTES, "UTF-8");
    
    $areaCode = htmlentities($_POST["phone-area-code"], ENT_QUOTES, "UTF-8");

    $exchangeCode = htmlentities($_POST["phone-exchange-code"], ENT_QUOTES, "UTF-8");

    $lineNumber = htmlentities($_POST["phone-line-number"], ENT_QUOTES, "UTF-8");

    $phone = $areaCode . $exchangeCode . $lineNumber;

    if (isset($_POST["chkEmail"])){
        $prefContactData[] = "Email";         
    }

    if (isset($_POST["chkPhone"])){
        $prefContactData[] = "Phone";         
    }

    $barName = htmlentities($_POST["txtBarName"], ENT_QUOTES, "UTF-8");
    
    $barAddress = htmlentities($_POST["txtBarAddress"], ENT_QUOTES, "UTF-8");

    $barCity = htmlentities($_POST["txtBarCity"], ENT_QUOTES, "UTF-8");
    
    $barState = htmlentities($_POST["lstBarState"], ENT_QUOTES, "UTF-8");

    $barZip = htmlentities($_POST["txtBarZip"], ENT_QUOTES, "UTF-8");
    
    
    // **************** INPUT VALIDATION ***************** //
    
    if ($firstName == '') {
        $errorMsg[] = 'Please enter your first name.';
        $firstNameError = true;
    } elseif (!preg_match("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $firstName)) {
        $errorMsg[] = "Your first name appears to have extra characters.";
        $firstNameError = true;
    } else {
        $data[] = $firstName;
    }
    
    if ($lastName == '') {
        $errorMsg[] = 'Please enter your last name.';
    } elseif (!preg_match("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $lastName)) {
        $errorMsg[] = "Your first name appears to have extra characters.";
        $lastNameError = true;
    } else {
        $data[] = $lastName;
    }
    
    if ($email == '') {
        $errorMsg[] = 'Please enter your email so we can contact you.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg[] = 'Your email address appears to be incorrect.';
        $emailError = true;
    }
    
    // if ($phone != '') {
    //     $errorMsg[] = 'Please enter your phone number.';
    // } else {
    //     $data[] = $phone;
    // }

    if (is_null($prefContactData[0])) {
        $errorMsg[] = 'Please choose your prefered form of contact.';
    }

    if ($barName == '') {
        $errorMsg[] = 'Please enter the name of your establishment.';
    }

    if ($barAddress == '') {
        $errorMsg[] = 'Please enter the address of your bar.';
    }

    if ($barCity == '') {
        $errorMsg[] = 'Please enter the city in which your bar operates.';
    }

    // if ($barState == '') {
    //     $errorMsg[] = 'Please select the state in which your bar operates.';
    // }

    if ($barZip == '') {
        $errorMsg[] = 'Please enter the zip code in which your bar operates.';
    } elseif(preg_match("/[a-z]/i", $barZip)) {
        $errorMsg[] = 'It appears your zip code is invalid.';
        $barZipError = true;
    }
    
    if (!$errorMsg) { // IF DATA IS VALID
        
        // ***************** SEND MAIL TO OnTap ******************* //
        
        $ourMessage = "New account has registered for WhatsOnTap Admin.
                    Name of Person: " . $firstName . " " . $lastName . "
                    Email: " . $email . "
                    Phone: " . $areaCode . "-" . $exchangeCode . "-" . $lineNumber . "
                    Prefered Form of Contact: " . $chkEmail . " " . $chkPhone . "
                    Bar Name: " . $barName . "
                    Bar Address: " . $barAddress . ", " . $barCity . ", " . $barState . " " . $barZip;
        
        $to = 'contact.us.ontap@gmail.com';
        $cc = '';
        $bcc = '';
        
        $from = $email;
        
        $subject = 'New Account Registered';


        mail("contact.us.ontap@gmail.com", "New Account Registered", $ourMessage);
  

        // ***************** SEND MAIL TO USER ******************* //

        $message = "Hello, " . $firstName . "
                    Congratulations, you have just registered your bar with WhatsOnTap Admin! If any of the following information is incorrect, please email us at contact.us.ontap@gmail.com:
                    Name of Person: " . $firstName . " " . $lastName . "
                    Email: " . $email . "
                    Phone: " . $areaCode . "-" . $exchangeCode . "-" . $lineNumber . "
                    Bar Name: " . $barName . "
                    Bar Address: " . $barAddress . ", " . $barCity . ", " . $barState . " " . $barZip . "
                    We will contact you soon for verification and then we can move forward with the registration process! Talk to you soon and we hope you have a wonderful day!";
        
        $to = $email;
        $cc = '';
        $bcc = '';
        
        $from = 'WhatsOnTap <contact.us.ontap@gmail.com>';
        
        $subject = 'Thank you for Registering for WhatsOnTap Admin!';
        
        //$mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);

        $dataEntered = true;
        
    } // END IF DATA IS VALID
} // END IF CREATE ACCOUNT BUTTON

if ($dataEntered) { // IF CREATE ACCOUNT SUCCESSFULL
    
    print '<h3 id="single-title">Thank you for registering for WhatsOnTap Admin, ' . $firstName . '!<br><br>Please follow the remaining steps!</h3>';
    
} else { // IF DATA NOT ENTERED

    print '<h3>Step 1: Fill out the following form</h3>';

    
    
    if ($errorMsg) { // DISPLAY ERROR MESSAGES
        print '<div id="form-errors-div">';
        print '<p class="errors" id="errors-header">Oops! There seems to be a problem with your form:</p>';
        print '<ul class="errors">' . PHP_EOL;
        
        foreach ($errorMsg as $err) {
            print '<li>' . $err . '</li>' . PHP_EOL;
        }
        
        print '</ul>' . PHP_EOL;
        print '</div>';
    }

    
?>


<form action="#register-steps" method="post" id="register-form">
    
    <!-- ***************** first name text box ****************** -->
    <label class="required-field-star">*</label><label for="txtFirstName">First Name: </label><input type="text" placeholder="" maxlength="60" id="txtFirstName" name="txtFirstName" class="long-input"
        <?php
        print ' value="' . $firstName . '"';
        ?>
            ><br>
    
    <!-- ***************** last name text box ****************** -->
    <label class="required-field-star">*</label><label for="txtLastName">Last Name: </label><input type="text" placeholder="" maxlength="60" id="txtLastName" name="txtLastName" class="long-input"
        <?php
        print ' value="' . $lastName . '"';
        ?>
            ><br>
    
    <!-- ***************** email text box ****************** -->
    <label class="required-field-star">*</label><label for="txtEmail">Email: </label><input type="text" placeholder="" maxlength="60" id="txtEmail" name="txtEmail" class="long-input"
        <?php
        print ' value="' . $email . '"';
        ?>
            ><br>

    <!-- ***************** phone text box ****************** -->
    <p id="full-phone-num"><label class="required-field-star">*</label><label for="txtPhone">Phone: </label>
        <input type="text" placeholder="XXX" name="phone-area-code" class="phone" maxlength="3"
            <?php
            print ' value="' . $areaCode . '"';
            ?>
        >-<input type="text" placeholder="XXX" name="phone-exchange-code" class="phone" maxlength="3"
            <?php
            print ' value="' . $exchangeCode . '"';
            ?>
        >-<input type="text" placeholder="XXXX" name="phone-line-number" id="line-num" maxlength="4"
            <?php
            print ' value="' . $lineNumber . '"';
            ?>
        >
    </p><br>

    <p><label class="required-field-star">*</label>Prefered Form of Contact:</p>

    <input type="checkbox" name="chkEmail" value="chkEmail">
    <label for="chkEmail">Email</label>
    <input type="checkbox" name="chkPhone" value="chkPhone">
    <label for="chkPhone">Phone</label><br>


    <p>If you checked phone, how would you prefer we reach you:</p>

    <input type="checkbox" name="chkCall" value="chkCall">
    <label for="chkCall">Call</label>
    <input type="checkbox" name="chkText" value="chkText">
    <label for="chkText">Text</label><br> 


    <label for="callTime">If you chose call, please list a date and time that works for you:</label>

    <input type="text" placeholder="Ex) July 1 at 1:15 PM" maxlength="60" id="txtCallTime" name="txtCallTime" class="long-input"
        <?php
        print ' value="' . $callTime . '"';
        ?>
            ><br>
    

    <label class="required-field-star">*</label><label for="txtBarName">Bar Name:</label><input type="text" placeholder="" maxlength="60" id="txtBarName" name="txtBarName" class="long-input"
        <?php
        print ' value="' . $barName . '"';
        ?>
            ><br>
    
    <label class="required-field-star">*</label><label for="txtBarAddress">Bar Address:</label><input type="text" placeholder="" maxlength="60" id="txtBarAddress" name="txtBarAddress" class="long-input"
        <?php
        print ' value="' . $barAddress . '"';
        ?>
            >

    <label class="required-field-star">*</label><label for="txtBarCity">Bar City:</label><input type="text" placeholder="" maxlength="60" id="txtBarCity" name="txtBarCity" class="long-input"
        <?php
        print ' value="' . $barCity . '"';
        ?>
            >

    <label class="required-field-star">*</label><label for="txtBarState">State:</label>
            <select name="lstBarState">
                <option value=""></option>

            <?php
                foreach($stateDetails as $stateDetail) {
                    print '<option value="' . $barState . '">' . $stateDetail[0] . '</option>';
                }
            ?>

            </select>

    <label class="required-field-star">*</label><label for="txtBarZip">Bar Zip Code:</label><input type="text" placeholder=""maxlength="5" id="txtBarZip" name="txtBarZip"
        <?php
        print ' value="' . $barZip . '"';
        ?>
            ><br>
    
    
    
    <!-- ***************** submit button ****************** -->
    <input type="submit" name="btnSubmit" value="Submit" tabindex="900" id="btnSubmit">

</form>


<?php

} // END IF DATA NOT ENTERED

?>

<h3>Step 2: Download WhatsOnTap Admin</h3>
    <!-- <img src="ontap-admin-app-thumbnail.png" alt="Ontap Admin app thumbnail" id="admin-app-thumbnail"><br> -->
    <img src="download-on-the-app-store-apple.svg" alt="apple-app-store-download" class="app-store-download">

    <h3>Step 3: Please wait to be contacted by us for verification and log-in information!</h3>
</div>
<div id="admin-features-section-1" name="features">
    <div id="admin-features-left">
        <div id="admin-features-desc-1">
            <h3 class="desc-title">Keep Info Current</h3>
            <p class="admin-features-desc">You have the ability to add, edit, and delete information like hours, specials, and events!</p>
        </div>
    </div>
    <div id="admin-features-center">
    <img src="ontap-features-title.png" alt="OnTap Features Title" class="info-titles"/>
    <img src="admin-specials-ui-view.png" alt="OnTap Admin Specials View" class="user-view"/>
    <img src="admin-input-info-ui-view.png" alt="OnTap Admin Input Specials Info View" class="user-view"/>
    </div>
    <div id="admin-features-right">
        <div id="admin-features-desc-2">
            <h3 class="desc-title">Easy to Input</h3>
            <p class="admin-features-desc">Quickly and easily input information!</p>
        </div>
    </div>
</div>
<div id="admin-features-section-2">
    <div id="admin-feat-2-left">
        <h1>Reach Your Customers Directly</h1>
        <h3 id="push-noti-desc">Send push notifications to WhatsOnTap users letting them know about a special or event going on now!</h3>
    </div>
    <div id="admin-feat-2-right">
        <img src="push-notification.png" alt="Push Notification Example" class="user-view" id="admin-push-noti"/>
    </div>
</div>
<div id="admin-features-section-3">
    <div id="admin-feat-3-left">
        <img src="admin-index-view.png" alt="OnTap Admin Index View" class="user-view" id="admin-index-view"/>
    </div>
    <div id="admin-feat-3-right">
        <h1>Easily Manage Your Page</h1>
        <h3>Turn the Live Cam On or Off</h3>
        <h3>Update the content on your bars WhatsOnTap page</h3>
    </div>

</div>

<?php

// ********** INCLUDE FOOTER ********** //
include 'footer.php';


?>