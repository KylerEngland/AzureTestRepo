<?php
require_once('UserDB.php');

$database = new UserDB;

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['registerName'], $_POST['registerLastName'], $_POST['registerPassword'], $_POST['registerEmail'])) {
	// Could not get the data that should have been sent.
	exit('	<script type="text/javascript">
				window.onload = function () { alert("Please complete the registration form."); } 
			</script>');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['registerName']) || empty($_POST['registerLastName']) || empty($_POST['registerPassword']) || empty($_POST['registerEmail'])) {
	// One or more values are empty.
	exit('	<script type="text/javascript">
				window.onload = function () { alert("Please complete the registration form."); } 
			</script>');
}

//Email validation
if (!(filter_var($_POST['registerEmail'], FILTER_VALIDATE_EMAIL))) {
	exit('	<script type="text/javascript">
				window.onload = function () { alert("Incorrect email."); } 
			</script>');
}

$database->register($_POST['registerName'], $_POST['registerLastName'], $_POST['registerEmail'], $_POST['registerPassword']);

header('Location: ../loginPage.php');
?>