<?php

// Include top
include 'top.php';

// Initialize variables
$records = array();
$i = 0;

// create query showing most recent 6 records
// $query = 'SELECT pmkItemId, fnkUserId, fldTitle, fldAuthorFirstName, fldAuthorLastName, fldISBNNumber, fldSubject FROM tblBooks ';
// $query .= 'ORDER BY pmkItemId DESC LIMIT 6';

// if ($thisDatabaseReader->querySecurityOk($query, 0,1)) {
//     $query = $thisDatabaseReader->sanitizeQuery($query);
//     $records = $thisDatabaseReader->select($query, ''); 
// }

?>

<p>On Tap was started by the shack foundation</p>

<?php

// ********** INCLUDE FOOTER ********** //
include 'footer.php';

?>