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

<form method="GET" action="transaction.php">
<button type="submit" name="back" class="registerbtn">Back</button>
</form>

<center>
<h2>Transaction</h2>
</center>
<center>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Agri Product names.." title="Type in a name">
<div style="overflow-x:auto;">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Product Name</th>
	<th style="width:60%;">Price per kg/litre</th>
	<th style="width:60%;">User Name</th>
	<th style="width:60%;">Email</th>
	<th style="width:60%;">Contact</th>
	<th style="width:60%;">Address</th>
	<th style="width:60%;">Supplier Name</th>
	<th style="width:60%;">Email</th>
	<th style="width:60%;">Contact</th>
	<th style="width:60%;">Address</th>
	<th style="width:60%;">Purchased Quantity in kg/litre</th>
	<th style="width:60%;">Total Amount</th>
	<th style="width:60%;">Admin Commision</th>
	<th style="width:60%;">Date</th>
	
	</tr>
      
         <?php  
		 $user="root";
				$password="";
				$db="agri_shop";
				$connect=new mysqli("localhost",$user,$password,$db) or die("not connected");
				$query=mysqli_query($connect,"SELECT * FROM `supplier_id` WHERE 1 ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
    $sid = $row['id'];
}
			$query=mysqli_query($connect,"SELECT * FROM `transaction` WHERE 1 ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
$pid = $row['id'];
	$gname=$row['gname'];
    $price=$row['price'];
	$uname=$row['uname'];
    $uemail=$row['uemail'];
	$ucontact=$row['ucontact'];
	$uaddress=$row['uaddress'];
	$sname=$row['sname'];
    $semail=$row['semail'];
	$scontact=$row['scontact'];
	$saddress=$row['saddress'];

	$quantity=$row['quantity'];
	$totalamt=$row['totalamt'];
	
	$commission=$row['commission'];
	$date=$row['date'];
	
echo" <tr>
      
	<td>$gname</td>
    <td>$price</td>
    <td>$uname</td>
    <td>$uemail</td>
	<td>$ucontact</td>
	<td>$uaddress</td>
    <td>$sname</td>
    <td>$semail</td>
	<td>$scontact</td>
	<td>$saddress</td>
	<td>$quantity</td>
	<td>$totalamt</td>
	<td>$commission</td>
	<td>$date</td>
	</td>
	<td><form method=\"POST\" action=\"transaction.php\"><input type=\"submit\" name=\"$pid\" value=\"Delete\"onClick=\"document.location.reload(true)\">
	</td>
	</tr>
    ";

if((isset($_POST[$pid])))
{
	//echo '$id';
	$query=mysqli_query($connect,"DELETE FROM `transaction` WHERE `id`='$pid'") or die(mysqli_error($connect));
	
	//echo '<script>alert("All buyer id Deleted successfully")</script>';  
echo ' <script language="javascript" type="text/javascript">
alert("Transaction Deleted Successfully");
parent.document.location="transaction.php";
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
