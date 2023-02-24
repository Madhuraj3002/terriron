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

<form method="GET" action="added.php">
<button type="submit" name="back" class="registerbtn">Back</button>
</form>

<center>
<h2>Agri Products Items</h2>
</center>
<center>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Agri Products names.." title="Type in a name">
<div style="overflow-x:auto;">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Agri Products Name</th>
	<th style="width:60%;">Price per kg/litre</th>
	<th style="width:60%;">Quantity in Hand kg/litre</th>
	<th style="width:60%;">Supplier Name</th>
	<th style="width:60%;">Email</th>
	<th style="width:60%;">Contact</th>
	<th style="width:60%;">Address</th>
	<th style="width:60%;">Buy</th>
    </tr>
      
         <?php  
		 $user="root";
				$password="";
				$db="agri_shop";
				$connect=new mysqli("localhost",$user,$password,$db) or die("not connected");
				
			$query=mysqli_query($connect,"SELECT * FROM `added_items` WHERE 1 ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
    $pid = $row['id'];
	
	$name=$row['name'];
    $price=$row['price'];
	$quantity=$row['quantity'];
	$id=$row['supplier_id'];
	
		$query1=mysqli_query($connect,"SELECT * FROM `supplier_details` WHERE `id`=$id ") or die(mysqli_error($connect));
                          
while($row=mysqli_fetch_array($query1))
{
	
	$sname=$row['name'];
    $email=$row['email'];
	$contact=$row['contact'];
	$address=$row['address'];
}	
	
echo" <tr>
      
	<td>$name</td>
    <td>$price</td>
    <td>$quantity</td>
    <td>$sname</td>
	<td>$email</td>
	<td>$contact</td>
	<td>$address</td>
	<td><form method=\"POST\" action=\"added.php\"><input type=\"submit\" name=\"$pid\" value=\"Buy\"onClick=\"document.location.reload(true)\">
	</td>
	</tr>
    ";

	if((isset($_POST[$pid])))
{
	//echo '$id';
	$query=mysqli_query($connect,"UPDATE `product_id` SET `id`='$pid' WHERE 1 ") or die(mysqli_error($conn));
	//echo '<script>alert("All buyer id Deleted successfully")</script>';  
echo ' <script language="javascript" type="text/javascript">
alert("You will be redirected to the payment page");
parent.document.location="payment.php";
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
