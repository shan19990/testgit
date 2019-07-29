<?php
require_once('lib/autoloader.php');

/*
echo $PostRequest->firstname;
echo $PostRequest->lastname;
echo $PostRequest->email;
echo $PostRequest->password;
*/

if(isset($_POST) && !empty($_POST)){
	$Validator->checkNotEmpty('firstname', 'First Name', $PostRequest->firstname);
	$Validator->checkNotEmpty('lastname', 'Last Name', $PostRequest->lastname);
	$Validator->checkNotEmpty('email', 'Email', $PostRequest->email);
	$Validator->checkEmail('email', $PostRequest->email, $PostRequest->email);
	$Validator->checkNotEmpty('password', 'Password', $PostRequest->password);
	$Validator->checkUnique('email', 'email', $PostRequest->email);


	if( $Validator->getIsValid() ){

		// insert
		$Database->insert('asd','asd','asd');


	} else {
		print_r($Validator->getError());
	}
}
print_r($_POST);
$con = new UserInput($_POST['first'],$_POST['last'],$_POST['email'],$_POST['password']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>

	<?php echo Template::formOpen('POST', ''); ?>

		Firstname: <?php echo Template::input('firstname'); ?> <br>
		Lastname: <?php echo Template::input('lastname'); ?><br>
		Email: <?php echo Template::input('email'); ?> <br>
		Password: <?php echo Template::input('password', 'password'); ?><br>
				  <?php echo Template::input('submit','submit'); ?> 

	<?php echo Template::formClose(); ?>

</body>
</html>