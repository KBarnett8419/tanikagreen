<?php
if(isset($_POST['sign-Submit'])){
$allergies='None';
$subject='TGA: CONTRACT SIGNED';
$ToEmail='booking@tanikagreen.com';
$emailm='booking@tanikagreen.com';
$mailheader = "From: ".$emailm."\r\n";
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
$name = $_REQUEST["name"];
$name2 = $_REQUEST["name2"];
$date = $_REQUEST["date"];
$from = $_REQUEST["from"];
$verif_box = $_REQUEST["verif_box"];
$phone=$_POST['phone'];
$address=$_POST['address'];
$allergies=$_POST["allergies"];
// remove the backslashes that normally appears when entering " or '
$name = stripslashes($name);
$name2 = stripslashes($name2);
$phone = stripslashes($phone);
$from = stripslashes($from);
$services=$_COOKIE['service'];
// check to see if verificaton code was correct
if(md5($verif_box).'a4xn' == $_COOKIE['tntcon']){
	// if verification code was correct send the message and show this page
	$message = "
	<br /><br />
	Your contract has been signed by ".$name."<br/>
	<br/>
	Customer Information:<br/>
	Name: ".$name." <br/>
	Email: ".$from."<br/>
	Phone: ".$phone."<br/>
	Address: ".$address."<br/>
  <br/>
	Service(s) Requested: ".$services."<br/>
	Allergies: ".$allergies."<br/>
	<br/>
	Name Used for E-Signature: ".$name2."<br/>
	Date Signed: ".$date."<br/>
<h4>Electronic Signature by ".$name2." acknowledges and agrees with the following Detailed Contract Policy of Tanika Green Artistry:</h4>
<p>
<b>BOOKINGS:</b> To secure a date, a signed contract is required with a 30% deposit due at the time of signing. The deposit is non-refundable and non-transferable. Please be advised date and scheduled makeup times will only be reserved when a signed contract and deposit are received.
<br><br>
<b>BOOKING TIMES:</b> Contract will contain a start time and end time initialed and approved by client. Each makeup requires a certain length of time to be finished and is not to exceed time limit. When reserving your date make sure you book accordingly. Any additional, makeup needs performed outside of contract will only be performed at the discretion of the makeup artist. All other persons involved in makeup appointments need to be available at the scheduled time of said appointment in order to not break the contract. All makeup for more than one person must be at same location and consecutive in time (no gaps in between).
<br><br>
<b>EARLY CALL TIMES:</b> A $25 fee will be charged for booked appointment times before 7:00 am
<br><br>
<b>DELAYS:</b> A late fee of $15 will be charged for every ½ hour of delay when a client is late for scheduled time, or if scheduled makeup exceeds allotted time because of client delays. Contract will state the times late fee will begin and the amount charged and will be initialed and approved by client.
<br><br>
<b>CANCELLATION:</b> All deposit monies paid by client will be refunded if contract is cancelled due to death. If makeup artist cancels at any time or is unable to perform for any reason, 100% of deposit will be refunded within one (1) week. Client agrees that the refund of 100% of the deposit is the only liability to TGA/Tanika Green and employees, and agents.
<br><br>
<b>SERVICE LOCATION & REQUIRMENTS: </b> Location of service for the day-of-event will be at the discretion of the client, but there are certain requirements the makeup artist needs to complete the makeup application: A “setup” table/work area needs to be made available for the artist at said location. Ample lighting is necessary but additional lighting will be provided by artist if necessary for services to be completed.
<br><br>
<b>PARKING FEES:</b> Where parking, valet or toll fees may be incurred, the amount will be included with the final bill and due for payment on the day of the event.
<br><br>
<b>TRAVEL FEE: </b>A flat fee of $25 will be charged to total cost within a 25 mile radius of Newark, NJ. If outside of 25 mile radius, it will be $0.50 per mile.
<br><br>
<b>AIRFARE AND ACCOMDATIONS: </b> All costs for travel to a booked event are to be paid by client. Costs include, but are not limited to: airfare, hotel, transportation, parking, per diem, services, incidentals and all taxes.
<br><br>
<b>LIBIALITY:</b> All brushes and makeup products are kept sanitary and are sanitized between every makeup application. Makeup products used are hypoallergenic. Any skin condition should be reported by the client to the makeup artist prior to services being performed and, if need be a sample test of makeup may be performed on the skin to test reaction. TGA/Tanika Green and all employees and agents are exempt from the liability for any skin complication due to allergic reactions as a result of not informing TGA/Tanika Green of allergies.
<br><br>
<b>PAYMENT:</b>  The final balance is due on the day of the event – <span>no exceptions</span>. The person(s) responsible for the entire balance of payment is the person(s) that has a signed booking contract. Acceptable forms of payment are: cash, credit or payment through PayPal. For all credit card payments, a 3% service will be added to each transaction.
 </p>
	<br/><br/>
	Please retain a copy for your records. <br/>
	<br/>
	<p><b>TANIKA GREEN</b><br>
	Professional Makeup Artist<br>
	973-207-3834<br>
	booking@tanikagreen.com<br>
	www.tanikagreen.com</p>";
	mail($ToEmail, $subject, $message, $mailheader);
	$email_to = ".$from.";
	// delete the cookie so it cannot sent again by refreshing this page
	setcookie('tntcon','');
	header('Location: thanks.html'); //Replace with your domain or with thank you page
} else {
	// if verification code was incorrect then return to contact page and show error
	header("Location:".$_SERVER['HTTP_REFERER']."?subject=$subject&from=$from&message=$message&wrong_code=true");
	exit;
}
}
?>
