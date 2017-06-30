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
echo "Please read and sign the contract below.";
}
else{
echo "<b>Please select at least one option.</b>";
}
}
//form printing to email
$your_email ='booking@tanikagreen.com';// <<=== update to your email address

session_start();
$errors = '';
$name = '';
$email = '';
$message = '';

if(isset($_POST['sign_submit']))
{

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['subject'];
	$allergies = $_POST['allergies'];
	///------------Do Validations-------------
	if(empty($name)||empty($email))
	{
		$errors .= "\n Name and Email are required fields. ";
	}
	if(IsInjected($email))
	{
		$errors .= "\n Bad email value!";
	}
	if(empty($_SESSION['letter-code'] ) ||
	  strcasecmp($_SESSION['letter-code'], $_POST['letter-code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "\n The captcha code does not match!";
	}

	if(empty($errors))
	{
		//send the email
		$to = $your_email;
		$subject="$name has just signed your contract\n";
		$from = $your_email;
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';

		$body = "$name submitted their signed contract form\n".
		"Name: $name\n".
		"Email: $email \n".
    "Phone Number: $phone \n".
    "Allergies: $allergies \n".

		"Selected Services: \n ".
    foreach($_POST['service'] as $selected) {
    echo "<p>".$selected ."</p>";
    }

		"IP: $ip\n";

		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $email \r\n";

		mail($to, $subject, $body,$headers);

		header('Location: thanks.html');
	}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Contact Us</title>
<!-- define some style elements-->
<style>
label,a, body
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 12px;
}
.err
{
	font-family : Verdana, Helvetica, sans-serif;
	font-size : 12px;
	color: red;
}
</style>
<!-- a helper script for vaidating the form-->
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
</head>

<body>
<?php
if(!empty($errors)){
echo "<p class='err'>".nl2br($errors)."</p>";
}
?>
<div id='contact_form_errorloc' class='err'></div>
<form method="POST" name="contact_form"
action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<p>
<label for='name'>Name: </label><br>
<input type="text" name="name" value='<?php echo htmlentities($name) ?>'>
</p>
<p>
<label for='email'>Email: </label><br>
<input type="text" name="email" value='<?php echo htmlentities($email) ?>'>
</p>
<p>
<label for='message'>Message:</label> <br>
<textarea name="message" rows=8 cols=30><?php echo htmlentities($message) ?></textarea>
</p>
<p>
<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
<label for='message'>Enter the code below here :</label><br>
<input id="letter-code" name="letter-code" type="text"><br>
<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
</p>
<input type="submit" value="Submit" name='submit'>
</form>
<script language="JavaScript">
// Code for validating the form
// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
// for details
var frmvalidator  = new Validator("contact_form");
//remove the following two lines if you like error message box popups
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("name","req","Please provide your name");
frmvalidator.addValidation("email","req","Please provide your email");
frmvalidator.addValidation("email","email","Please enter a valid email address");
</script>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
?>
