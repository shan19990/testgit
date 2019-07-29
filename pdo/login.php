<?php
require_once('lib/autoloader.php');

if(isset($_POST) && !empty($_POST)){
	$Validator->checkNotEmpty('email', 'Email', $PostRequest->email);
	$Validator->checkEmail('email', $PostRequest->email, $PostRequest->email);
	$Validator->checkNotEmpty('password', 'Password', $PostRequest->password);
	$row = $Validator->checkEmail('email', 'email', $PostRequest->email);
	$row = $Validator->checkEmailAndPassword('email', 'email', $PostRequest->email, $PostRequest->password);
		
	if( $Validator->getIsValid() ){
		// session work	
		$Session->user = $row;
		$Session->success_message = "Logged in successfully";
		//Set header for redirect
		//header("Location: profile.php");


		print_r($Session->user);
		exit;

	} else {
		print_r($Validator->getError());
	}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>

	<?php echo Template::formOpen('POST', ''); ?>

		Email: <?php echo Template::input('email'); ?> <br>
		Password: <?php echo Template::input('password', 'password'); ?><br>
				  <?php echo Template::input('submit','submit'); ?> 

	<?php echo Template::formClose(); ?>

</body>
</html>