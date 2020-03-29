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

<h2>Register</h2>

<form id="register-form">
	<input type="text" placeholder="First Name" name="firstName"><br>
	<input type="text" placeholder="Last Name" name="lastName"><br>
	<input type="text" placeholder="Email" name="email"><br>
	<input type="text" placeholder="Phone" name="phone"><br>
	<input type="text" placeholder="Bar Name" name="barName"><br>
	<input type="text" placeholder="Bar Street Address" name="barAddress">
	<select name="state">
		<option value=""></option>
		<?php

			$lastState="";
			$i = "";

			foreach($stateDetails as $stateDetail) {
    			if ($lastState != "WY"/*$stateDetail[count($stateDetails)-1]*/) {
    				print '<option value="' + $stateDetail[$i]; + '" >' + $stateDetail[$i] + '</option>';
    			}
    			$lastState = $stateDetail;
    		}

		?>
		<!-- NEED TO FILL IN W STATES -->
	</select>
	<input type="text" placeholder="Zip Code" name="zipCode"><br>
	<input type="button" value="Submit">
</form>

<?php

// ********** INCLUDE FOOTER ********** //
include 'footer.php';

?>