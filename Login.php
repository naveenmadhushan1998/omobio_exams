<?php require_once('connection.php'); ?> 
<?php
//check click form submit
if(isset($_POST['submit'])){
	$errors = array();
//check username and password entered
if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1){
	$errors[] = "username invalid or Missing values";
}
if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1){
	$errors[] = "password invalid or Missing values";
}
//check is this page any errors 
if(empty($errors)){


//save username and password in variables
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['password']);


//perpare database query
$query = "SELECT * FROM user WHERE email = '{email}' AND password = '{password}' LIMIT 1";

$result = mysqli_query($connection, $query);

if(mysql_num_rows($result)==1){
        echo "You Have successfull logged in";
        
     
    }
    else{
        echo "You have enterd incorrect password";
        exit();
    }
//check if your is valid

//redirect to user.php 

//if not, Display an error
	}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>New Web</title>
</head>
<body>
	<div class="login">
		<form action="newpage.php" method="post">
			<fieldset>
				<legend><h1>Log In</h1></legend>
				<p class="error">Invalid Username/Password</p>
				<p>
					<label>Username:</label>
					<input type="text" name="email" placeholder="Enter Your Username">
				</p>
				<p>
					<label>Password:</label>
					<input type="password" name="password" placeholder="Enter Your password">
				</p>
				<p><button type="submit" name="submit">Login</button></p>
			</fieldset>
			
		</form>
	</div>
</body>
</html>
<?php mysqli_close($connection); ?>