<?php

session_start();
$user="root";
$password="";
$db="agri_shop";
$conn=new mysqli("localhost",$user,$password,$db) or die("not connected");


if(isset($_GET['login']))
{
if((isset($_GET['user']))&&(isset($_GET['pswd'])))
{
	
	$id=$_GET['user'];
    $pswd=$_GET['pswd'];
    echo $id;
	echo $pswd;
  $query=mysqli_query($conn,"SELECT * FROM `supplier_details` WHERE  `email`='$id' && `password`='$pswd'") or die(mysqli_error($conn));
    $row=mysqli_fetch_array($query);
  
  $ids=$row['id'];
  echo $ids;
  $name=$row['email'];
  $password=$row['password'];

   echo $name;
	echo $password;
 
if(($id==$name)&&($password==$pswd))
{
  $query=mysqli_query($conn,"UPDATE `supplier_id` SET `id`='$ids' ") or die(mysqli_error($conn));
  
	echo ' <script language="javascript" type="text/javascript">
alert("Hello '.$name.' You are logged in");
parent.document.location="home.php";
</script>';
}
else {
  $message = "User Email or Password invalid.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
  
}
else {
  $message = "Please fill all fields";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
}
 
 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="index.php" method="GET">
  <div class="container">
<center>   
   <h1>Login</h1>
</center>
    <hr>
  <center><img src="grp.png" alt="Avatar" class="avatar" height="10%" width="10%">
   </center>
    <label for="id"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="user" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pswd" id="psw" required>

    <button type="submit" name="login" class="registerbtn">Login</button>
  </div>
  
  <div class="container signin">
    <p>Want to Sign Up for a new account? <a href="student_reg.php">Sign up</a>.</p>
  </div>
  
</form>

</body>
</html>
