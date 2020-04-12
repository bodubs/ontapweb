<?php

// Include top
include 'top.php';

// Open state-abbreviations CSV file
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

if($file){
    if($debug) print '<p>Begin reading data into an array.</p>';

    // read the header row, copy the line for each header row
    // you have.
    $headers[] = fgetcsv($file);

    if($debug) {
         print '<p>Finished reading headers.</p>';
         print '<p>My header array</p><pre>';
         print_r($headers);
         print '</pre>';
     }

     // read all the data
     while(!feof($file)){
         $stateDetails[] = fgetcsv($file);
     }

     if($debug) {
         print '<p>Finished reading data. File closed.</p>';
         print '<p>My data array<p><pre> ';
         print_r($stateDetails);
         print '</pre></p>';
     }
}

fclose($file);

?>
<!-- <div id="center-logo">
    <img src="OnTapAdmin-logo.png" alt="ontapadmin logo" id="ontapadmin-logo">
</div> -->
<div id="center-logo">
    <img src="OnTapAdmin-logo.png" alt="ontapadmin logo" id="ontapadmin-logo"><br>
    <ul id="admin-nav">
        <li>Register</li>
        <li>Features</li>
        <li>Download</li>
    </ul>
</div>
<div id="about-admin-section">
    <h2>What is OnTap Admin?</h2>
    <h4>OnTap Admin is the side of OnTap used by bar owners and managers. Bars will register with OnTap (for free!), and be able to control what content goes on your bars unique OnTap page!</h4>
</div>
<div id="register-steps">
    <h2>Want to Get Your Bar on OnTap?</h2>
    <h3>Step 1: Fill out the following form</h3>

    <img src="download-on-the-app-store-apple.svg" alt="apple-app-store-download" id="download-app" class="app-store-download">

    <form id="register-form">
	    <input type="text" placeholder="First Name" name="firstName" class="long-input"><br>
	    <input type="text" placeholder="Last Name" name="lastName" class="long-input"><br>
	    <input type="text" placeholder="Email" name="email" class="long-input"><br>
	    <p id="full-phone-num"><input type="text" placeholder="XXX" name="phone-area-code" class="phone" maxlength="3">-<input type="text" placeholder="XXX" name="phone-exchange-code" class="phone" maxlength="3">-<input type="text" placeholder="XXXX" name="phone-line-number" id="line-num" maxlength="4"></p><br><input type="text" placeholder="Bar Name" name="barName" class="long-input"><br>
	    <input type="text" placeholder="Bar Street Address" name="barAddress" class="long-input">
	    <select name="state">
		    <option value=""></option>
		    <?php

			$lastState="";
			$i = 0;

			foreach($stateDetails as $stateDetail) {
    			if ($i != $stateDetail[count($stateDetails)-1]) {
    				print '<option value="' + $stateDetail[$i]; + '" >' + $stateDetail[$i] + '</option>';
    			}
    			$i+=1;
    		}

		    ?>
		    <!-- NEED TO FILL IN W STATES -->
	    </select>
	    <input type="text" placeholder="Zip Code" name="zipCode" class="long-input"><br>
        <input type="text" placeholder="Optional..." name="comment" id="comment"><br>
	    <input type="button" value="Submit" id="btnSubmit">
    </form>

    <h3>Step 2: Download OnTapAdmin</h3>
    <img src="ontap-admin-app-thumbnail.png" alt="Ontap Admin app thumbnail" id="admin-app-thumbnail"><br>
    <img src="download-on-the-app-store-apple.svg" alt="apple-app-store-download" class="app-store-download">

    <h3>Step 3: Please wait to be contacted by us for verification and log-in information!</h3>
</div>
<div id="admin-features-section-1">
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
    <h1>Reach Your Customers Directly</h1>
    <h3 id="push-noti-desc">Send push notifications to OnTap users letting them know about a special or event going on now!</h3>
</div>
<div id="admin-features-section-3">
    <h1>Update and Control Your Bar's OnTap Page</h1>
    <h3 id="push-noti-desc">Turn the Live Cam On or Off</h3>
    <h3 id="push-noti-desc">Update the content on your bars OnTap page</h3>
</div>

<?php

// ********** INCLUDE FOOTER ********** //
include 'footer.php';

?>