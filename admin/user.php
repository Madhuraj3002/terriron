<?php

session_start();
$user="root";
$password="";
$db="agri_shop";
$connect=new mysqli("localhost",$user,$password,$db) or die("not connected");

if(isset($_GET['back']))
{
echo ' <script language="javascript" type="text/javascript">
parent.document.location="home.php";
</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 90%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 90%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
/*
#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}*/
</style>
</head>
<body>
<img src="gro.jpg" alt="Nature" class="responsive" width="100%" height="300">
<br><br>

<form method="GET" action="user.php">
<button type="submit" name="back" class="registerbtn">Back</button>
</form>

<center>
<h2>User Details</h2>
</center>
<center>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by names.." title="Type in a name">
<div style="overflow-x:auto;">

<table id="myTable">
  <tr class="header">
	<th style="width:60%;">User Name</th>
	<th style="width:60%;">Email</th>
	<th style="width:60%;">Contact</th>
	<th style="width:60%;">Address</th>
	<th style="width:60%;">Delete</th>

    </tr>
      
         <?php  
		 $user="root";
				$password="";
				$db="agri_shop";
				$connect=new mysqli("localhost",$user,$password,$db) or die("not connected");
				
			$query=mysqli_query($connect,"SELECT * FROM `user_details` WHERE 1 ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
    $uid = $row['id'];
	$name=$row['name'];
    $email=$row['email'];
	$contact=$row['contact'];
	$address=$row['address'];
	
echo" <tr>
      
	<td>$name</td>
    <td>$email</td>
    <td>$contact</td>
	<td>$address</td>
	<td><form method=\"POST\" action=\"user.php\"><input type=\"submit\" name=\"$uid\" value=\"Delete\"onClick=\"document.location.reload(true)\">
	</td>
	</tr>
    ";

	if((isset($_POST[$uid])))
{
	//echo '$id';
	$query=mysqli_query($connect,"DELETE FROM `user_details` WHERE `id`='$uid'") or die(mysqli_error($connect));
	//echo '<script>alert("All buyer id Deleted successfully")</script>';  
echo ' <script language="javascript" type="text/javascript">
alert("User Deleted Successfully");
parent.document.location="user.php";
</script>';

//echo $pid;
break;
}
}
?> 

       
  
</table>
</div>
</center>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
