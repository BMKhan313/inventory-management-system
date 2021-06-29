<?php
$page = "login";
  // require_once'header.php';
require_once'connect.php';

?>
<?php

if(isset($_POST['login'])){	
			$username  = $_POST['username'];
			$password 	= $_POST['password'];
			$password = md5($password);

			$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$result = $con->query($sql) or die('failed') ;
			
			if( $result->num_rows > 0)
			{
             $row = $result->fetch_assoc();
             session_start();
             $_SESSION['username'] = $row;
             unset($_SESSION['username']['password']);
             header("Location: index.php");

			}else{
				echo"user not found";
			}
}


?>


<!-- styling -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
.form{
	border: 2px solid silver;
	border-radius: 50px;
	/*padding-left: 50%;*/
	/*height: 250px;*/
	padding-left: 80px;
	padding-top: 100px;
	padding-bottom: 100px;
   

}	
.main{
	width: 35%;
	justify-content: center;
	margin-left: 30%;
	margin-top: 70px;
	background-color: silver;
    border-radius: 50px;
}

</style>
<!--  -->
<div class="main">
	
			
	<form action="" method="POST" class="form">
   <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Login Form</h3><hr> 
			
	<label for="username" style="border-radius: 20px;">Username</label>
	<input type="text" name="username"  required="required" style="border-radius: 20px;"><br><br>
	<label for="password" style="border-radius: 20px;">Password</label>
	<input type="password" name="password"  required="required" style="border-radius: 20px;"><br><br>
	<input style="padding: 10px; border-radius: 20px; margin-left: 20%;" type="submit" name="login" value="Login" ><h4>Or</h4>
	<h3>If you dont have acount: <a href="register.php">Register</a></h3><br>
</form>
</div>