<?php
if(isset($_POST['submit'])){
	if(!empty($_POST['service'])) {
/*Checking whether Quantity for Bride Service is not null
*
*/
if(!empty($_POST['quantity1'])){
	$q1=$_POST['quantity1'];
	setcookie( "q1", $q1, time() + 360000 );
}
if(!empty($_POST['quantity2'])){
		$q2=$_POST['quantity2'];
		setcookie( "q2", $q2, time() + 360000 );
}
if(!empty($_POST['quantity3'])){
			$q3=$_POST['quantity3'];
			setcookie( "q3", $q3, time() + 360000 );
}
if(!empty($_POST['quantity4'])){
				$q4=$_POST['quantity4'];
				setcookie( "q4", $q4, time() + 360000 );
}

// Counting number of checked checkboxes.
			$service = implode(', ', $_POST['service']);
			setcookie( "service", $service, time() + 360000 );
			$checked_count = count($_POST['service']);
			echo "<b>You have selected following ".$checked_count." option(s): </b><br/>";
// Loop to store and display values of individual checked checkbox.
			foreach($_POST['service'] as $selected) {
				echo "<p>".$selected ."</p>";
			}
			echo "<b>Please read and sign the contract below.</b>";
		}
		else{
			echo "<b>Please select at least one option.</b>";
		}
	}
	?>
