<?php
if(isset($_POST['submit'])){
if(!empty($_POST['service'])) {
// Counting number of checked checkboxes.
$checked_count = count($_POST['service']);
echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['service'] as $selected) {
echo "<p>".$selected ."</p>";
}
/*Email function*/
	$selectedProjects = implode(', ', $_POST['service']);
	$emailm='keribarnett_7@yahoo.com';
	$ToEmail ='keribarnett_7@yahoo.com'; 
	$EmailSubject ="Service Request";
	$mailheader = "From: ".$emailm."\r\n";
	$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$MESSAGE_BODY = "
	Hello,
	<br /><br />
	You have a service Request for<br/><br/>
	".$selectedProjects."
	<br /><br />
	Thank you!";
	mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);
/*Email function End*/
echo "Please read and sign the contract below.";
}
else{
echo "<b>Please select at least one option.</b>";
}
}

?>
