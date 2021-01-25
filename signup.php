<?php require_once('connection.php'); ?> 

<?php


$first_name = (isset($_POST['fname']));
$last_name = (isset($_POST['lname']));
$email = (isset($_POST['email']));
$password = (isset($_POST['password']));

$query = "SELECT * FROM user WHERE first_name = '{$first_name}'";

$result = mysqli_query($connection,$query);

$num = mysqli_num_rows($result);
$errors = array();

if($num == 1){
	echo "Username already taken";
}
else{
	$reg = "INSERT INTO user(first_name, last_name, email, password) VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$password}')";
	mysqli_query($connection, $reg);
	echo "Registeration Sucsessfull";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>
	<div class="signup">
		<form action="signup.php" method="post">
			<fieldset>
				<legend><h1>Sign In</h1></legend>
				<p class="error">Fill all blanks</p>
				<p>
					<label>First Name:</label>
					<input type="text" name="fname" placeholder="First name">
				</p>
				<p>
					<label>Last name:</label>
					<input type="text" name="lname" placeholder="Last name">
				</p>
				<p>
					<label>Email:</label>
					<input type="email" name="email" placeholder="Email Address">
				</p>
				<p>
					<label>Password:</label>
					<input type="password" name="password" placeholder="Enter Password">
				</p>

				<p><button type="submit" name="submit">SignUp</button></p>
			</fieldset>
			
		</form>
	</div>
</body>
</html>
<?php mysqli_close($connection); ?>